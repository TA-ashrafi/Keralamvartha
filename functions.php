<?php
/**
 * Theme Functions & Definitions
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Setup Theme Defaults and Registers Support
 */
function tahseen_ashrafi_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Custom Logo Support
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Header Menu', 'tahseen-ashrafi'),
        'top-menu'     => __('Top Bar Navigation Menu', 'tahseen-ashrafi'),
        'footer-menu'  => __('Footer Navigation Menu', 'tahseen-ashrafi'),
    ));

    // HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'tahseen_ashrafi_setup');

/**
 * Register Sidebars and Widget Areas (3 Sidebars + Footer Sidebars + Homepage Area)
 */
function tahseen_ashrafi_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary Main Sidebar', 'tahseen-ashrafi'),
        'id'            => 'sidebar-primary',
        'description'   => __('Main right sidebar for single posts and pages.', 'tahseen-ashrafi'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'tahseen-ashrafi'),
        'id'            => 'sidebar-secondary',
        'description'   => __('Secondary sidebar widget area.', 'tahseen-ashrafi'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Third Sidebar / Extra Widget Area', 'tahseen-ashrafi'),
        'id'            => 'sidebar-third',
        'description'   => __('Third sidebar widget area.', 'tahseen-ashrafi'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Homepage Widget Area', 'tahseen-ashrafi'),
        'id'            => 'homepage-widgets',
        'description'   => __('Add Custom Post Widgets here for home page multi-layout post sections.', 'tahseen-ashrafi'),
        'before_widget' => '<div id="%1$s" class="homepage-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'tahseen-ashrafi'),
        'id'            => 'footer-widgets',
        'description'   => __('Widgets placed here will appear in the 3-column footer.', 'tahseen-ashrafi'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'tahseen_ashrafi_widgets_init');

// Load custom includes
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/widgets/custom-post-widget.php';
require get_template_directory() . '/inc/widgets/social-widget.php';
require get_template_directory() . '/inc/widgets/widget-featured-sidebar.php';
require get_template_directory() . '/inc/widgets/widget-big-image-left.php';
require get_template_directory() . '/inc/widgets/widget-category-grid.php';
require get_template_directory() . '/inc/widgets/widget-featured-grid.php';
require get_template_directory() . '/inc/widgets/widget-grid-list.php';
require get_template_directory() . '/inc/widgets/widget-horizontal-list.php';

// Register Custom Widgets
function tahseen_ashrafi_register_custom_widgets() {
    register_widget('Tahseen_Ashrafi_Custom_Post_Widget');
    register_widget('Tahseen_Ashrafi_Social_Widget');
    register_widget('Tahseen_Ashrafi_Featured_Sidebar_Widget');
    register_widget('Tahseen_Ashrafi_Big_Image_Left_Widget');
    register_widget('Tahseen_Ashrafi_Category_Grid_Widget');
    register_widget('Tahseen_Ashrafi_Featured_Grid_Widget');
    register_widget('Tahseen_Ashrafi_Grid_List_Widget');
    register_widget('Tahseen_Ashrafi_Horizontal_List_Widget');
}
add_action('widgets_init', 'tahseen_ashrafi_register_custom_widgets');
