<?php
/**
 * Layout Settings
 *
 * @package canary led
 */

$wp_customize->add_section( 'canary_led_new_layout' , array(
    'title'      => __( 'Layout Settings', 'canary-led' ),
    'priority'   => 100,
) );

$wp_customize->add_setting( 'layout_option', array(
    'default' => 'right-sidebar',
    'sanitize_callback' => 'canary_led_sanitize_select',
));
$wp_customize->add_control( new Canary_Led_Control_Radio_Image(
    $wp_customize, 'layout_option',
        array(
            'priority'=>110,
            'label' => __('Display Site Layout', 'canary-led'),
            'section' => 'canary_led_new_layout',
            'choices' => array(
                'right-sidebar' =>esc_url( get_template_directory_uri() ) . '/assets/images/right-sidebar.png',
                'left-sidebar' => esc_url( get_template_directory_uri() ) . '/assets/images/left-sidebar.png',
                'full-width' => esc_url( get_template_directory_uri() ) . '/assets/images/fullwidth.png',
            ),
        )
 ));