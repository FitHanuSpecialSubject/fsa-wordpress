<?php
/**
 * Colors Settings
 *
 * @package canary led
 */

    $wp_customize->add_setting( 'header-banner-text-color' , array(
        'default'   => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header-banner-text-color', array(
        'label'      => __( 'Banner text Color', 'canary-led' ),
        'description'      => __( 'Change effect on Banner title, description and button', 'canary-led' ),
        'priority'   => 110,
        'section'    => 'colors',
    ) ) );

    $wp_customize->add_setting( 'default-theme-color' , array(
        'default'   => '#000566',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'default-theme-color', array(
        'label'      => __( 'Theme Color', 'canary-led' ),
        'description'      => __( 'Change Default theme Color', 'canary-led' ),
        'priority'   => 120,
        'section'    => 'colors',
    ) ) );