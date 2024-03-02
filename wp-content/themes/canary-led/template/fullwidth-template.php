<?php
/**
 * Template Name: Full Width Template
 *
 * @package canary led
 * 
 */

get_header();

	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

			the_content();

	endwhile;
	
get_footer();