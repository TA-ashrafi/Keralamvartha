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

    // Footer Options Section
    $wp_customize->add_section('tahseen_ashrafi_footer_section', array(
        'title'    => __('Footer Options', 'tahseen-ashrafi'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('tahseen_ashrafi_footer_copyright_name', array(
        'default'           => 'Tahseen Ashrafi',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('tahseen_ashrafi_footer_copyright_name', array(
        'label'    => __('Copyright Name', 'tahseen-ashrafi'),
        'section'  => 'tahseen_ashrafi_footer_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'tahseen_ashrafi_customize_register');
