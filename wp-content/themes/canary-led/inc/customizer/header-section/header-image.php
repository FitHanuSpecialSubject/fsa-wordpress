<?php
/**
 * Header Image Settings
 *
 * @package canary led
 */

$wp_customize->add_setting( 'fullwidth-banner', array(
    'default' => 0,
    'sanitize_callback' => 'canary_led_sanitize_checkbox',
));
$wp_customize->add_control( new Canary_Led_Control_Toggle( 
    $wp_customize,'fullwidth-banner', 
    array(
            'priority'=>5,
            'label' => esc_html__('Display FullWidth Header Image', 'canary-led'),
            'section' => 'header_image',
            'type'        => 'ios',
        )
    )
);

$wp_customize->add_setting( 'header_image_option', array(
    'default' => 'below-menu',
    'sanitize_callback' => 'canary_led_sanitize_select',
));
$wp_customize->add_control( 'header_image_option', array(
    'priority'=>110,
    'label' => __('Display Header Image', 'canary-led'),
    'section' => 'header_image',
    'type' => 'radio',
    'choices' => array(
        'below-menu' => __( 'Below Menu','canary-led' ),
        'above-menu' => __( 'Above Menu','canary-led' ),
    ),
));

$wp_customize->add_setting('header_text', array(
	'default' =>'',
	'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('header_text', array(
	'priority' =>120,
	'label' => __('Header Title', 'canary-led'),
	'section' => 'header_image',
	'type' => 'text',
));

$wp_customize->add_setting('header_description', array(
	'default' =>'',
	'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('header_description', array(
	'priority' =>130,
	'label' => __('Header Description', 'canary-led'),
	'section' => 'header_image',
	'type' => 'text',
));

$wp_customize->add_setting('header_btn_text', array(
	'default' => esc_html__('Continue Reading','canary-led'),
	'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('header_btn_text', array(
	'priority' =>140,
	'label' => __('Button Text', 'canary-led'),
	'section' => 'header_image',
	'type' => 'text',
));

$wp_customize->add_setting('header_btn_url', array(
	'default' =>'',
	'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control('header_btn_url', array(
	'priority' =>150,
	'label' => __('Button Url', 'canary-led'),
	'section' => 'header_image',
	'type' => 'text',
));