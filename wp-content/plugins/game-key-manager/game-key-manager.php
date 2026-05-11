<?php
/*
Plugin Name: MixiGaming Game Key Manager - Final Version
Description: Quản lý Key Game chuyên nghiệp - Fix lỗi vỡ giao diện trên Theme 2025.
Version: 6.5
Author: Phuc
*/

if (!defined('ABSPATH')) exit;

// =========================================================================
// PHẦN 1: ADMIN - Ô NHẬP KEY TRONG SẢN PHẨM (GIỮ NGUYÊN CẤU TRÚC CŨ)
// =========================================================================

add_action('add_meta_boxes', 'gkm_add_keys_metabox');
function gkm_add_keys_metabox() {
    add_meta_box('gkm_keys_box', 'Danh sách Key Game (Mỗi dòng 1 key)', 'gkm_render_keys_box', 'product', 'normal', 'high');
}

function gkm_render_keys_box($post) {
    $keys = get_post_meta($post->ID, '_game_keys_pool', true);
    echo '<textarea name="gkm_keys_list" rows="10" style="width:100%; font-family: monospace; border-radius: 8px; padding: 10px;">' . esc_textarea($keys) . '</textarea>';
    echo '<p><i>Hệ thống sẽ lấy dòng đầu tiên để cấp cho khách khi thanh toán xong.</i></p>';
}

add_action('save_post_product', 'gkm_save_keys');
function gkm_save_keys($post_id) {
    if (isset($_POST['gkm_keys_list'])) {
        update_post_meta($post_id, '_game_keys_pool', $_POST['gkm_keys_list']);
    }
}

// =========================================================================
// PHẦN 2: LOGIC CẤP KEY KHI THANH TOÁN THÀNH CÔNG (GIỮ NGUYÊN LOGIC CŨ)
// =========================================================================

add_action('woocommerce_order_status_completed', 'gkm_grant_key_to_customer', 10, 1);
function gkm_grant_key_to_customer($order_id) {
    $order = wc_get_order($order_id);
    $items = $order->get_items();

    foreach ($items as $item_id => $item) {
        if (!is_a($item, 'WC_Order_Item_Product')) continue;
        if ($item->get_meta('_purchased_game_key')) continue;

        $product_id = $item->get_product_id();
        $keys_string = get_post_meta($product_id, '_game_keys_pool', true);
        
        if (!empty($keys_string)) {
            $keys_array = explode("\n", str_replace("\r", "", $keys_string));
            $keys_array = array_filter(array_map('trim', $keys_array));

            if (!empty($keys_array)) {
                $granted_key = array_shift($keys_array);
                update_post_meta($product_id, '_game_keys_pool', implode("\n", $keys_array));
                $item->update_meta_data('_purchased_game_key', $granted_key);
                $item->save();
                $order->add_order_note("Hệ thống: Đã cấp Key cho " . $item->get_name() . ": " . $granted_key);
            }
        }
    }
}

// =========================================================================
// PHẦN 3: HIỂN THỊ THƯ VIỆN GAME (ĐÃ FIX ĐỂ KHÔNG BỊ THEME 2025 PHÁ)
// =========================================================================

add_shortcode('my_game_library', 'gkm_display_user_library');

