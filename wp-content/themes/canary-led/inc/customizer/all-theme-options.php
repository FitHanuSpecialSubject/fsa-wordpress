<?php
/**
 * Led All theme Options
 *
 * @package canary led
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

    // Add Section
    $wp_customize->add_section( 'canary_led_all_theme_options', array(
        'priority' => 50,
        'title' => esc_html__( 'Theme Options', 'canary-led' ),
    ) );
    
    //  Blog Options
    $wp_customize->add_setting('main-title', array(
            'type'              => 'main-title-control',
            'sanitize_callback' => 'sanitize_text_field',            
        )
    );
    $wp_customize->add_control( new Canary_Led_title_display( $wp_customize, 'canary-led-100', array(
            'priority' => 100,
            'label' => esc_html__('Blog/ Single Options', 'canary-led'),
            'section' => 'canary_led_all_theme_options',
            'settings' => 'main-title',
        ) )
    );

    $wp_customize->add_setting( 'disable-author', array(
        'default' => 0,
        'sanitize_callback' => 'canary_led_sanitize_checkbox',
    ));
   $wp_customize->add_control( new Canary_Led_Control_Toggle( 
        $wp_customize,'disable-author', 
        array(
                'priority'=>110,
                'label' => esc_html__('Hide Author', 'canary-led'),
                'section' => 'canary_led_all_theme_options',
                'type'        => 'ios',
            )
        )
    );

    $wp_customize->add_setting( 'disable-date', array(
        'default' => 0,
        'sanitize_callback' => 'canary_led_sanitize_checkbox',
    ));
    $wp_customize->add_control( new Canary_Led_Control_Toggle( 
        $wp_customize,'disable-date', 
        array(
                'priority'=>120,
                'label' => esc_html__('Hide Date', 'canary-led'),
                'section' => 'canary_led_all_theme_options',
                'type'        => 'ios',
            )
        )
    );

    $wp_customize->add_setting( 'disable-category', array(
        'default' => 0,
        'sanitize_callback' => 'canary_led_sanitize_checkbox',
    ));
    $wp_customize->add_control( new Canary_Led_Control_Toggle( 
        $wp_customize,'disable-category', 
        array(
                'priority'=>130,
                'label' => esc_html__('Hide Category', 'canary-led'),
                'section' => 'canary_led_all_theme_options',
                'type'        => 'ios',
            )
        )
    );

    $wp_customize->add_setting( 'disable-tags', array(
        'default' => 0,
        'sanitize_callback' => 'canary_led_sanitize_checkbox',
    ));
    $wp_customize->add_control( new Canary_Led_Control_Toggle( 
        $wp_customize,'disable-tags', 
        array(
                'priority'=>130,
                'label' => esc_html__('Hide Tags', 'canary-led'),
                'section' => 'canary_led_all_theme_options',
                'type'        => 'ios',
            )
        )
    );

    $wp_customize->add_setting( 'disable-comments', array(
        'default' => 0,
        'sanitize_callback' => 'canary_led_sanitize_checkbox',
    ));
    $wp_customize->add_control( new Canary_Led_Control_Toggle( 
        $wp_customize,'disable-comments', 
        array(
                'priority'=>150,
                'label' => esc_html__('Hide Comments', 'canary-led'),
                'section' => 'canary_led_all_theme_options',
                'settings'  => 'disable-comments',
                'type'        => 'ios',
            )
        )
    );

     $wp_customize->add_setting( 'disable-social-icons', array(
        'default' => 0,
        'sanitize_callback' => 'canary_led_sanitize_checkbox',
    ));
    $wp_customize->add_control( new Canary_Led_Control_Toggle( 
        $wp_customize,'disable-social-icons', 
        array(
                'priority'=>160,
                'label' => esc_html__('Hide Social Icons', 'canary-led'),
                'description' => esc_html__('Social icon will be displayed only when Advertise banner is not available', 'canary-led'),
                'section' => 'canary_led_all_theme_options',
                'settings'  => 'disable-social-icons',
                'type'        => 'ios',
            )
        )
    );

    $wp_customize->add_setting( 'disable-header-social-icons', array(
        'default' => 0,
        'sanitize_callback' => 'canary_led_sanitize_checkbox',
    ));
    $wp_customize->add_control( new Canary_Led_Control_Toggle( 
        $wp_customize,'disable-header-social-icons', 
        array(
                'priority'=>170,
                'label' => esc_html__('Hide Social Icons from Info Bar', 'canary-led'),
                'section' => 'canary_led_all_theme_options',
                'settings'  => 'disable-header-social-icons',
                'type'        => 'ios',
            )
        )
    );
