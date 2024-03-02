<?php
/**
 * The header for our theme
 *
 * @subpackage PPC Specialist
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ppc-specialist' ); ?></a>
	<?php if( get_option('ppc_specialist_theme_loader',true) != 'off'){ ?>
		<?php $ppc_specialist_loader_option = get_theme_mod( 'ppc_specialist_loader_style','style_one');
		if($ppc_specialist_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($ppc_specialist_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="wrap_figure">
				<div class="top_bar py-2 text-center text-lg-left text-md-left">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 align-self-center">
								<?php if( get_theme_mod('ppc_specialist_call_text') != '' || get_theme_mod('ppc_specialist_call_number') != '' ){ ?>
									<span><i class="<?php echo esc_attr(get_theme_mod('ppc_specialist_cal_icon','fas fa-phone-volume')); ?> mr-3"></i><?php echo esc_html(get_theme_mod('ppc_specialist_call_number','')); ?></span>
								<?php }?>
								<?php if( get_theme_mod('ppc_specialist_email_text') != '' || get_theme_mod('ppc_specialist_email_address') != '' ){ ?>
									<span class="mx-md-3"><i class="<?php echo esc_attr(get_theme_mod('ppc_specialist_email_icon','fas fa-envelope-open')); ?> mr-3"></i><?php echo esc_html(get_theme_mod('ppc_specialist_email_address','')); ?></span>
								<?php }?>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
								<?php if( get_option('header_social_icon_enable',false) != 'off'){ ?>
									<?php
							            $ppc_specialist_header_twt_target = esc_attr(get_option('ppc_specialist_header_twt_target','true'));
							            $ppc_specialist_header_linkedin_target = esc_attr(get_option('ppc_specialist_header_linkedin_target','true'));
							            $ppc_specialist_header_youtube_target = esc_attr(get_option('ppc_specialist_header_youtube_target','true'));
							            $ppc_specialist_header_instagram_target = esc_attr(get_option('ppc_specialist_header_instagram_target','true'));
							          ?>  
									<div class="links text-center text-lg-right text-md-right">
										<?php if( get_theme_mod('ppc_specialist_twitter') != ''){ ?>
								            <a target="<?php echo $ppc_specialist_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ppc_specialist_twitter','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ppc_specialist_twitter_icon','fab fa-twitter')); ?>"></i>
								            </a>
								          <?php }?>
								          <?php if( get_theme_mod('ppc_specialist_linkedin') != ''){ ?>
								            <a target="<?php echo $ppc_specialist_header_linkedin_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ppc_specialist_linkedin','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ppc_specialist_linkedin_icon','fab fa-linkedin-in')); ?>"></i>
								            </a>
								          <?php }?>
								          <?php if( get_theme_mod('ppc_specialist_youtube') != ''){ ?>
								            <a target="<?php echo $ppc_specialist_header_youtube_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ppc_specialist_youtube','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ppc_specialist_youtube_icon','fab fa-youtube')); ?>"></i>
								            </a>
								          <?php }?>
								          <?php if( get_theme_mod('ppc_specialist_instagram') != ''){ ?>
								            <a target="<?php echo $ppc_specialist_header_instagram_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ppc_specialist_instagram','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ppc_specialist_instagram_icon','fab fa-instagram')); ?>"></i>
								            </a>
								          <?php }?>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="menu_header fixed-header py-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 col-8 align-self-center">
								<div class="logo py-3 py-md-0">
							         <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $ppc_specialist_blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $ppc_specialist_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
												<?php if( get_option('ppc_specialist_logo_title',false) != 'off'){ ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
																	<?php }?>
						                  	<?php else : ?>
												<?php if( get_option('ppc_specialist_logo_title',false) != 'off'){ ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
											<?php }?>
					                  		<?php endif; ?>
						                <?php endif; ?>
						                <?php
					                  		$ppc_specialist_description = get_bloginfo( 'description', 'display' );
						                  	if ( $ppc_specialist_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('ppc_specialist_logo_text',true) != 'off'){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($ppc_specialist_description); ?>
					                  	</p>
					                  <?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-7 col-md-4 col-sm-6 col-4 align-self-center">
								
									<div class="toggle-menu gb_menu text-md-right">
										<button onclick="ppc_specialist_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','ppc-specialist'); ?></p></button>
									</div>
								
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-12 align-self-center">
								<?php if( get_theme_mod('ppc_specialist_talk_btn_link') != '' || get_theme_mod('ppc_specialist_talk_btn_text') != ''){ ?>
									<p class="chat_btn mb-0 text-center text-md-right"><a href="<?php echo esc_url(get_theme_mod('ppc_specialist_talk_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('ppc_specialist_talk_btn_text','')); ?></i></a></p>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>