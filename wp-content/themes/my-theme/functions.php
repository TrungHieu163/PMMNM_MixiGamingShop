<?php
/**
 * My Theme - Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

define('MY_THEME_VERSION', '1.0');

function my_theme_scripts()
{
    wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array(), MY_THEME_VERSION);

    wp_enqueue_style('my-theme-main', get_template_directory_uri() . '/assets/css/main.css', array(), MY_THEME_VERSION);

    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), MY_THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

function my_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('woocommerce');

    register_nav_menus(array(
        'primary' => 'Menu Chính',
        'footer' => 'Menu Footer',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');