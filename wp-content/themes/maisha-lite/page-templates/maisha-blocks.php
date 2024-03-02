<?php
/**
 * Template Name: Maisha Blocks
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Maisha
 * @since Maisha 1.0
 */

get_header(); ?>
	<div class="hfeed site maisha-blocks">
		<div class="content site-content">
			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page-blocks' );

				// End the loop.
				endwhile;
			?>
		</div><!-- .site-content -->
	</div><!-- .site -->
<?php get_footer(); ?>