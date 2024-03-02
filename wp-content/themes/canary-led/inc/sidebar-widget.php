<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function canary_led_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'canary-led' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'canary-led' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Advertise Section', 'canary-led' ),
			'id'            => 'header-adv',
			'description'   => esc_html__( 'Add Image widget', 'canary-led' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	for($i=1; $i<=3; $i++){
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar Area ', 'canary-led' ) . absint($i),
			'id'            => 'footer-'.absint($i),
			'description'   => esc_html__( 'Add footer widgets', 'canary-led' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'canary_led_widgets_init' );