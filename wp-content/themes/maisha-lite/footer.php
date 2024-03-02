<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Maisha
 * @since Maisha 1.0
 */
?>
<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer">
			<div class="site-info">
				<div class="hfeed site">
					<div class="content site-content">
						<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<?php get_sidebar( 'footer' ); ?>
						<?php endif; ?>
						<div class="copyright">
						    <?php
			                    if ( function_exists( 'the_privacy_policy_link' ) ) {
			                    the_privacy_policy_link( '', '<span role="separator" aria-hidden="true">|</span>' );
			                    }
		                    ?>
		                    <?php
			                    /**
			                    * Fires before the Maisha Lite footer text for footer customization.
			                    *
			                    * @since Maisha Lite 1.0
			                    */
			                    do_action( 'maisha_credits' );
		                    ?>
		                    <?php if(!get_theme_mod('maisha_copyright')) : ?>
		                        <a href="<?php echo esc_url( esc_html__( 'https://www.anarieldesign.com/free-charity-wordpress-theme/', 'maisha-lite' ) ); ?>"><?php printf( esc_html__( 'Theme: %1$s', 'maisha-lite' ), 'Maisha Lite' ); ?></a>
		                    <?php else: ?>
		                        <?php esc_attr_e('&copy;', 'maisha-lite'); ?>
		                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_html( get_theme_mod( 'maisha_copyright', __( 'Built using Maisha Lite Theme. Proudly powered by WordPress.', 'maisha-lite' ) ) ); ?> </a>
		                    <?php endif; ?>
						</div>
					</div><!-- .footerwidgets -->
				</div><!-- .site-info -->
			</div><!-- .page -->
		</div><!-- .footer -->
	</footer><!-- .site-footer -->
	<?php } // end if ?>

<?php wp_footer(); ?>

</body>
</html>