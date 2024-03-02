<?php
/**
 * PPC Specialist: Customizer
 *
 * @subpackage PPC Specialist
 * @since 1.0
 */

function ppc_specialist_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');


	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'PPC_Specialist_Control_Sortable' );

  	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

	// pro control
 	$wp_customize->add_section('ppc_specialist_pro', array(
        'title'    => __('UPGRADE PPC SPECIALIST PREMIUM', 'ppc-specialist'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('ppc_specialist_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new PPC_Specialist_Pro_Control($wp_customize, 'ppc_specialist_pro', array(
        'label'    => __('PPC SPECIALIST PREMIUM', 'ppc-specialist'),
        'section'  => 'ppc_specialist_pro',
        'settings' => 'ppc_specialist_pro',
        'priority' => 1,
    )));

     //Logo
    $wp_customize->add_setting('ppc_specialist_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'ppc_specialist_sanitize_integer'
	));
	$wp_customize->add_control(new PPC_Specialist_Slider_Custom_Control( $wp_customize, 'ppc_specialist_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','ppc-specialist'),
		'section'=> 'title_tagline',
		'settings'=>'ppc_specialist_logo_max_height',
		'input_attrs' => array(
			'reset'            => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
	)));
	$wp_customize->add_setting('ppc_specialist_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_logo_title',
			array(
				'settings'        => 'ppc_specialist_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ppc_specialist_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_logo_text',
			array(
				'settings'        => 'ppc_specialist_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);

	//typography
	$wp_customize->add_section( 'ppc_specialist_typography_settings', array(
		'title'       => __( 'Typography Settings', 'ppc-specialist' ),
		'priority'       => 2,
	) );
	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'ppc_specialist_section_typo_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_typography_settings',
		'settings'    => 'ppc_specialist_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'ppc_specialist_headings_text', array(
		'sanitize_callback' => 'ppc_specialist_sanitize_fonts',
	));
	$wp_customize->add_control( 'ppc_specialist_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'ppc-specialist'),
		'section' => 'ppc_specialist_typography_settings',
		'choices' => $font_choices
	));
	$wp_customize->add_setting( 'ppc_specialist_body_text', array(
		'sanitize_callback' => 'ppc_specialist_sanitize_fonts'
	));
	$wp_customize->add_control( 'ppc_specialist_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'ppc-specialist' ),
		'section' => 'ppc_specialist_typography_settings',
		'choices' => $font_choices
	) );
    
    // Theme General Settings
    $wp_customize->add_section('ppc_specialist_theme_settings',array(
        'title' => __('Theme General Settings', 'ppc-specialist'),
        'priority' => 2
    ) );
    $wp_customize->add_setting( 'ppc_specialist_section_sticky_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_theme_settings',
		'settings'    => 'ppc_specialist_section_sticky_heading',
	) ) );
    $wp_customize->add_setting(
		'ppc_specialist_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new  PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_sticky_header',
			array(
				'settings'        => 'ppc_specialist_sticky_header',
				'section'         => 'ppc_specialist_theme_settings',
				'label'           => __( 'Show Sticky Header', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ppc_specialist_section_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_theme_settings',
		'settings'    => 'ppc_specialist_section_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_theme_loader',
			array(
				'settings'        => 'ppc_specialist_theme_loader',
				'section'         => 'ppc_specialist_theme_settings',
				'label'           => __( 'Show Site Loader', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('ppc_specialist_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'ppc_specialist_sanitize_choices'
	));
	$wp_customize->add_control('ppc_specialist_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','ppc-specialist'),
        'section' => 'ppc_specialist_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','ppc-specialist'),
            'style_two' => __('Bar','ppc-specialist'),
        ),
	) );
	
	$wp_customize->add_setting( 'ppc_specialist_section_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_theme_settings',
		'settings'    => 'ppc_specialist_section_theme_width_heading',
	) ) );
	$wp_customize->add_setting('ppc_specialist_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'ppc_specialist_sanitize_choices'
	));
	$wp_customize->add_control('ppc_specialist_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','ppc-specialist'),
        'section' => 'ppc_specialist_theme_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','ppc-specialist'),
            'Container' => __('Container','ppc-specialist'),
            'container_fluid' => __('Container Fluid','ppc-specialist'),
        ),
	) );
	$wp_customize->add_setting( 'ppc_specialist_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_theme_settings',
		'settings'    => 'ppc_specialist_section_menu_heading',
	) ) );
	$wp_customize->add_setting('ppc_specialist_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'ppc_specialist_sanitize_choices'
	));
	$wp_customize->add_control('ppc_specialist_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','ppc-specialist'),
        'section' => 'ppc_specialist_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','ppc-specialist'),
            'UPPERCASE' => __('UPPERCASE','ppc-specialist'),
            'LOWERCASE' => __('LOWERCASE','ppc-specialist'),
        ),
	) );
	$wp_customize->add_setting( 'ppc_specialist_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_theme_settings',
		'settings'    => 'ppc_specialist_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_scroll_enable',
			array(
				'settings'        => 'ppc_specialist_scroll_enable',
				'section'         => 'ppc_specialist_theme_settings',
				'label'           => __( 'show Scroll Top', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ppc_specialist_scroll_options',
		array(
			'default' => 'right_align',
			'transport' => 'refresh',
			'sanitize_callback' => 'ppc_specialist_sanitize_choices'
		)
	);
	$wp_customize->add_control( new PPC_Specialist_Text_Radio_Button_Custom_Control( $wp_customize, 'ppc_specialist_scroll_options',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Scroll Top Alignment', 'ppc-specialist' ),
			'section' => 'ppc_specialist_theme_settings',
			'choices' => array(
				'left_align' => __('LEFT','ppc-specialist'),
				'center_align' => __('CENTER','ppc-specialist'),
				'right_align' => __('RIGHT','ppc-specialist'),
			)
		)
	) );
	$wp_customize->add_setting('ppc_specialist_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_theme_settings',
		'setting'	=> 'ppc_specialist_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting(
		'ppc_specialist_enable_custom_cursor',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_enable_custom_cursor',
			array(
				'settings'        => 'ppc_specialist_enable_custom_cursor',
				'section'         => 'ppc_specialist_theme_settings',
				'label'           => __( 'show custom cursor', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'ppc_specialist_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'ppc-specialist' ),
		'priority' => 3,
	));
    $wp_customize->add_section('ppc_specialist_layout',array(
        'title' => __('Single-Post Layout', 'ppc-specialist'),
        'panel' =>'ppc_specialist_post_panel',
    ) );
    $wp_customize->add_setting( 'ppc_specialist_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_post_heading', array(
		'label'       => esc_html__( 'single Post Structure', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_layout',
		'settings'    => 'ppc_specialist_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'ppc_specialist_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new PPC_Specialist_Radio_Image_Control( $wp_customize, 'ppc_specialist_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'ppc-specialist' ),
			'section' => 'ppc_specialist_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'ppc-specialist' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'ppc-specialist' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'ppc-specialist' )
				),
			)
		)
	) );
	$wp_customize->add_setting('ppc_specialist_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_single_post_date',
			array(
				'settings'        => 'ppc_specialist_single_post_date',
				'section'         => 'ppc_specialist_layout',
				'label'           => __( 'Show Date', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_single_post_date',
	) );
	$wp_customize->add_setting('ppc_specialist_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_single_date_icon',array(
		'label'	=> __('date Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_layout',
		'setting'	=> 'ppc_specialist_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_single_post_admin',
			array(
				'settings'        => 'ppc_specialist_single_post_admin',
				'section'         => 'ppc_specialist_layout',
				'label'           => __( 'Show Author/Admin', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_single_post_admin',
	) );
	$wp_customize->add_setting('ppc_specialist_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_single_author_icon',array(
		'label'	=> __('Author Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_layout',
		'setting'	=> 'ppc_specialist_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_single_post_comment',
			array(
				'settings'        => 'ppc_specialist_single_post_comment',
				'section'         => 'ppc_specialist_layout',
				'label'           => __( 'Show Comment', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ppc_specialist_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_single_comment_icon',array(
		'label'	=> __('comment Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_layout',
		'setting'	=> 'ppc_specialist_single_comment_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('ppc_specialist_single_post_tag_count',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_single_post_tag_count',
			array(
				'settings'        => 'ppc_specialist_single_post_tag_count',
				'section'         => 'ppc_specialist_layout',
				'label'           => __( 'Show tag count', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ppc_specialist_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_single_tag_icon',array(
		'label'	=> __('tag Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_layout',
		'setting'	=> 'ppc_specialist_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_single_post_tag',
			array(
				'settings'        => 'ppc_specialist_single_post_tag',
				'section'         => 'ppc_specialist_layout',
				'label'           => __( 'Show Tags', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_single_post_tag',
	) );
	$wp_customize->add_setting('ppc_specialist_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_similar_post',
			array(
				'settings'        => 'ppc_specialist_similar_post',
				'section'         => 'ppc_specialist_layout',
				'label'           => __( 'Show Similar post', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ppc_specialist_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('ppc_specialist_similar_text',array(
		'label' => esc_html__('Similar Post Heading','ppc-specialist'),
		'section' => 'ppc_specialist_layout',
		'setting' => 'ppc_specialist_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('ppc_specialist_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'ppc-specialist'),
        'panel' => 'ppc_specialist_post_panel',
    ) );
	$wp_customize->add_setting( 'ppc_specialist_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_archieve_post_layot',
		'settings'    => 'ppc_specialist_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'ppc_specialist_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new PPC_Specialist_Radio_Image_Control( $wp_customize, 'ppc_specialist_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'ppc-specialist' ),
			'section' => 'ppc_specialist_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'ppc-specialist' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'ppc-specialist' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'ppc-specialist' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'ppc-specialist' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'ppc-specialist' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'ppc-specialist' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'ppc-specialist' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'ppc-specialist' )
				)
			)
		)
	) );
	$wp_customize->add_setting( 'ppc_specialist_grid_column',
		array(
			'default' => '3_column',
			'transport' => 'refresh',
			'sanitize_callback' => 'ppc_specialist_sanitize_choices'
		)
	);
	$wp_customize->add_control( new PPC_Specialist_Text_Radio_Button_Custom_Control( $wp_customize, 'ppc_specialist_grid_column',
		array(
			'type' => 'select',
			'label' => esc_html__('Grid Post Per Row','ppc-specialist'),
			'section' => 'ppc_specialist_archieve_post_layot',
			'choices' => array(
				'1_column' => __('1','ppc-specialist'),
	            '2_column' => __('2','ppc-specialist'),
	            '3_column' => __('3','ppc-specialist'),
	            '4_column' => __('4','ppc-specialist'),
			)
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'ppc_specialist_sanitize_sortable',
    ));
    $wp_customize->add_control(new PPC_Specialist_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'ppc-specialist'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'ppc-specialist') ,
        'section' => 'ppc_specialist_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'ppc-specialist') ,
            'image' => __('media', 'ppc-specialist') ,
            'meta' => __('meta', 'ppc-specialist') ,
            'excerpt' => __('excerpt', 'ppc-specialist') ,
            'btn' => __('Read more', 'ppc-specialist') ,
        ) ,
    )));
	$wp_customize->add_setting('ppc_specialist_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'ppc_specialist_sanitize_integer'
	));
	$wp_customize->add_control(new PPC_Specialist_Slider_Custom_Control( $wp_customize, 'ppc_specialist_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','ppc-specialist' ),
		'section'=> 'ppc_specialist_archieve_post_layot',
		'settings'=>'ppc_specialist_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('ppc_specialist_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('ppc_specialist_read_more_text',array(
		'label' => esc_html__('Read More Text','ppc-specialist'),
		'section' => 'ppc_specialist_archieve_post_layot',
		'setting' => 'ppc_specialist_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('ppc_specialist_read_more_icon',array(
		'default'	=> 'fas fa-arrow-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_read_more_icon',array(
		'label'	=> __('Read More Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_archieve_post_layot',
		'setting'	=> 'ppc_specialist_read_more_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_date',
			array(
				'settings'        => 'ppc_specialist_date',
				'section'         => 'ppc_specialist_archieve_post_layot',
				'label'           => __( 'Show Date', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_date', array(
		'selector' => '.date-box',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_date',
	) );
	$wp_customize->add_setting('ppc_specialist_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_date_icon',array(
		'label'	=> __('date Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_archieve_post_layot',
		'setting'	=> 'ppc_specialist_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_admin',
			array(
				'settings'        => 'ppc_specialist_admin',
				'section'         => 'ppc_specialist_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_admin',
	) );
	$wp_customize->add_setting('ppc_specialist_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_author_icon',array(
		'label'	=> __('Author Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_archieve_post_layot',
		'setting'	=> 'ppc_specialist_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_comment',
			array(
				'settings'        => 'ppc_specialist_comment',
				'section'         => 'ppc_specialist_archieve_post_layot',
				'label'           => __( 'Show Comment', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_comment',
	) );
	$wp_customize->add_setting('ppc_specialist_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_comment_icon',array(
		'label'	=> __('comment Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_archieve_post_layot',
		'setting'	=> 'ppc_specialist_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_tag',
			array(
				'settings'        => 'ppc_specialist_tag',
				'section'         => 'ppc_specialist_archieve_post_layot',
				'label'           => __( 'Show tag count', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_tag', array(
		'selector' => '.tags',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_tag',
	) );
	$wp_customize->add_setting('ppc_specialist_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_tag_icon',array(
		'label'	=> __('tag Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_archieve_post_layot',
		'setting'	=> 'ppc_specialist_tag_icon',
		'type'		=> 'icon'
	)));

	// header-image
	$wp_customize->add_setting( 'ppc_specialist_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'ppc-specialist' ),
		'section'     => 'header_image',
		'settings'    => 'ppc_specialist_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('ppc_specialist_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'ppc_specialist_sanitize_choices'
	));
	$wp_customize->add_control('ppc_specialist_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','ppc-specialist'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','ppc-specialist'),
            'off' => __('Without Header Image','ppc-specialist'),
        ),
	) );

	// breadcrumb setting
	$wp_customize->add_section('ppc_specialist_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'ppc-specialist'),
        'priority' => 4
    ) );
	$wp_customize->add_setting( 'ppc_specialist_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'theme Breadcrumb Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_breadcrumb_settings',
		'settings'    => 'ppc_specialist_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_enable_breadcrumb',
			array(
				'settings'        => 'ppc_specialist_enable_breadcrumb',
				'section'         => 'ppc_specialist_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ppc_specialist_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('ppc_specialist_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'ppc-specialist'),
        'section' => 'ppc_specialist_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'ppc_specialist_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_breadcrumb_settings',
		'settings'    => 'ppc_specialist_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_single_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_single_enable_breadcrumb',
			array(
				'settings'        => 'ppc_specialist_single_enable_breadcrumb',
				'section'         => 'ppc_specialist_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'ppc_specialist_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'ppc-specialist' ),
			'section'     => 'ppc_specialist_breadcrumb_settings',
			'settings'    => 'ppc_specialist_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'ppc_specialist_woocommerce_enable_breadcrumb',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new PPC_Specialist_Customizer_Customcontrol_Switch(
				$wp_customize,
				'ppc_specialist_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'ppc_specialist_woocommerce_enable_breadcrumb',
					'section'         => 'ppc_specialist_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'ppc-specialist' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'ppc-specialist' ),
						'off'    => __( 'Off', 'ppc-specialist' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'ppc-specialist'),
	        'section' => 'ppc_specialist_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	//woocommerce
	if ( class_exists( 'WooCommerce' ) ) { 

		$wp_customize->add_section('ppc_specialist_wocommerce_section',array(
	        'title' => __('WooCommerce Settings', 'ppc-specialist'),
	    	'priority' => 4
	    ) );
		$wp_customize->add_setting( 'ppc_specialist_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_shoppage_heading', array(
			'label'       => esc_html__( 'Sidebar Settings', 'ppc-specialist' ),
			'section'     => 'ppc_specialist_wocommerce_section',
			'settings'    => 'ppc_specialist_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'ppc_specialist_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new PPC_Specialist_Radio_Image_Control( $wp_customize, 'ppc_specialist_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'ppc-specialist' ),
				'section'     => 'ppc_specialist_wocommerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'ppc-specialist' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'ppc-specialist' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'ppc-specialist' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'ppc_specialist_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new PPC_Specialist_Radio_Image_Control( $wp_customize, 'ppc_specialist_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'ppc-specialist' ),
				'section'     => 'ppc_specialist_wocommerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'ppc-specialist' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'ppc-specialist' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'ppc-specialist' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'ppc_specialist_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'ppc-specialist' ),
			'section'     => 'ppc_specialist_wocommerce_section',
			'settings'    => 'ppc_specialist_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('ppc_specialist_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'ppc_specialist_sanitize_choices'
		));
		$wp_customize->add_control('ppc_specialist_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','ppc-specialist'),
	        'section' => 'ppc_specialist_wocommerce_section',
	        'choices' => array(
	            '1' => __('One Column','ppc-specialist'),
	            '2' => __('Two Column','ppc-specialist'),
	            '3' => __('Three Column','ppc-specialist'),
	            '4' => __('four Column','ppc-specialist'),
	            '5' => __('Five Column','ppc-specialist'),
	            '6' => __('Six Column','ppc-specialist'),
	        ),
		) );
		$wp_customize->add_setting( 'ppc_specialist_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'ppc_specialist_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','ppc-specialist' ),
			'section'     => 'ppc_specialist_wocommerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'ppc_specialist_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'ppc-specialist' ),
			'section'     => 'ppc_specialist_wocommerce_section',
			'settings'    => 'ppc_specialist_section_related_heading',
		) ) );
		$wp_customize->add_setting('woocommerce_related_products_heading', array(
	        'default' => 'Related products',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_related_products_heading', array(
	        'label' => __('Related Products Heading', 'ppc-specialist'),
	        'section' => 'ppc_specialist_wocommerce_section',
	        'type' => 'text',
	    ));
		$wp_customize->add_setting('ppc_specialist_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'ppc_specialist_sanitize_choices'
		));
		$wp_customize->add_control('ppc_specialist_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','ppc-specialist'),
	        'section' => 'ppc_specialist_wocommerce_section',
	        'choices' => array(
	            '1' => __('One Column','ppc-specialist'),
	            '2' => __('Two Column','ppc-specialist'),
	            '3' => __('Three Column','ppc-specialist'),
	            '4' => __('four Column','ppc-specialist'),
	            '5' => __('Five Column','ppc-specialist'),
	            '6' => __('Six Column','ppc-specialist'),
	        ),
		) );
		$wp_customize->add_setting( 'ppc_specialist_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'ppc_specialist_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','ppc-specialist' ),
			'section'     => 'ppc_specialist_wocommerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'ppc_specialist_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new PPC_Specialist_Customizer_Customcontrol_Switch($wp_customize,'ppc_specialist_related_product',
			array(
				'settings'        => 'ppc_specialist_related_product',
				'section'         => 'ppc_specialist_wocommerce_section',
				'label'           => __( 'Show Related Products', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		));
	}
	// mobile width
	$wp_customize->add_section('ppc_specialist_mobile_options',array(
        'title' => __('Mobile Media settings', 'ppc-specialist'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'ppc_specialist_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_mobile_options',
		'settings'    => 'ppc_specialist_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_slider_button_mobile_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_slider_button_mobile_show_hide',
			array(
				'settings'        => 'ppc_specialist_slider_button_mobile_show_hide',
				'section'         => 'ppc_specialist_mobile_options',
				'label'           => __( 'Show Slider Button', 'ppc-specialist' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'ppc-specialist') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'ppc_specialist_scroll_enable_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_scroll_enable_mobile',
			array(
				'settings'        => 'ppc_specialist_scroll_enable_mobile',
				'section'         => 'ppc_specialist_mobile_options',
				'label'           => __( 'Show Scroll Top', 'ppc-specialist' ),	
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'ppc-specialist') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ppc_specialist_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'ppc-specialist' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'ppc-specialist') ,
		'section'     => 'ppc_specialist_mobile_options',
		'settings'    => 'ppc_specialist_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_enable_breadcrumb_mobile',
			array(
				'settings'        => 'ppc_specialist_enable_breadcrumb_mobile',
				'section'         => 'ppc_specialist_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'ppc_specialist_single_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'ppc_specialist_single_enable_breadcrumb_mobile',
				'section'         => 'ppc_specialist_mobile_options',
				'label'           => __( 'Single Post & Page', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'ppc_specialist_woocommerce_enable_breadcrumb_mobile',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new PPC_Specialist_Customizer_Customcontrol_Switch(
				$wp_customize,
				'ppc_specialist_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'ppc_specialist_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'ppc_specialist_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'ppc-specialist' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'ppc-specialist' ),
						'off'    => __( 'Off', 'ppc-specialist' ),
					),
					'active_callback' => '',
				)
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'ppc_specialist_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'ppc_specialist_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'ppc_specialist_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'ppc_specialist_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'ppc-specialist' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'ppc-specialist' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'ppc_specialist_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'ppc_specialist_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'ppc_specialist_customize_register' );

function ppc_specialist_customize_partial_blogname() {
	bloginfo( 'name' );
}
function ppc_specialist_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function ppc_specialist_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function ppc_specialist_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('PPC_SPECIALIST_PRO_LINK',__('https://www.ovationthemes.com/wordpress/email-marketing-wordpress-theme/','ppc-specialist'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('PPC_Specialist_Pro_Control')):
    class PPC_Specialist_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( PPC_SPECIALIST_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE PPC SPECIALIST PREMIUM','ppc-specialist');?> </a>
	        </div>
            <div class="col-md">
                <img class="ppc_specialist_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('PPC SPECIALIST PREMIUM - Features', 'ppc-specialist'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Business Friendly', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'ppc-specialist');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( PPC_SPECIALIST_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE PPC SPECIALIST PREMIUM','ppc-specialist');?> </a>
		    </div>
        </label>
    <?php } }
endif;