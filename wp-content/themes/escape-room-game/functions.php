<?php
/**
 * Escape Room Game functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Escape Room Game
 */

if ( ! defined( 'ESCAPE_ROOM_GAME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ESCAPE_ROOM_GAME_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! function_exists( 'escape_room_game_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function escape_room_game_setup() {

		load_theme_textdomain( 'escape-room-game', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'woocommerce' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Enqueue editor styles.
		// add_editor_style( 'style.css' );

		// Experimental support for adding blocks inside nav menus
		add_theme_support( 'block-nav-menus' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );
	}
endif;
add_action( 'after_setup_theme', 'escape_room_game_setup' );

/**
 * Enqueue scripts and styles.
 */
function escape_room_game_scripts() {
	wp_enqueue_style('escape-room-game-style', get_stylesheet_uri(), array() );
	wp_enqueue_script( 'jquery-wow', esc_url(get_template_directory_uri()) . '/js/wow.js', array('jquery') );
	wp_enqueue_style( 'animate-css', esc_url(get_template_directory_uri()).'/css/animate.css' );
	wp_enqueue_style( 'owl.carousel-style', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri(). '/js/owl.carousel.js', array('jquery') ,'',true);
	wp_enqueue_script( 'escape-room-game-custom-scripts', get_template_directory_uri() . '/js/custom.js', array('jquery'),'' ,true );
	wp_style_add_data( 'escape-room-game-style', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'escape_room_game_scripts' );

/**
 * Enqueue block editor style
 */
function escape_room_game_block_editor_styles() {
	wp_enqueue_style( 'escape-room-game-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );	
}
add_action( 'enqueue_block_editor_assets', 'escape_room_game_block_editor_styles' );

function escape_room_game_init_setup() {
	define('ESCAPE_ROOM_GAME_BUY_NOW',__('https://www.vwthemes.com/products/escape-room-wordpress-theme','escape-room-game'));
	define('ESCAPE_ROOM_GAME_SUPPORT',__('https://wordpress.org/support/theme/escape-room-game/','escape-room-game'));
	define('ESCAPE_ROOM_GAME_REVIEW',__('https://wordpress.org/support/theme/escape-room-game/reviews/','escape-room-game'));
	define('ESCAPE_ROOM_GAME_LIVE_DEMO',__('https://www.vwthemes.net/escape-room-game-pro/','escape-room-game'));
	define('ESCAPE_ROOM_GAME_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/escape-room-game-pro/','escape-room-game'));
	define('ESCAPE_ROOM_GAME_FREE_DOC',__('https://preview.vwthemesdemo.com/docs/free-escape-room-game/','escape-room-game'));
	define('ESCAPE_ROOM_GAME_THEME_BUNDLE_BUY_NOW',__('https://www.vwthemes.com/products/wp-theme-bundle','escape-room-game'));
	define('ESCAPE_ROOM_GAME_THEME_BUNDLE_DOC',__('https://preview.vwthemesdemo.com/docs/theme-bundle/','escape-room-game'));
	
	// Add block patterns
	require get_template_directory() . '/inc/block-patterns.php';

	/**
	 * Section Pro
	 */
	require get_template_directory() . '/inc/section-pro/customizer.php';

	/**
	 * TGM
	 */
	require_once get_template_directory() . '/inc/tgm/plugin-activation.php';

	/**
	 * notice
	 */
	require get_template_directory() . '/inc/core/activation-notice.php';

	/**
	 * Load core file.
	 */
	require_once get_template_directory() . '/inc/core/theme-info.php';

	require_once get_template_directory() . '/inc/core/template-functions.php';
}
add_action( 'after_setup_theme', 'escape_room_game_init_setup' );

/* Enqueue admin-notice-script js */
add_action('admin_enqueue_scripts', function ($hook) {
    //if ($hook !== 'appearance_page_escape-room-game') return;

    wp_enqueue_script('admin-notice-script', get_template_directory_uri() . '/inc/core/js/admin-notice-script.js', ['jquery'], null, true);
    wp_localize_script('admin-notice-script', 'pluginInstallerData', [
        'ajaxurl'     => admin_url('admin-ajax.php'),
        'nonce'       => wp_create_nonce('install_plugin_nonce'), // Match this with PHP nonce check
        'redirectUrl' => admin_url('admin.php?page=escape-room-game-info'),
    ]);
});


add_action('wp_ajax_check_plugin_activation', function () {
    if (!isset($_POST['plugin']) || empty($_POST['plugin'])) {
        wp_send_json_error(['message' => 'Missing plugin identifier']);
    }

    include_once ABSPATH . 'wp-admin/includes/plugin.php';

    // Map plugin identifiers to their main files
    $escape_room_game_plugin_map = [
        'ibtana'               => 'ibtana-visual-editor/plugin.php',
    ];

    $escape_room_game_requested_plugin = sanitize_text_field($_POST['plugin']);

    if (!isset($escape_room_game_plugin_map[$escape_room_game_requested_plugin])) {
        wp_send_json_error(['message' => 'Invalid plugin']);
    }

    $escape_room_game_plugin_file = $escape_room_game_plugin_map[$escape_room_game_requested_plugin];
    $escape_room_game_is_active   = is_plugin_active($escape_room_game_plugin_file);

    wp_send_json_success(['active' => $escape_room_game_is_active]);
});


function escape_room_game_dismissed_notice() {
	 update_option( 'escape_room_game_admin_notice', true );
    wp_die();
}
add_action( 'wp_ajax_escape_room_game_dismissed_notice', 'escape_room_game_dismissed_notice' );
