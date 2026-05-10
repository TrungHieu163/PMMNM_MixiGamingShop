<?php
/**
 * Plugin Name: My UI Sync Tool v4.0 (The Final One)
 * Description: Quét toàn bộ Database để tìm dữ liệu UI vừa thay đổi.
 * Version: 4.0
 * Author: Hữu Thành
 */

if (!defined('ABSPATH'))
    exit;

add_action('admin_menu', function () {
    add_theme_page('UI Sync', 'UI Sync Tool', 'manage_options', 'my-ui-sync', 'my_ui_sync_page');
});

function my_ui_sync_page()
{
    settings_errors('my_ui_sync');
    ?>
    <div class="wrap">
        <h1>Đồng bộ giao diện v4.0 (Super Scan)</h1>
        <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 5px;">
            <h2>1. Xuất cấu hình</h2>
            <p>Bản này sẽ lấy <strong>tất cả</strong> cài đặt quan trọng trong Database máy bạn.</p>
            <form method="post">
                <?php wp_nonce_field('my_ui_export', 'my_ui_export_nonce'); ?>
                <input type="submit" name="export_ui" class="button button-primary" value="Xuất toàn bộ Options (.json)">
            </form>
            <hr>
            <h2>2. Nhập cấu hình</h2>
            <form method="post" enctype="multipart/form-data">
                <?php wp_nonce_field('my_ui_import', 'my_ui_import_nonce'); ?>
                <input type="file" name="import_file" accept=".json" required>
                <br><br>
                <input type="submit" name="import_ui" class="button button-secondary" value="Bắt đầu Import">
            </form>
        </div>
    </div>
    <?php
}

add_action('admin_init', function () {
    global $wpdb;

    if (isset($_POST['export_ui']) && check_admin_referer('my_ui_export', 'my_ui_export_nonce')) {
        // Lấy top 500 options hay được dùng nhất (để tránh lấy rác hệ thống)
        $results = $wpdb->get_results("SELECT option_name, option_value FROM $wpdb->options WHERE option_name NOT LIKE '_transient%' AND option_name NOT LIKE 'user_core%' LIMIT 1000");

        $all_options = array();
        foreach ($results as $res) {
            $all_options[$res->option_name] = maybe_unserialize($res->option_value);
        }

        $export_data = array(
            'theme_mods' => get_theme_mods(),
            'all_options' => $all_options,
            'check_point' => 'v4.0'
        );

        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="final-sync-data.json"');
        echo json_encode($export_data);
        exit;
    }

    if (isset($_POST['import_ui']) && check_admin_referer('my_ui_import', 'my_ui_import_nonce')) {
        if (!empty($_FILES['import_file']['tmp_name'])) {
            $data = json_decode(file_get_contents($_FILES['import_file']['tmp_name']), true);
            if ($data && isset($data['all_options'])) {
                foreach ($data['all_options'] as $name => $value) {
                    update_option($name, $value);
                }
                if (!empty($data['theme_mods'])) {
                    foreach ($data['theme_mods'] as $k => $v) {
                        set_theme_mod($k, $v);
                    }
                }
                add_settings_error('my_ui_sync', 'success', 'Đã đồng bộ xong toàn bộ cấu hình!', 'updated');
            }
        }
    }
});