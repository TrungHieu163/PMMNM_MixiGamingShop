<?php
/*
Plugin Name: MixiGaming Game Key Manager
Description: Quản lý game key
Version: 4.8
Author: Phuc
*/

if (!defined('ABSPATH')) exit;

// =========================================================================
// PHẦN 1: QUẢN LÝ KEY TRONG ADMIN
// =========================================================================
add_action('add_meta_boxes', 'gkm_add_keys_metabox');
function gkm_add_keys_metabox() {
    add_meta_box('gkm_keys_box', 'Danh sách Key Game (Mỗi dòng 1 key)', 'gkm_render_keys_box', 'product', 'normal', 'high');
}

function gkm_render_keys_box($post) {
    $keys = get_post_meta($post->ID, '_game_keys_pool', true);
    echo '<textarea name="gkm_keys_list" rows="10" style="width:100%; font-family: monospace; border-radius: 8px; padding: 10px;">' . esc_textarea($keys) . '</textarea>';
}

add_action('save_post_product', 'gkm_save_keys');
function gkm_save_keys($post_id) {
    if (isset($_POST['gkm_keys_list'])) {
        update_post_meta($post_id, '_game_keys_pool', $_POST['gkm_keys_list']);
    }
}

// =========================================================================
// PHẦN 2: TỰ ĐỘNG CẤP KEY KHI ĐƠN HÀNG HOÀN THÀNH
// =========================================================================
add_action('woocommerce_order_status_completed', 'gkm_grant_key_to_customer', 10, 1);
function gkm_grant_key_to_customer($order_id) {
    $order = wc_get_order($order_id);
    foreach ($order->get_items() as $item) {
        if (!is_a($item, 'WC_Order_Item_Product')) continue;
        if ($item->get_meta('_purchased_game_key')) continue;

        $product_id = $item->get_product_id();
        $keys_string = get_post_meta($product_id, '_game_keys_pool', true);
        if (!empty($keys_string)) {
            $keys_array = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $keys_string))));
            if (!empty($keys_array)) {
                $granted_key = array_shift($keys_array);
                update_post_meta($product_id, '_game_keys_pool', implode("\n", $keys_array));
                $item->update_meta_data('_purchased_game_key', $granted_key);
                $item->save();
            }
        }
    }
}

