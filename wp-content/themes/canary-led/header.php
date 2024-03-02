<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package canary led
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$display_site_branding = get_theme_mod('site_branding_option','default-menu');
$header_image_option = get_theme_mod ('header_image_option','below-menu');
$site_branding_add_sec = get_theme_mod ('site_branding_add_sec','default');
$disable_social_icons = get_theme_mod ('disable-social-icons',0);
$disable_header_social_icons = get_theme_mod ('disable-header-social-icons',0);
 ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'canary-led'); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<?php
			
			if ( ( is_front_page() && is_home() ) || is_front_page() ) {	
				if ($header_image_option =='above-menu'){
					do_action ('canary_led_header_image_content_show');
				} 
			} ?>
				<!-- Top Header -->
				<div class="top-header">
					<?php 
					if (has_nav_menu('menu-2') || (has_nav_menu('menu-3') && $disable_header_social_icons ==0)): ?> 
					<div class="info-bar">
						<div class="wrapper">
							<?php if (has_nav_menu('menu-2'))
   								 { ?>
								<nav class="info-menu" role="navigation" aria-label="<?php esc_attr_e('Infobar Menu', 'canary-led'); ?>">
									<?php
										wp_nav_menu(array(
											'container' => '',
											'theme_location' => 'menu-2',
											'depth' => 3,
											'items_wrap' => '<ul class="info-menu">%3$s</ul>',
										));
									?>
								</nav> <!-- end .info-menu -->
							<?php
    							}

							if (has_nav_menu('menu-3')): ?>
														<div class="social-display clear">
															<?php
								/* Display Social Icons */
								do_action('canary_led_social_icon_show');
									?>
														</div> <!-- end .social-display -->
													<?php
							endif; ?>
						</div> <!-- end .wrapper -->
					</div> <!-- end .info-bar -->
					<?php endif;
					
					if ($display_site_branding == 'default-menu' || is_active_sidebar('header-adv')){ ?>

					<div class="nav-bar">
						<div class="wrapper">
							<?php
							 if ($display_site_branding == 'default-menu'){
								do_action('canary_led_site_branding_show');
							}

								if (is_active_sidebar('header-adv')):

									if ($site_branding_add_sec !== 'center'){ ?>
										<div class ="ad-section">
										<?php } else { ?>
										<div class ="ad-section-center">
										<?php }
										dynamic_sidebar('header-adv'); ?>		
										</div>
								<?php else:
									if (has_nav_menu('menu-3') && $disable_social_icons == 0): ?>
														<div class="social-display center adv clear">
															<?php
									/* Display Social Icons */
									do_action('canary_led_social_icon_show');
										?>
															</div> <!-- end .social-display -->
														<?php
									endif;

								endif;
							?>
						</div>
						<!-- end .wrapper -->
					</div>
					<!-- end .nav-bar -->
					<?php } ?>
					<!-- Main Header -->
					<div id="main-menu" class="clear">
						<div class="wrapper">
							<div class="main-header clear">
								<?php if ($display_site_branding == 'nav-menu'){ ?>
								<div id="site-branding">
									<?php the_custom_logo(); ?>
									<div id="site-detail">
										<div class="site-title">
											<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
										</div>
										
										<?php
											$canary_led_description = get_bloginfo('description', 'display');
											if ($canary_led_description || is_customize_preview()): ?>
												<p class="site-description"><?php echo $canary_led_description; ?></p>
											<?php
										endif; ?>
									
									</div>
								</div> <!-- end #site-branding -->
								<?php } ?>
								<!-- Main Nav  -->
								<button class="menu-toggle" id="menu-toggle" aria-controls="primary-menu" aria-expanded="false" type="button">
										<i class="fas fa-bars"></i>
									</button>
								<div class="menu-container">
									<nav id="site-navigation" class="main-navigation clear" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'canary-led'); ?>">	
								  	  <?php if (has_nav_menu('menu-1'))
																		{
																			$args = array(
																				'theme_location' => 'menu-1',
																				'container' => '',
																				'items_wrap' => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
																			);

																			wp_nav_menu($args);

																		}
																		else
																		{

																			wp_page_menu(array(
																				'menu_class' => 'menu',
																				'items_wrap' => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'
																			));
																		} ?>
																			<button id="close-btn" class="close-btn" tabindex="1"><i class="fas fa-xmark"></i></button>
																			 
											</nav><!-- end #site-navigation -->
								</div><!-- end .menu-container -->

									<?php
										/**
										 * Search Form
										 */
										do_action('canary_led_search_form_show');
									?>
							</div>
							<!-- end .main-header -->
						</div>
						<!-- end .wrapper -->
					</div>
					<!-- end #main -->
				</div>
				<!-- end .top-header -->
				<?php
				if ( ( is_front_page() && is_home() ) || is_front_page() ) {
					if ($header_image_option =='below-menu'){
						do_action ('canary_led_header_image_content_show');
					}
				} ?>
		</div> <!-- end .header-wrapper -->
	</header> <!-- end #masthead -->
	<div id="site-content-contain" class="site-content-contain">
		<div id="content" class="site-content">
			<div class="wrapper">