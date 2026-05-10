<?php
/**
 * Plugin Name: My UI Sync Tool
 * Description: Xuất và Nhập cấu hình Customizer để đồng bộ giao diện nhóm.
 * Version: 1.0
 * Author: Hữu Thành
 */

if (!defined('ABSPATH'))
    exit;

// 1. Tạo Menu trong giao diện Admin
add_action('admin_menu', 'my_ui_sync_menu');
function my_ui_sync_menu()
{
    add_theme_page('UI Sync', 'UI Sync Tool', 'manage_options', 'my-ui-sync', 'my_ui_sync_page');
}

// 2. Giao diện trang Plugin
function my_ui_sync_page()
{
    ?>
    <div class="wrap">
        <h1>Đồng bộ giao diện (Customizer Sync)</h1>
        <hr>

        <h2>1. Xuất cấu hình (Export)</h2>
        <p>Bấm nút bên dưới để tải về file cấu hình giao diện hiện tại.</p>
        <form method="post">
            <?php wp_nonce_field('my_ui_export', 'my_ui_export_nonce'); ?>
            <input type="submit" name="export_ui" class="button button-primary" value="Tải file cấu hình (.json)">
        </form>

        <hr>

        <h2>2. Nhập cấu hình (Import)</h2>
        <p>Chọn file .json nhận được từ bạn đồng nghiệp để ghi đè giao diện.</p>
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('my_ui_import', 'my_ui_import_nonce'); ?>
            <input type="file" name="import_file" accept=".json">
            <input type="submit" name="import_ui" class="button button-secondary" value="Bắt đầu Import">
        </form>
    </div>
    <?php
}

// 3. Xử lý logic Export
add_action('admin_init', 'my_ui_export_handler');
function my_ui_export_handler()
{
    if (isset($_POST['export_ui']) && check_admin_referer('my_ui_export', 'my_ui_export_nonce')) {
        $template = get_template();
        $mods = get_theme_mods(); // Lấy toàn bộ cài đặt trong Customizer

        $data = array(
            'template' => $template,
            'mods' => $mods,
        );

        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="ui-config-' . $template . '-' . date('Y-m-d') . '.json"');
        echo json_encode($data);
        exit;
    }
}

// 4. Xử lý logic Import
add_action('admin_init', 'my_ui_import_handler');
function my_ui_import_handler()
{
    if (isset($_POST['import_ui']) && check_admin_referer('my_ui_import', 'my_ui_import_nonce')) {
        if (!empty($_FILES['import_file']['tmp_name'])) {
            $json_data = file_get_contents($_FILES['import_file']['tmp_name']);
            $data = json_decode($json_data, true);

            if ($data && isset($data['mods'])) {
                // Ghi đè từng mod vào Database
                foreach ($data['mods'] as $key => $val) {
                    set_theme_mod($key, $val);
                }
                add_settings_error('my_ui_sync', 'success', 'Đã cập nhật giao diện thành công!', 'updated');
            } else {
                add_settings_error('my_ui_sync', 'error', 'File không hợp lệ.', 'error');
            }
        }
    }
}