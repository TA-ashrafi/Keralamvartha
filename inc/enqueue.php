<?php
/**
 * Enqueue scripts and styles for Tahseen Ashrafi News Theme
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function tahseen_ashrafi_enqueue_assets() {
    // Theme stylesheet
    wp_enqueue_style('tahseen-ashrafi-style', get_stylesheet_uri(), array(), '1.0.0');

    // Font Awesome Icons CDN
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Custom CSS
    wp_enqueue_style('tahseen-ashrafi-custom', get_template_directory_uri() . '/assets/css/custom.css', array('tahseen-ashrafi-style'), '1.0.0');

    // Dynamic Customizer CSS
    $primary_color   = get_theme_mod('tahseen_ashrafi_primary_color', '#e50914');
    $secondary_color = get_theme_mod('tahseen_ashrafi_secondary_color', '#111111');
    $logo_width      = get_theme_mod('tahseen_ashrafi_logo_width', '180');
    $marquee_speed   = get_theme_mod('tahseen_ashrafi_marquee_speed', '25');

    $custom_css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
            --logo-width: {$logo_width}px;
            --marquee-speed: {$marquee_speed}s;
        }
    ";
    wp_add_inline_style('tahseen-ashrafi-custom', $custom_css);

    // Custom JS
    wp_enqueue_script('tahseen-ashrafi-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'tahseen_ashrafi_enqueue_assets');
