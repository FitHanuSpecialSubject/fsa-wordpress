<?php
/**
 * PPC Specialist: Customizer-home-page
 *
 * @subpackage PPC Specialist
 * @since 1.0
 */

//  Home Page Panel
	$wp_customize->add_panel( 'ppc_specialist_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'ppc-specialist' ),
		'priority' => 2,
	));

	// Top Header
    $wp_customize->add_section('ppc_specialist_top',array(
        'title' => __('Header Settings', 'ppc-specialist'),
        'panel' => 'ppc_specialist_custompage_panel',
    ) );
    $wp_customize->add_setting( 'ppc_specialist_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_contact_heading', array(
		'label'       => esc_html__( 'Header Settings', 'ppc-specialist' ),			
		'section'     => 'ppc_specialist_top',
		'settings'    => 'ppc_specialist_section_contact_heading',
	) ) );
    $wp_customize->add_setting('ppc_specialist_call_number',array(
		'default' => '',
		'sanitize_callback' => 'ppc_specialist_sanitize_phone_number'
	)); 
	$wp_customize->add_control('ppc_specialist_call_number',array(
		'label' => esc_html__('Add Phone Number','ppc-specialist'),
		'section' => 'ppc_specialist_top',
		'setting' => 'ppc_specialist_call_number',
		'type'    => 'text'
	));
	$wp_customize->add_setting('ppc_specialist_cal_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_cal_icon',array(
		'label'	=> __('Add phone Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_top',
		'setting'	=> 'ppc_specialist_cal_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('ppc_specialist_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	)); 
	$wp_customize->add_control('ppc_specialist_email_address',array(
		'label' => esc_html__('Add Email Address','ppc-specialist'),
		'section' => 'ppc_specialist_top',
		'setting' => 'ppc_specialist_email_address',
		'type'    => 'text'
	));
	$wp_customize->add_setting('ppc_specialist_email_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new PPC_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_email_icon',array(
		'label'	=> __('Add email Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_top',
		'setting'	=> 'ppc_specialist_email_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('ppc_specialist_talk_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('ppc_specialist_talk_btn_text',array(
		'label' => esc_html__('Add Button Text','ppc-specialist'),
		'section' => 'ppc_specialist_top',
		'setting' => 'ppc_specialist_talk_btn_text',
		'type'    => 'text'
	));
    $wp_customize->add_setting('ppc_specialist_talk_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('ppc_specialist_talk_btn_link',array(
		'label' => esc_html__('Add Button URL','ppc-specialist'),
		'section' => 'ppc_specialist_top',
		'setting' => 'ppc_specialist_talk_btn_link',
		'type'    => 'url'
	));

	// Social Media
    $wp_customize->add_section('ppc_specialist_urls',array(
        'title' => __('Social Media', 'ppc-specialist'),
        'panel' => 'ppc_specialist_custompage_panel',
    ) );
    $wp_customize->add_setting( 'ppc_specialist_section_social_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'ppc-specialist' ),
		'description' => __( 'Add social media links in the below feilds', 'ppc-specialist' ),			
		'section'     => 'ppc_specialist_urls',
		'settings'    => 'ppc_specialist_section_social_heading',
	) ) );
	$wp_customize->add_setting(
		'header_social_icon_enable',
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
			'header_social_icon_enable',
			array(
				'settings'        => 'header_social_icon_enable',
				'section'         => 'ppc_specialist_urls',
				'label'           => __( 'Check to show social fields', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
    $wp_customize->add_setting( 'ppc_specialist_section_twitter_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_twitter_heading', array(
		'label'       => esc_html__( 'Twitter Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_urls',
		'settings'    => 'ppc_specialist_section_twitter_heading',
	) ) );
	$wp_customize->add_setting('ppc_specialist_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new ppc_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_twitter_icon',array(
		'label'	=> __('Add Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_urls',
		'setting'	=> 'ppc_specialist_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'ppc_specialist_twitter', array(
		'selector' => '.social-icon a i',
		'render_callback' => 'ppc_specialist_customize_partial_ppc_specialist_twitter',
	) );
	$wp_customize->add_setting('ppc_specialist_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ppc_specialist_twitter',array(
		'label' => esc_html__('Add URL','ppc-specialist'),
		'section' => 'ppc_specialist_urls',
		'setting' => 'ppc_specialist_twitter',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ppc_specialist_header_twt_target',
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
			'ppc_specialist_header_twt_target',
			array(
				'settings'        => 'ppc_specialist_header_twt_target',
				'section'         => 'ppc_specialist_urls',
				'label'           => __( 'Open link in a new tab', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ppc_specialist_section_linkedin_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_linkedin_heading', array(
		'label'       => esc_html__( 'Linkedin Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_urls',
		'settings'    => 'ppc_specialist_section_linkedin_heading',
	) ) );
	$wp_customize->add_setting('ppc_specialist_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new ppc_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_linkedin_icon',array(
		'label'	=> __('Add Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_urls',
		'setting'	=> 'ppc_specialist_linkedin_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_linkedin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ppc_specialist_linkedin',array(
		'label' => esc_html__('Add URL','ppc-specialist'),
		'section' => 'ppc_specialist_urls',
		'setting' => 'ppc_specialist_linkedin',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ppc_specialist_header_linkedin_target',
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
			'ppc_specialist_header_linkedin_target',
			array(
				'settings'        => 'ppc_specialist_header_linkedin_target',
				'section'         => 'ppc_specialist_urls',
				'label'           => __( 'Open link in a new tab', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ppc_specialist_section_youtube_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_youtube_heading', array(
			'label'       => esc_html__( 'Youtube Settings', 'ppc-specialist' ),
			'section'     => 'ppc_specialist_urls',
			'settings'    => 'ppc_specialist_section_youtube_heading',
		) ) );

	$wp_customize->add_setting('ppc_specialist_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new ppc_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_youtube_icon',array(
		'label'	=> __('Add Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_urls',
		'setting'	=> 'ppc_specialist_youtube_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ppc_specialist_youtube',array(
		'label' => esc_html__('Youtube URL','ppc-specialist'),
		'section' => 'ppc_specialist_urls',
		'setting' => 'ppc_specialist_youtube',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ppc_specialist_header_youtube_target',
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
			'ppc_specialist_header_youtube_target',
			array(
				'settings'        => 'ppc_specialist_header_youtube_target',
				'section'         => 'ppc_specialist_urls',
				'label'           => __( 'Open link in a new tab', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ppc_specialist_section_instagram_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_instagram_heading', array(
		'label'       => esc_html__( 'Instagram Settings', 'ppc-specialist' ),
		'section'     => 'ppc_specialist_urls',
		'settings'    => 'ppc_specialist_section_instagram_heading',
	) ) );
	$wp_customize->add_setting('ppc_specialist_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new ppc_Specialist_Fontawesome_Icon_Chooser(
        $wp_customize,'ppc_specialist_instagram_icon',array(
		'label'	=> __('Add Icon','ppc-specialist'),
		'transport' => 'refresh',
		'section'	=> 'ppc_specialist_urls',
		'setting'	=> 'ppc_specialist_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ppc_specialist_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ppc_specialist_instagram',array(
		'label' => esc_html__('Add URL','ppc-specialist'),
		'section' => 'ppc_specialist_urls',
		'setting' => 'ppc_specialist_instagram',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ppc_specialist_header_instagram_target',
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
			'ppc_specialist_header_instagram_target',
			array(
				'settings'        => 'ppc_specialist_header_instagram_target',
				'section'         => 'ppc_specialist_urls',
				'label'           => __( 'Open link in a new tab', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'ppc_specialist_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'ppc-specialist' ),
    	'panel' => 'ppc_specialist_custompage_panel',
	) );
	$wp_customize->add_setting( 'ppc_specialist_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'ppc-specialist' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'ppc-specialist' ),		
		'section'     => 'ppc_specialist_slider_section',
		'settings'    => 'ppc_specialist_section_slide_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_slider_arrows',
			array(
				'settings'        => 'ppc_specialist_slider_arrows',
				'section'         => 'ppc_specialist_slider_section',
				'label'           => __( 'Check To Show Slider', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$i = 0;	
	$pst_sls[]= __('Select','ppc-specialist');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('ppc_specialist_post_setting'.$i,array(
			'sanitize_callback' => 'ppc_specialist_sanitize_select',
		));
		$wp_customize->add_control('ppc_specialist_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','ppc-specialist'),
			'section' => 'ppc_specialist_slider_section',
			'active_callback' => 'ppc_specialist_slider_dropdown',
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting(
		'ppc_specialist_slider_excerpt_show_hide',
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
			'ppc_specialist_slider_excerpt_show_hide',
			array(
				'settings'        => 'ppc_specialist_slider_excerpt_show_hide',
				'section'         => 'ppc_specialist_slider_section',
				'label'           => __( 'Show Hide excerpt', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => 'ppc_specialist_slider_dropdown',
			)
		)
	);
	$wp_customize->add_setting('ppc_specialist_slider_excerpt_count',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'ppc_specialist_sanitize_integer'
	));
	$wp_customize->add_control(new PPC_Specialist_Slider_Custom_Control( $wp_customize, 'ppc_specialist_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','ppc-specialist' ),
		'section'=> 'ppc_specialist_slider_section',
		'settings'=>'ppc_specialist_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 25,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'active_callback' => 'ppc_specialist_slider_dropdown',
	)));
	$wp_customize->add_setting(
		'ppc_specialist_slider_button_show_hide',
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
			'ppc_specialist_slider_button_show_hide',
			array(
				'settings'        => 'ppc_specialist_slider_button_show_hide',
				'section'         => 'ppc_specialist_slider_section',
				'label'           => __( 'Show Hide Button', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => 'ppc_specialist_slider_dropdown',
			)
		)
	);
	$wp_customize->add_setting('ppc_specialist_slider_read_more',array(
		'default' => 'READ MORE',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('ppc_specialist_slider_read_more',array(
		'label' => esc_html__('Button Text','ppc-specialist'),
		'section' => 'ppc_specialist_slider_section',
		'setting' => 'ppc_specialist_slider_read_more',
		'type'    => 'text',
		'active_callback' => 'ppc_specialist_slider_dropdown',
	));

	$wp_customize->add_setting( 'ppc_specialist_slider_content_alignment',
		array(
			'default' => 'LEFT-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'ppc_specialist_sanitize_choices'
		)
	);
	$wp_customize->add_control( new PPC_Specialist_Text_Radio_Button_Custom_Control( $wp_customize, 'ppc_specialist_slider_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Slider Content Alignment', 'ppc-specialist' ),
			'section' => 'ppc_specialist_slider_section',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','ppc-specialist'),
	            'CENTER-ALIGN' => __('CENTER','ppc-specialist'),
	            'RIGHT-ALIGN' => __('RIGHT','ppc-specialist'),
			),
			'active_callback' => 'ppc_specialist_slider_dropdown',
		)
	) );

	// Skills Section
	$wp_customize->add_section( 'ppc_specialist_skill_section' , array(
    	'title'      => __( 'Skills Section Settings', 'ppc-specialist' ),
    	'panel' => 'ppc_specialist_custompage_panel',
	) );
	$wp_customize->add_setting( 'ppc_specialist_section_skill_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_skill_heading', array(
		'label'       => esc_html__( 'Skills Section Settings', 'ppc-specialist' ),		
		'section'     => 'ppc_specialist_skill_section',
		'settings'    => 'ppc_specialist_section_skill_heading',
	) ) );
	$wp_customize->add_setting(
		'ppc_specialist_services_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ppc_specialist_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new PPC_Specialist_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ppc_specialist_services_show_hide',
			array(
				'settings'        => 'ppc_specialist_services_show_hide',
				'section'         => 'ppc_specialist_skill_section',
				'label'           => __( 'Check To Show Section', 'ppc-specialist' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ppc-specialist' ),
					'off'    => __( 'Off', 'ppc-specialist' ),
				),
				'active_callback' => '',
			)
		)
	);
	$ppc_specialist_categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($ppc_specialist_categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('ppc_specialist_services_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'ppc_specialist_sanitize_select',
	));
	$wp_customize->add_control('ppc_specialist_services_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Skill Section','ppc-specialist'),
		'label' => esc_html__('Select Category to display Skill Section','ppc-specialist'),
		'section' => 'ppc_specialist_skill_section',
		'active_callback' => 'ppc_specialist_services_show_hide_dropdown',
	));

	//Footer
    $wp_customize->add_section( 'ppc_specialist_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'ppc-specialist' ),
    	'panel' => 'ppc_specialist_custompage_panel',
	) );
	$wp_customize->add_setting( 'ppc_specialist_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new PPC_Specialist_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ppc_specialist_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Settings', 'ppc-specialist' ),		
		'section'     => 'ppc_specialist_footer_copyright',
		'settings'    => 'ppc_specialist_section_footer_heading',
	) ) );
    $wp_customize->add_setting('ppc_specialist_footer_text',array(
		'default'	=> 'PPC Specialist WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ppc_specialist_footer_text',array(
		'label'	=> esc_html__('Copyright Text','ppc-specialist'),
		'section'	=> 'ppc_specialist_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->add_setting( 'ppc_specialist_footer_content_alignment',
		array(
			'default' => 'CENTER-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'ppc_specialist_sanitize_choices'
		)
	);
	$wp_customize->add_control( new PPC_Specialist_Text_Radio_Button_Custom_Control( $wp_customize, 'ppc_specialist_footer_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Footer Content Alignment', 'ppc-specialist' ),
			'section' => 'ppc_specialist_footer_copyright',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','ppc-specialist'),
	            'CENTER-ALIGN' => __('CENTER','ppc-specialist'),
	            'RIGHT-ALIGN' => __('RIGHT','ppc-specialist'),
			),
			'active_callback' => '',
		)
	) );
	$wp_customize->add_setting( 'ppc_specialist_footer_widget',
		array(
			'default' => '4',
			'transport' => 'refresh',
			'sanitize_callback' => 'ppc_specialist_sanitize_choices'
		)
	);
	$wp_customize->add_control( new PPC_Specialist_Text_Radio_Button_Custom_Control( $wp_customize, 'ppc_specialist_footer_widget',
		array(
			'type' => 'select',
			'label' => esc_html__('Footer Per Column','ppc-specialist'),
			'section' => 'ppc_specialist_footer_copyright',
			'choices' => array(
				'1' => __('1','ppc-specialist'),
	            '2' => __('2','ppc-specialist'),
	            '3' => __('3','ppc-specialist'),
	            '4' => __('4','ppc-specialist'),
			)
		)
	) );