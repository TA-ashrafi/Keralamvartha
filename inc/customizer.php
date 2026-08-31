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

    $wp_customize->add_setting('tahseen_ashrafi_primary_color', array(
        'default'           => '#e50914',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tahseen_ashrafi_primary_color', array(
        'label'    => __('Primary Accent Color', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_colors_section',
        'settings' => 'tahseen_ashrafi_primary_color',
    )));

    $wp_customize->add_setting('tahseen_ashrafi_secondary_color', array(
        'default'           => '#111111',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tahseen_ashrafi_secondary_color', array(
        'label'    => __('Header & Footer Dark Color', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_colors_section',
        'settings' => 'tahseen_ashrafi_secondary_color',
    )));

    // Header & Logo Settings Section
    $wp_customize->add_section('tahseen_ashrafi_header_section', array(
        'title'    => __('Header & Logo Settings', 'tahseen-ashrafi'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('tahseen_ashrafi_logo_width', array(
        'default'           => '180',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('tahseen_ashrafi_logo_width', array(
        'label'       => __('Header Logo Width (px)', 'tahseen-ashrafi'),
        'section'     => 'tahseen_ashrafi_header_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 50, 'max' => 500, 'step' => 5),
    ));

    $wp_customize->add_setting('tahseen_ashrafi_marquee_speed', array(
        'default'           => '25',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('tahseen_ashrafi_marquee_speed', array(
        'label'       => __('Trending Ticker Speed (Seconds)', 'tahseen-ashrafi'),
        'section'     => 'tahseen_ashrafi_header_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 5, 'max' => 60, 'step' => 1),
    ));

    // Sidebar Display Options
    $wp_customize->add_section('tahseen_ashrafi_sidebar_options', array(
        'title'    => __('Sidebar Settings', 'tahseen-ashrafi'),
        'priority' => 38,
    ));

    $wp_customize->add_setting('tahseen_ashrafi_enable_archive_sidebar', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('tahseen_ashrafi_enable_archive_sidebar', array(
        'label'    => __('Enable Sidebar on Category / Archive / Menu Pages', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_sidebar_options',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('tahseen_ashrafi_enable_single_sidebar', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('tahseen_ashrafi_enable_single_sidebar', array(
        'label'    => __('Enable Sidebar Globally on Single Posts', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_sidebar_options',
        'type'     => 'checkbox',
    ));

    // Footer Options Section
    $wp_customize->add_section('tahseen_ashrafi_footer_section', array(
        'title'    => __('Footer Settings', 'tahseen-ashrafi'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('tahseen_ashrafi_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tahseen_ashrafi_footer_logo', array(
        'label'    => __('Footer Logo Image', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_footer_section',
    )));

    $wp_customize->add_setting('tahseen_ashrafi_footer_about_text', array(
        'default'           => 'Welcome to Tahseen Ashrafi News. Delivering latest headlines, trending stories, and in-depth news coverage daily.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('tahseen_ashrafi_footer_about_text', array(
        'label'    => __('Footer About Content', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_footer_section',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'tahseen_ashrafi_customize_register');
