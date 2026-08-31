<?php
/**
 * Theme Customizer Options
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

function tahseen_ashrafi_customize_register($wp_customize) {
    // Theme Colors Section
    $wp_customize->add_section('tahseen_ashrafi_colors_section', array(
        'title'    => __('Theme Colors', 'tahseen-ashrafi'),
        'priority' => 30,
    ));

    // Primary Color Setting
    $wp_customize->add_setting('tahseen_ashrafi_primary_color', array(
        'default'           => '#e50914',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tahseen_ashrafi_primary_color', array(
        'label'    => __('Primary Accent Color', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_colors_section',
        'settings' => 'tahseen_ashrafi_primary_color',
    )));

    // Secondary / Header Color Setting
    $wp_customize->add_setting('tahseen_ashrafi_secondary_color', array(
        'default'           => '#111111',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tahseen_ashrafi_secondary_color', array(
        'label'    => __('Header & Footer Dark Color', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_colors_section',
        'settings' => 'tahseen_ashrafi_secondary_color',
    )));

    // Accent Color Setting
    $wp_customize->add_setting('tahseen_ashrafi_accent_color', array(
        'default'           => '#ffcc00',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tahseen_ashrafi_accent_color', array(
        'label'    => __('Secondary Accent / Badge Color', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_colors_section',
        'settings' => 'tahseen_ashrafi_accent_color',
    )));

    // Trending Bar Section
    $wp_customize->add_section('tahseen_ashrafi_trending_section', array(
        'title'    => __('Trending Ticker / Marquee', 'tahseen-ashrafi'),
        'priority' => 36,
    ));

    // Trending Category
    $wp_customize->add_setting('tahseen_ashrafi_trending_category', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ));

    $categories = get_categories(array('hide_empty' => false));
    $cat_options = array(0 => __('-- All Categories / Latest Posts --', 'tahseen-ashrafi'));
    foreach ($categories as $cat) {
        $cat_options[$cat->term_id] = $cat->name;
    }

    $wp_customize->add_control('tahseen_ashrafi_trending_category', array(
        'label'    => __('Select Category for Trending', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_trending_section',
        'type'     => 'select',
        'choices'  => $cat_options,
    ));

    // Trending Marquee Speed
    $wp_customize->add_setting('tahseen_ashrafi_trending_speed', array(
        'default'           => 15,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('tahseen_ashrafi_trending_speed', array(
        'label'       => __('Marquee Speed (Duration in Seconds)', 'tahseen-ashrafi'),
        'description' => __('Lower number = faster scrolling, Higher number = slower scrolling.', 'tahseen-ashrafi'),
        'section'     => 'tahseen_ashrafi_trending_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 5, 'max' => 60, 'step' => 1),
    ));

    // Header & Logo Options Section
    $wp_customize->add_section('tahseen_ashrafi_header_section', array(
        'title'    => __('Header & Logo Options', 'tahseen-ashrafi'),
        'priority' => 35,
    ));

    // Logo Max Height
    $wp_customize->add_setting('tahseen_ashrafi_logo_height', array(
        'default'           => 50,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('tahseen_ashrafi_logo_height', array(
        'label'       => __('Header Logo Max Height (px)', 'tahseen-ashrafi'),
        'description' => __('Adjust logo height to prevent oversized header.', 'tahseen-ashrafi'),
        'section'     => 'tahseen_ashrafi_header_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 20, 'max' => 150, 'step' => 1),
    ));

    // Social Links Section
    $wp_customize->add_section('tahseen_ashrafi_social_section', array(
        'title'    => __('Social Media Links', 'tahseen-ashrafi'),
        'priority' => 38,
    ));

    $social_networks = array(
        'youtube'   => 'YouTube URL',
        'instagram' => 'Instagram URL',
        'twitter'   => 'Twitter / X URL',
        'linkedin'  => 'LinkedIn URL',
        'facebook'  => 'Facebook URL',
    );

    foreach ($social_networks as $key => $label) {
        $wp_customize->add_setting('tahseen_ashrafi_' . $key, array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('tahseen_ashrafi_' . $key, array(
            'label'   => __($label, 'tahseen-ashrafi'),
            'section' => 'tahseen_ashrafi_social_section',
            'type'    => 'url',
        ));
    }

    // Sidebar Visibility Options Section
    $wp_customize->add_section('tahseen_ashrafi_sidebar_section', array(
        'title'    => __('Sidebar Display Options', 'tahseen-ashrafi'),
        'priority' => 39,
    ));

    // Enable/Disable Sidebar on Archive / Category Pages
    $wp_customize->add_setting('tahseen_ashrafi_enable_archive_sidebar', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('tahseen_ashrafi_enable_archive_sidebar', array(
        'label'       => __('Enable Sidebar on Archive & Category Pages', 'tahseen-ashrafi'),
        'description' => __('Uncheck to hide sidebar when clicking menus/categories.', 'tahseen-ashrafi'),
        'section'     => 'tahseen_ashrafi_sidebar_section',
        'type'        => 'checkbox',
    ));

    // Enable/Disable Sidebar on Single Posts
    $wp_customize->add_setting('tahseen_ashrafi_enable_single_sidebar', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('tahseen_ashrafi_enable_single_sidebar', array(
        'label'       => __('Enable Sidebar on Single Posts', 'tahseen-ashrafi'),
        'description' => __('Uncheck to hide sidebar on single post pages.', 'tahseen-ashrafi'),
        'section'     => 'tahseen_ashrafi_sidebar_section',
        'type'        => 'checkbox',
    ));

    // Footer Options Section
    $wp_customize->add_section('tahseen_ashrafi_footer_section', array(
        'title'    => __('Footer Options', 'tahseen-ashrafi'),
        'priority' => 40,
    ));

    // Footer Logo Image
    $wp_customize->add_setting('tahseen_ashrafi_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tahseen_ashrafi_footer_logo', array(
        'label'    => __('Footer Custom Logo', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_footer_section',
    )));

    // Footer About Text
    $wp_customize->add_setting('tahseen_ashrafi_footer_about_text', array(
        'default'           => 'Welcome to our news portal for the latest updates, breaking news, and viral content across all categories.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('tahseen_ashrafi_footer_about_text', array(
        'label'    => __('Footer About Content', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_footer_section',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'tahseen_ashrafi_customize_register');