function gkm_display_user_library() {
    if (!is_user_logged_in()) {
        return '<p style="text-align:center; padding:50px; color:#666;">Vui lòng đăng nhập để truy cập kho game.</p>';
    }

    $current_user = wp_get_current_user();
    $customer_orders = wc_get_orders(array(
        'customer' => $current_user->ID,
        'status'   => 'completed',
    ));

    $library = [];
    foreach ($customer_orders as $order) {
        foreach ($order->get_items() as $item) {
            if (!is_a($item, 'WC_Order_Item_Product')) continue;
            $product_id = $item->get_product_id();
            $key = $item->get_meta('_purchased_game_key');
            
            if ($key) {
                $library[$product_id]['keys'][] = $key;
                if (!isset($library[$product_id]['name'])) {
                    $library[$product_id]['name'] = $item->get_name();
                    $product = $item->get_product();
                    $library[$product_id]['image'] = $product ? get_the_post_thumbnail_url($product_id, 'large') : wc_placeholder_img_src();
                }
            }
        }
    }

    if (empty($library)) {
        return '<p style="text-align:center; padding:50px; color:#888;">Bạn chưa có game nào trong thư viện.</p>';
    }

    // CSS FIX TRIỆT ĐỂ CHO THEME 2025
    $output = '<style>
        .gkm-outer-container { clear: both; width: 100%; margin: 20px 0; }
        .gkm-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
        .gkm-item { cursor: pointer; border-radius: 12px; overflow: hidden; background: #000; border: 1px solid #333; position: relative; transition: 0.3s; }
        .gkm-item:hover { transform: scale(1.02); border-color: #007bff; }
        .gkm-item img { width: 100%; height: 280px; object-fit: cover; display: block; }
        .gkm-item-name { padding: 10px; color: #fff; text-align: center; font-weight: bold; background: rgba(0,0,0,0.8); position: absolute; bottom: 0; width: 100%; font-size: 14px; }
        
        /* OVERLAY - FIX CỨNG VÀO MÀN HÌNH */
        #gkmFullOverlay { 
            display: none; 
            position: fixed !important; 
            top: 0 !important; left: 0 !important; 
            width: 100vw !important; height: 100vh !important; 
            background: rgba(0,0,0,0.96) !important; 
            z-index: 9999999 !important; 
            align-items: center; justify-content: center; 
            backdrop-filter: blur(8px);
            margin: 0 !important; padding: 0 !important;
        }

        /* BOX NỘI DUNG - GIỮ NGUYÊN TỶ LỆ NHƯ MẪU CŨ */
        .gkm-main-box { 
            background: #181818 !important; 
            width: 880px; 
            max-width: 95%; 
            height: 520px; 
            display: flex !important; 
            border-radius: 15px; 
            overflow: hidden; 
            border: 1px solid #333;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            position: relative;
        }

        .gkm-box-left { width: 45%; height: 100%; background: #000; }
        .gkm-box-left img { width: 100%; height: 100%; object-fit: cover; }
        
        .gkm-box-right { width: 55%; padding: 40px; color: #fff !important; overflow-y: auto; text-align: left; }
        .gkm-btn-close { position: absolute; top: 15px; right: 20px; font-size: 35px; cursor: pointer; color: #666; transition: 0.2s; line-height: 1; }
        .gkm-btn-close:hover { color: #fff; }

        .gkm-key-card { background: #222; padding: 15px; border-radius: 10px; margin-top: 15px; display: flex; justify-content: space-between; align-items: center; border: 1px solid #333; }
        .gkm-key-value { color: #00ffcc; font-family: monospace; font-weight: bold; font-size: 16px; }
        .gkm-copy-action { background: #007bff; color: #fff; border: 0; padding: 6px 12px; border-radius: 5px; cursor: pointer; font-size: 13px; }

        @media (max-width: 850px) {
            .gkm-main-box { flex-direction: column; height: auto; max-height: 90vh; }
            .gkm-box-left { width: 100%; height: 200px; }
            .gkm-box-right { width: 100%; padding: 20px; }
        }
    </style>';

    $output .= '<div class="gkm-outer-container"><div class="gkm-grid">';
    foreach ($library as $id => $data) {
        $key_json = json_encode($data['keys']);
        $output .= "
        <div class='gkm-item' onclick='openGkmPopup(\"{$data['name']}\", \"{$data['image']}\", {$key_json})'>
            <img src='{$data['image']}'>
            <div class='gkm-item-name'>{$data['name']}</div>
        </div>";
    }
    $output .= '</div></div>';

    // Cấu trúc Modal chuẩn
    $output .= '
    <div id="gkmFullOverlay" onclick="closeIfOutside(event)">
        <div class="gkm-main-box">
            <span class="gkm-btn-close" onclick="closeGkmPopup()">&times;</span>
            <div class="gkm-box-left"><img id="gkmPopupImg" src=""></div>
            <div class="gkm-box-right">
                <h2 id="gkmPopupTitle" style="margin:0 0 10px 0; color:#fff !important; font-size: 26px;"></h2>
                <p id="gkmPopupQty" style="color:#888 !important; margin-bottom: 25px;"></p>
                <div id="gkmPopupKeyList"></div>
            </div>
        </div>
    </div>';

    $output .= '
    <script>
    function openGkmPopup(name, img, keys) {
        document.getElementById("gkmPopupTitle").innerText = name;
        document.getElementById("gkmPopupImg").src = img;
        document.getElementById("gkmPopupQty").innerText = "Số lượng sở hữu: " + keys.length + " key game";
        
        let listHtml = "";
        keys.forEach(key => {
            listHtml += `
                <div class="gkm-key-card">
                    <span class="gkm-key-value">${key}</span>
                    <button class="gkm-copy-action" onclick="copyToClip(\'${key}\')">Copy</button>
                </div>`;
        });
        document.getElementById("gkmPopupKeyList").innerHTML = listHtml;
        document.getElementById("gkmFullOverlay").style.display = "flex";
        document.body.style.overflow = "hidden"; 
    }

    function closeGkmPopup() { 
        document.getElementById("gkmFullOverlay").style.display = "none"; 
        document.body.style.overflow = "auto";
    }

    function closeIfOutside(e) {
        if (event.target.id === "gkmFullOverlay") closeGkmPopup();
    }

    function copyToClip(val) {
        navigator.clipboard.writeText(val).then(() => {
            alert("Đã copy key: " + val);
        });
    }
    </script>';

    return $output;
}