<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package canary led
*/

?>

	</div> <!-- end .wrapper -->
</div> <!-- end #content -->

<footer id="colophon" class="site-footer">
<?php
	if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )) { ?>
	<div class="widget-wrapper">
		<div class="wrapper">
			<div class="widget-area">
				<?php for($i=1; $i<=3; $i++){ ?>
					<div class="column-3">
						<?php if ( is_active_sidebar( 'footer-'.$i ) ) { 
							dynamic_sidebar( 'footer-'.absint($i) );
						} ?>
					</div><!-- .column -->
				<?php } ?>
			</div>
		</div>
	</div><!-- end .widget-wrapper -->
	<?php } ?>
	<div class="site-info">
		<div class="border-line"></div>
			<div class="wrapper">
				<div class="copyright-wrapper clear">
				<div class="copyright">	
					<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) { ?>
							<div class="privacy-policy">
								<?php the_privacy_policy_link(); ?>
							</div>
						<?php }
					?>
		
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'canary-led' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'canary-led' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>

						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s', 'canary-led' ), 'Led');
						?>

						<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'By %1$s', 'canary-led' ), '<a href="https://themecanary.com" target="_blank"> Theme Canary </a>' );
						?>
					</div> <!-- end .copyright -->
	</div><!-- .site-info -->
	<button role="tab" class="back-to-top">
	<i class="fa-solid fa-circle-arrow-up"></i>
			<span class="back-to-top-text"><?php esc_html_e('Top','canary-led'); ?></span></button>
</footer><!-- #colophon -->
</div>
<!-- end .site-content-contain -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
