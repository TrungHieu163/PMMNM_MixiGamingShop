<?php
// Add Getstart admin notice
function escape_room_game_admin_notice() { 
     $escape_room_game_meta = get_option( 'escape_room_game_admin_notice' );

       if( !$escape_room_game_meta ){
       if( is_network_admin() ){
            return;
        } if( ! current_user_can( 'manage_options' ) ){
            return;
        }if ( isset($_GET['page']) && $_GET['page'] === 'escape-room-game-info' ) {
            return;
        } ?>
        <div class="notice notice-success is-dismissible welcome-notice">
            <div class="notice-row">
                <div class="notice-text">
                    <p class="welcome-text1"><?php esc_html_e( '🎉 Welcome to VW Themes,', 'escape-room-game' ); ?></p>
                    <p class="welcome-text2"><?php esc_html_e( 'You are now using the Escape Room Game, a beautifully designed theme to kickstart your website.', 'escape-room-game' ); ?></p>
                    <p class="welcome-text3"><?php esc_html_e( 'To help you get started quickly, use the options below:', 'escape-room-game' ); ?></p>

                    <span class="import-btn">
                        <a href="javascript:void(0);" id="install-activate-button" class="button admin-button info-button">
                           <?php echo __('GET STARTED', 'escape-room-game'); ?>
                        </a>
                        <script type="text/javascript">
                            document.getElementById('install-activate-button').addEventListener('click', function () {
                                const escape_room_game_button = this;
                                const escape_room_game_redirectUrl = '<?php echo esc_url(admin_url("admin.php?page=escape-room-game-info&escape_room_game_admin_notice=1")); ?>';
                                // First, check if plugin is already active
                                jQuery.post(ajaxurl, { action: 'check_plugin_activation' }, function (response) {
                                    if (response.success && response.data.active) {
                                        // Plugin already active — just redirect
                                        window.location.href = escape_room_game_redirectUrl;
                                    } else {
                                        // Show Installing & Activating only if not already active
                                        escape_room_game_button.textContent = 'Installing & Activating...';

                                        jQuery.post(ajaxurl, {
                                            action: 'install_and_activate_required_plugin',
                                            nonce: '<?php echo wp_create_nonce("install_activate_nonce"); ?>'
                                        }, function (response) {
                                            if (response.success) {
                                                window.location.href = escape_room_game_redirectUrl;
                                            } else {
                                                alert('Failed to activate the plugin.');
                                                escape_room_game_button.textContent = 'Try Again';
                                            }
                                        });
                                    }
                                });
                            });
                        </script>
                    </span>

                    <span class="demo-btn">
                        <a href="https://www.vwthemes.net/escape-room-game-pro/" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'VIEW DEMO', 'escape-room-game' ); ?>
                        </a>
                    </span>

                    <span class="upgrade-btn">
                        <a href="https://www.vwthemes.com/products/escape-room-wordpress-theme" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'UPGRADE TO PRO', 'escape-room-game' ); ?>
                        </a>
                    </span>

                    <span class="bundle-btn">
                        <a href="https://www.vwthemes.com/products/wp-theme-bundle" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'BUNDLE OF 485+ THEMES', 'escape-room-game' ); ?>
                        </a>
                    </span>
                </div>

                <div class="notice-img1">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/arrow-notice.png' ); ?>" width="180" alt="<?php esc_attr_e( 'Escape Room Game', 'escape-room-game' ); ?>" />
                </div>

                <div class="notice-img2">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bundle-notice.png' ); ?>" width="180" alt="<?php esc_attr_e( 'Escape Room Game', 'escape-room-game' ); ?>" />
                </div>
            </div>
        </div>
        <?php
    }?>
        <?php

    }

    // Add bundle image in customizer
add_action('customize_controls_print_footer_scripts', function () {
    ?>
    <script>
        jQuery(document).ready(function($) {
            var escape_room_game_banner = `
                <div class="vw-bundle-banner" style="padding:10px 12px;">
                    <a href="https://www.vwthemes.com/products/wp-theme-bundle" target="_blank">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bundle-img.png' ); ?>" style="width:100%; border-radius:4px;">
                    </a>
                </div>
            `;
            $('.customize-pane-parent').prepend(escape_room_game_banner);
        });
    </script>
    <?php
});

add_action( 'admin_notices', 'escape_room_game_admin_notice' );

if( ! function_exists( 'escape_room_game_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/


// Admin Notice Update (PERMANENT DISMISS)
function escape_room_game_update_admin_notice(){
    if ( isset( $_GET['escape_room_game_admin_notice'] ) && $_GET['escape_room_game_admin_notice'] == '1' ) {
        update_option( 'escape_room_game_admin_notice', true );
    }
}
endif;

add_action( 'admin_init', 'escape_room_game_update_admin_notice' );

//After Switch theme function
add_action('after_switch_theme', 'escape_room_game_getstart_setup_options');
function escape_room_game_getstart_setup_options () {
    update_option('escape_room_game_admin_notice', FALSE );
}