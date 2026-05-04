<?php
/*
Plugin Name: payOS Payment Gateway for WooCommerce
Description: Tích hợp thanh toán QR Code qua payOS
Version: 1.1
Author: Nguyễn Trung Hiếu
*/

if (!defined('ABSPATH')) exit;

// ======================
// 1. Khởi tạo Gateway
// ======================
add_action('plugins_loaded', 'init_payos_gateway_class');

function init_payos_gateway_class() {
    if (!class_exists('WC_Payment_Gateway')) return;

    class WC_Gateway_PayOS extends WC_Payment_Gateway {
        public $client_id;
        public $api_key;
        public $checksum_key;

        public function __construct() {
            $this->id                 = 'payos_gateway';
            $this->icon               = '';
            $this->has_fields         = false;
            $this->method_title       = 'payOS (Chuyển khoản QR)';
            $this->method_description = 'Thanh toán an toàn qua ngân hàng bằng mã QR của payOS.';

            $this->init_form_fields();
            $this->init_settings();

            $this->title          = $this->get_option('title');
            $this->description    = $this->get_option('description');
            $this->client_id      = $this->get_option('client_id');
            $this->api_key        = $this->get_option('api_key');
            $this->checksum_key   = $this->get_option('checksum_key');

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
        }

        public function init_form_fields() {
            $this->form_fields = array(
                'enabled'      => array('title' => 'Bật/Tắt', 'type' => 'checkbox', 'label' => 'Kích hoạt thanh toán payOS', 'default' => 'yes'),
                'title'        => array('title' => 'Tiêu đề', 'type' => 'text', 'default' => 'Chuyển khoản qua payOS'),
                'description'  => array('title' => 'Mô tả', 'type' => 'textarea', 'default' => 'Quét mã QR để hoàn tất thanh toán.'),
                'client_id'    => array('title' => 'Client ID', 'type' => 'text'),
                'api_key'      => array('title' => 'API Key', 'type' => 'text'),
                'checksum_key' => array('title' => 'Checksum Key', 'type' => 'password'),
            );
        }

        public function process_payment($order_id) {
            $order = wc_get_order($order_id);

            $body = array(
                "orderCode"   => intval($order_id),
                "amount"      => intval($order->get_total()),
                "description" => "Thanh toan don #" . $order_id,
                "returnUrl"   => $this->get_return_url($order),
                "cancelUrl"   => $order->get_cancel_order_url(),
            );

            // Tạo signature
            ksort($body);
            $signature = hash_hmac('sha256', http_build_query($body), $this->checksum_key);
            $body['signature'] = $signature;

            $response = wp_remote_post('https://api-merchant.payos.vn/v2/payment-requests', array(
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'x-client-id'  => $this->client_id,
                    'x-api-key'    => $this->api_key,
                ),
                'body' => json_encode($body),
            ));

            $result = json_decode(wp_remote_retrieve_body($response), true);

            if (!is_wp_error($response) && isset($result['code']) && $result['code'] === "00") {
                return array(
                    'result'   => 'success',
                    'redirect' => $result['data']['checkoutUrl'],
                );
            } else {
                wc_add_notice('Lỗi payOS: ' . ($result['desc'] ?? 'Không thể kết nối'), 'error');
                return array('result' => 'failure');
            }
        }
    }

    // Đăng ký Gateway
    add_filter('woocommerce_payment_gateways', function($methods) {
        $methods[] = 'WC_Gateway_PayOS';
        return $methods;
    });
}

// ======================
// 2. Webhook (Đặt ngoài cùng)
// ======================
add_action('rest_api_init', function () {
    register_rest_route('payos/v1', '/webhook', [
        'methods'             => 'POST',
        'callback'            => 'handle_payos_webhook_callback',
        'permission_callback' => '__return_true',
    ]);
});

function handle_payos_webhook_callback(WP_REST_Request $request) {
    $params = $request->get_json_params();

    error_log('PAYOS WEBHOOK: ' . wp_json_encode($params));

    if (empty($params) || ($params['code'] ?? '') !== "00") {
        return new WP_REST_Response(['status' => 'error', 'message' => 'Invalid payload'], 400);
    }

    $data     = $params['data'] ?? [];
    $order_id = !empty($data['orderCode']) ? intval($data['orderCode']) : 0;
    $order    = wc_get_order($order_id);

    if (!$order) {
        error_log("PAYOS WEBHOOK: Order #{$order_id} not found");
        return new WP_REST_Response(['status' => 'error', 'message' => 'Order not found'], 404);
    }

    if ($order->is_paid()) {
        return new WP_REST_Response(['status' => 'success'], 200);
    }

    $order->payment_complete();
    $order->add_order_note('payOS: Thanh toán thành công qua webhook.');

    return new WP_REST_Response(['status' => 'success'], 200);
}