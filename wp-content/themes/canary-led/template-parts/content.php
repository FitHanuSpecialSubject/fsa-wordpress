<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package canary led
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-image-content">
		<?php canary_led_post_thumbnail();
		
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					if (has_post_thumbnail()){
						canary_led_posted_on();
						canary_led_entry_format();
					}
					
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
	</div>

	<header class="entry-header">
		<div class="entry-meta">
			<?php canary_led_entry_cat_tags(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php 
			canary_led_posted_by();

			if (!has_post_thumbnail()){
				canary_led_posted_on();
				canary_led_entry_format();
			}
			?>
		</div> <!-- end .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			if ( is_search() || ! is_singular() ) {
				the_excerpt();
			} else {
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							'Continue Reading <span class="screen-reader-text"> "%s"</span>',
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'canary-led' ),
						'after'  => '</div>',
					)
				);
			}
			?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