// =========================================================================
// PHẦN 3: HIỂN THỊ THƯ VIỆN GAME
// =========================================================================
add_shortcode('my_game_library', 'gkm_display_user_library');
function gkm_display_user_library() {
    if (!is_user_logged_in()) return '<p style="text-align:center; padding:50px;">Vui lòng đăng nhập.</p>';

    $current_user = wp_get_current_user();
    $customer_orders = wc_get_orders(array('customer' => $current_user->ID, 'status' => 'completed'));
    $library = [];

    foreach ($customer_orders as $order) {
        foreach ($order->get_items() as $item) {
            $key = $item->get_meta('_purchased_game_key');
            if ($key) {
                $p_id = $item->get_product_id();
                $library[$p_id]['keys'][] = $key;
                if (!isset($library[$p_id]['name'])) {
                    $library[$p_id]['name'] = $item->get_name();
                    $product = $item->get_product();
                    $library[$p_id]['image'] = $product ? get_the_post_thumbnail_url($p_id, 'large') : wc_placeholder_img_src();
                }
            }
        }
    }

    if (empty($library)) return '<p style="text-align:center; padding:50px;">Thư viện trống.</p>';

    $output = '<style>
        /* Chuyển Grid thành Flex để hiển thị ngang */
        .gkm-grid { 
            display: flex; 
            flex-direction: column; 
            gap: 15px; 
            max-width: 1000px; 
            margin: 0 auto; 
        }

        /* Item dạng hàng ngang */
        .gkm-item { 
            display: flex; 
            align-items: center; 
            cursor: pointer; 
            border-radius: 12px; 
            overflow: hidden; 
            background: #1a1a1a; 
            border: 1px solid #333; 
            transition: 0.3s;
            height: 100px; /* Chiều cao cố định cho hàng */
        }
        .gkm-item:hover { border-color: #007bff; background: #222; transform: translateX(5px); }

        /* Ảnh thu nhỏ bên trái */
        .gkm-item img { 
            width: 150px; 
            height: 100%; 
            object-fit: cover; 
            border-right: 1px solid #333;
        }

        /* Tên game bên phải ảnh */
        .gkm-item-name { 
            padding: 0 20px; 
            color: #fff; 
            font-size: 18px; 
            font-weight: bold;
            flex-grow: 1;
            text-align: left;
        }

        /* GIỮ NGUYÊN OVERLAY CỦA BẠN - KHÔNG SỬA */
        .gkm-modal { 
            display: none; position: fixed; z-index: 99999999 !important; left: 0; top: 0; 
            width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.75); 
            align-items: center; justify-content: center; backdrop-filter: blur(5px);
        }
        .gkm-modal-content { 
            background: #181818; width: 90%; max-width: 950px; display: flex; 
            border-radius: 20px; overflow: hidden; position: relative; color: #fff; 
            border: 1px solid #333; box-shadow: 0 0 40px rgba(0,0,0,0.6);
        }
        .gkm-modal-left { width: 45%; border-right: 1px solid #333; }
        .gkm-modal-left img { width: 100%; height: 100%; object-fit: cover; }
        .gkm-modal-right { width: 55%; padding: 35px; overflow-y: auto; }
        .gkm-close { position: absolute; top: 15px; right: 20px; font-size: 35px; cursor: pointer; color: #aaa; z-index: 9999; line-height: 1; }
        .gkm-close:hover { color: #fff; }
        #mTitle { color: #fff !important; } /* Đảm bảo không bị đen */
        .gkm-qty-badge { background: #007bff; color: #fff; padding: 3px 12px; border-radius: 20px; font-weight: bold; margin-left: 5px; }
        .gkm-key-list { margin-top: 20px; }
        .gkm-key-card { background: #222; padding: 15px; border-radius: 10px; border: 1px solid #333; display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .gkm-key-val { color: #00ffcc; font-family: monospace; font-size: 16px; font-weight: bold; }
        .gkm-copy-icon { cursor: pointer; color: #888; transition: 0.2s; }
        .gkm-copy-icon:hover { color: #fff; transform: scale(1.1); }

        @media (max-width: 768px) {
            .gkm-item { height: 80px; }
            .gkm-item img { width: 100px; }
            .gkm-item-name { font-size: 15px; }
            .gkm-modal-content { flex-direction: column; height: 95vh; }
            .gkm-modal-left, .gkm-modal-right { width: 100%; }
            .gkm-modal-left { height: 35%; }
        }
    </style>';

    $output .= '<div class="gkm-grid">';
    foreach ($library as $id => $data) {
        $keys_json = json_encode($data['keys']);
        $output .= "
        <div class='gkm-item' onclick='openGkmModal(\"{$data['name']}\", \"{$data['image']}\", {$keys_json})'>
            <img src='{$data['image']}'>
            <div class='gkm-item-name'>{$data['name']}</div>
            <div style='padding-right:20px; color:#00ff00; font-size:12px; font-weight:bold;'>CLICK XEM KEY</div>
        </div>";
    }
    $output .= '</div>';

    $output .= '
    <div id="gkmModal" class="gkm-modal">
        <div class="gkm-modal-content">
            <span class="gkm-close" id="gkmCloseBtn">&times;</span>
            <div class="gkm-modal-left"><img id="mImg" src=""></div>
            <div class="gkm-modal-right">
                <h2 id="mTitle" style="margin:0;"></h2>
                <div style="margin-top:10px; color:#aaa;">Trạng thái: <span style="color:#00ff00; font-weight:bold;">Đã sở hữu</span> | Số lượng: <span id="mQty" class="gkm-qty-badge"></span> key</div>
                <hr style="border:0; border-top:1px solid #333; margin:20px 0;">
                <div id="mKeys" class="gkm-key-list"></div>
            </div>
        </div>
    </div>';

    $output .= '
    <script>
    function openGkmModal(name, img, keys) {
        const modal = document.getElementById("gkmModal");
        if (modal.parentElement !== document.body) document.body.appendChild(modal);

        document.getElementById("mTitle").innerText = name;
        document.getElementById("mImg").src = img;
        document.getElementById("mQty").innerText = keys.length;
        
        let html = "";
        keys.forEach(k => {
            html += `<div class="gkm-key-card">
                <span class="gkm-key-val">${k}</span>
                <span class="gkm-copy-icon" onclick="copyK(\'${k}\')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                </span>
            </div>`;
        });
        document.getElementById("mKeys").innerHTML = html;
        modal.style.display = "flex";
        document.body.style.overflow = "hidden";
    }

    document.addEventListener("click", function(e) {
        const modal = document.getElementById("gkmModal");
        if (e.target.id === "gkmCloseBtn" || e.target === modal) {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        }
    });

    function copyK(v) {
        navigator.clipboard.writeText(v).then(() => alert("Đã copy key!"));
    }
    </script>';

    return $output;
}