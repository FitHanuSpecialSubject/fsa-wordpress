<?php
/**
 * Site Identity Settings
 *
 * @package canary led
 */

    $wp_customize->add_setting( 'site_branding_option', array(
        'default' => 'default-menu',
        'sanitize_callback' => 'canary_led_sanitize_select',
    ));
    $wp_customize->add_control( 'site_branding_option', array(
        'priority'=>110,
        'label' => __('Display Site Branding', 'canary-led'),
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'default-menu' => __( 'Default Menu','canary-led' ),
            'nav-menu' => __( 'In Nav Menu','canary-led' ),
        ),
    ));

    $wp_customize->add_setting( 'site_branding_add_sec', array(
        'default' => 'default',
        'sanitize_callback' => 'canary_led_sanitize_select',
    ));
    $wp_customize->add_control( 'site_branding_add_sec', array(
        'priority'=>120,
        'label' => __('Display Site Branding & Ad. Section', 'canary-led'),
        'section' => 'title_tagline',
        'type' => 'radio',
        'active_callback' => 'canary_led_menu_callback',
        'choices' => array(
            'default' => __( 'Default Left','canary-led' ),
            'center' => __( 'Center','canary-led' ),
        ),
    ));

    $wp_customize->add_setting( 'display_original_logo', array(
        'default' => 'default',
        'sanitize_callback' => 'canary_led_sanitize_select',
    ));
    $wp_customize->add_control( 'display_original_logo', array(
        'priority'=>120,
        'label' => __('Display Site Branding Resolution', 'canary-led'),
        'section' => 'title_tagline',
        'type' => 'radio',
        'active_callback' => 'canary_led_menu_callback',
        'choices' => array(
            'default' => __( 'High Resolution','canary-led' ),
            'original' => __( 'Original Size','canary-led' ),
        ),
    ));