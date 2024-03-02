<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package canary led
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function canary_led_body_classes( $classes ) {
	$layout_option = get_theme_mod ('layout_option','right-sidebar');
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'full-width';
	}

	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( $layout_option =='left-sidebar' ) {
		$classes[] = 'left-sidebar';
	} elseif ($layout_option =='full-width'){
		$classes[] = 'full-width';
	} else {
		$classes[] = '';
	}

	return $classes;
}
add_filter( 'body_class', 'canary_led_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function canary_led_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'canary_led_pingback_header' );