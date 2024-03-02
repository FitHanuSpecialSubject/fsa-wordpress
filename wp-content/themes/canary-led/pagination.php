<?php
/**
 * Template part for displaying pagination
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package canary led
 */
	// Previous/next page navigation.
	the_posts_pagination( array(
		'prev_text'          => '<i class="fa fa-angle-double-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'canary-led' ).'</span>',
		'next_text'          => '<i class="fa fa-angle-double-right"></i><span class="screen-reader-text">' . __( 'Next page', 'canary-led' ).'</span>',
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'canary-led' ) . ' </span>',
	) );
