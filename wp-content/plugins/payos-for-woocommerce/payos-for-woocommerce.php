<?php
/*
Plugin Name: payOS Payment Gateway for WooCommerce
Description: Tích hợp thanh toán QR Code qua payOS
Version: 1.0
Author: Nguyễn Trung Hiếu
*/

if (!defined('ABSPATH')) exit;

// 1. Khởi tạo Gateway
add_action('plugins_loaded', 'init_payos_gateway_class');

function init_payos_gateway_class() {
    if (!class_exists('WC_Payment_Gateway')) return;

    class WC_Gateway_PayOS extends WC_Payment_Gateway {
        public $client_id;
        public $api_key;
        public $checksum_key;

        public function __construct() {
            $this->id = 'payos_gateway';
            $this->icon = ''; 
            $this->has_fields = false;
            $this->method_title = 'payOS (Chuyển khoản QR)';
            $this->method_description = 'Thanh toán an toàn qua ngân hàng bằng mã QR của payOS.';

            // Tải cấu hình
            $this->init_form_fields();
            $this->init_settings();

            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');
            $this->client_id = $this->get_option('client_id');
            $this->api_key = $this->get_option('api_key');
            $this->checksum_key = $this->get_option('checksum_key');

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
        }

        // 2. Form cài đặt trong trang Admin WooCommerce
        public function init_form_fields() {
            $this->form_fields = array(
                'enabled' => array('title' => 'Bật/Tắt', 'type' => 'checkbox', 'label' => 'Kích hoạt thanh toán payOS', 'default' => 'yes'),
                'title' => array('title' => 'Tiêu đề', 'type' => 'text', 'default' => 'Chuyển khoản qua payOS'),
                'description' => array('title' => 'Mô tả', 'type' => 'textarea', 'default' => 'Quét mã QR để hoàn tất thanh toán game.'),
                'client_id' => array('title' => 'Client ID', 'type' => 'text'),
                'api_key' => array('title' => 'API Key', 'type' => 'text'),
                'checksum_key' => array('title' => 'Checksum Key', 'type' => 'password'),
            );
        }

        // 3. Xử lý khi nhấn nút Đặt Hàng
        public function process_payment($order_id) {
            $order = wc_get_order($order_id);
            
            // Tạo dữ liệu gửi đi (Đảm bảo số tiền là số nguyên)
            $body = array(
                "orderCode" => intval($order_id),
                "amount" => intval($order->get_total()),
                "description" => "Thanh toan don #" . $order_id,
                "returnUrl" => $this->get_return_url($order),
                "cancelUrl" => $order->get_cancel_order_url(),
            );

            // Tạo chữ ký (Signature)
            ksort($body);
            $query_string = http_build_query($body);
            $signature = hash_hmac('sha256', $query_string, $this->checksum_key);
            $body['signature'] = $signature;

            // Gọi API payOS
            $response = wp_remote_post('https://api-merchant.payos.vn/v2/payment-requests', array(
                'method'    => 'POST',
                'headers'   => array(
                    'Content-Type' => 'application/json',
                    'x-client-id'  => $this->client_id,
                    'x-api-key'    => $this->api_key,
                ),
                'body'      => json_encode($body),
            ));

            $result = json_decode(wp_remote_retrieve_body($response), true);

            if (!is_wp_error($response) && $result['code'] == "00") {
                return array(
                    'result'   => 'success',
                    'redirect' => $result['data']['checkoutUrl'],
                );
            } else {
                wc_add_notice('Lỗi payOS: ' . ($result['desc'] ?? 'Không thể kết nối'), 'error');
                return;
            }
        }
    }

    // Đăng ký class Gateway với WooCommerce
    add_filter('woocommerce_payment_gateways', function($methods) {
        $methods[] = 'WC_Gateway_PayOS';
        return $methods;
    });
}

// 4. Endpoint nhận Webhook để tự động duyệt đơn hàng
add_action('rest_api_init', function () {
    register_rest_route('payos/v1', '/webhook', array(
        'methods' => 'POST',
        'callback' => 'handle_payos_webhook_callback',
        'permission_callback' => '__return_true',
    ));
});

function handle_payos_webhook_callback($request) {
    $params = $request->get_json_params();
    if (!$params || $params['code'] != "00") return new WP_REST_Response('Error', 400);

    $data = $params['data'];
    $order_id = $data['orderCode'];
    $order = wc_get_order($order_id);

    if ($order && !$order->is_paid()) {
        $order->payment_complete(); // Chuyển trạng thái sang "Processing"
        $order->add_order_note('payOS: Xác nhận thanh toán thành công.');
        return new WP_REST_Response('Success', 200);
    }
    return new WP_REST_Response('Order not found or paid', 404);
}