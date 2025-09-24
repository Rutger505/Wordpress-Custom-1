<?php
/**
 * GreenTech Solutions Theme Functions
 *
 * This file contains the main theme functionality including
 * enqueuing styles and scripts, theme support, and menu registration.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue theme styles and scripts
 */
function greentech_enqueue_assets() {
    // Enqueue theme's main style.css file first
    wp_enqueue_style('greentech-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue main CSS file from template (located in sass folder)
    wp_enqueue_style('greentech-main', get_template_directory_uri() . '/assets/sass/main.css', array('greentech-style'), '1.0.0');

    // Enqueue FontAwesome icons
    wp_enqueue_style('greentech-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css', array(), '1.0.0');

    // Enqueue JavaScript files
    wp_enqueue_script('jquery');
    wp_enqueue_script('greentech-browser', get_template_directory_uri() . '/assets/js/browser.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('greentech-breakpoints', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('greentech-util', get_template_directory_uri() . '/assets/js/util.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('greentech-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'greentech-util'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'greentech_enqueue_assets');

/**
 * Theme setup function
 */
function greentech_setup() {
    // Add theme support for post thumbnails (featured images)
    add_theme_support('post-thumbnails');

    // Add theme support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add theme support for title tag
    add_theme_support('title-tag');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'greentech-solutions'),
        'mobile' => __('Mobile Menu', 'greentech-solutions'),
    ));
}
add_action('after_setup_theme', 'greentech_setup');

/**
 * Register widget areas (sidebars)
 */
function greentech_widgets_init() {
    // Main sidebar
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'greentech-solutions'),
        'id'            => 'main-sidebar',
        'description'   => __('Main sidebar widget area', 'greentech-solutions'),
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Footer widget area
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'greentech-solutions'),
        'id'            => 'footer-widgets',
        'description'   => __('Footer widget area', 'greentech-solutions'),
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'greentech_widgets_init');

/**
 * Custom excerpt length
 */
function greentech_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'greentech_excerpt_length');

/**
 * Custom excerpt more text
 */
function greentech_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'greentech_excerpt_more');
