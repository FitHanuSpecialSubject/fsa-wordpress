<?php
/**
 * Custom functions
 *
 * @package Canary Led
 * @subpackage Canary Led
 * @since Canary led 1.0
 */

 /**
 * Social Icons
 */
function canary_led_social_icon() {
	if ( has_nav_menu( 'menu-3' ) ) : ?>
		<div class="social-icons clear">
			<?php
				wp_nav_menu( array(
					'container' 	=> '',
					'theme_location' => 'menu-3',
					'depth'          => 1,
					'items_wrap'      => '<ul>%3$s</ul>',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
					'link_after'     => '</span>' . canary_led_get_icons(array( 'icon' => 'default-link' ) ),
				) );
			?>
		</div><!-- end .social-links -->
	<?php endif; ?>
<?php }
add_action ('canary_led_social_icon_show', 'canary_led_social_icon');

/* Adding Fonts */
	
if ( ! function_exists( 'canary_led_fonts_url' ) ) :
	/**
	 * Register Google fonts for Led.
	 *
	 * Create your own canary_led_fonts_url() function
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function canary_led_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
	
		/* translators: If there are characters in your language that are not supported by Roboto+Slab, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'canary-led' ) ) {
			$fonts[] = 'Roboto Slab:wght@100;200;300;400;500;800';
		}
	
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => implode('&family=', $fonts) ,
				'display' => 'swap',
			), 'https://fonts.googleapis.com/css2' );
		}
	
		return esc_url_raw($fonts_url);
	}
	endif;

/**
 * Enqueue scripts and styles.
 */
	function canary_led_scripts() {
		$display_original_logo = get_theme_mod('display_original_logo','default');
		$fullwidth_banner = get_theme_mod ('fullwidth-banner',0);
		$display_site_branding = get_theme_mod('site_branding_option','default-menu');
		$site_branding_add_sec = get_theme_mod ('site_branding_add_sec','default');

		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		wp_enqueue_style( 'canary-led-google-fonts', wptt_get_webfont_url(canary_led_fonts_url()), array(), null );
		wp_enqueue_style( 'canary-led-style', get_stylesheet_uri(), array(), Canary_Led_Version );
		wp_enqueue_script('canary-led-custom', get_template_directory_uri().'/js/custom.js', array('jquery'), false, true);
		// Load the html5 shiv.
		wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		wp_enqueue_script( 'canary-led-navigation', get_template_directory_uri() . '/js/navigation.js', array(), Canary_Led_Version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script('canary-led-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', array('jquery'), false, true);

		wp_enqueue_style('canary-led-iconstyle', get_template_directory_uri().'/assets/font-icons/css/all.min.css');

		/************** Enqueue editor styles for Gutenberg *************************************/

		wp_enqueue_script('canary-led-navigation', get_template_directory_uri().'/js/navigation.js', array('jquery'), false, true);

		/* Custom Css */
		$canary_led_inline_css='';

		if ($display_original_logo == 'original'){
			$canary_led_inline_css .= '
				.custom-logo {
				    height: auto;
				}
			';
		}

		if (!empty($fullwidth_banner)){
			$canary_led_inline_css .= '.header-wrapper .custom-header {
				padding: 0;
				
			}';

		}

		if ($display_site_branding == 'nav-menu'){
			$canary_led_inline_css .= '.nav-bar .ad-section {
				text-align: center;
				float: inherit;
				
			}';

		}

		if($site_branding_add_sec == 'center'){

			$canary_led_inline_css .= '.social-display.center {
				    float: inherit;
				    display: table;
				    margin: 0 auto;
				}';

		}

		wp_add_inline_style( 'canary-led-style', wp_strip_all_tags($canary_led_inline_css) );

	}
	add_action( 'wp_enqueue_scripts', 'canary_led_scripts', 100 );

	function canary_led_block_editor_styles() {
		// Block styles.
		wp_enqueue_style( 'canary-led-block-editor-style', get_theme_file_uri() . '/css/editor-blocks.css' );
	
		// Add custom fonts.
		wp_enqueue_style( 'canary-led-google-fonts', canary_led_fonts_url(), array(), null );
	}
	add_action( 'enqueue_block_editor_assets', 'canary_led_block_editor_styles' );

	// Header banner text color
	function canary_led_banner_text() { 
		$banner_text_color = get_theme_mod('header-banner-text-color','#ffffff');


		if( $banner_text_color == '#ffffff' ){
			return;
		}
		$canary_led_inline_css='
		/* Header Banner Text */
		
		.section-title, .site-header-text, .custom-header-content .more-link {
			color: %1$s;

		} ';

		wp_add_inline_style( 'canary-led-style', sprintf( $canary_led_inline_css,
		$banner_text_color
		) );

	}
	add_action( 'wp_enqueue_scripts', 'canary_led_banner_text', 110 );

	// Default Theme color
	function canary_led_theme_color() { 
		$default_theme_color = get_theme_mod('default-theme-color','#000566');


		if( $default_theme_color == '#000566' ){
			return;
		}
		$canary_led_theme_color='
		/* Theme Color */

		.back-to-top,
		button,
		input[type="reset"],
		input[type="button"],
		input[type="submit"],
		.search-submit,
		.widget-title, .widget_block h2,
		.widget_calendar #wp-calendar caption,
		.bbp-submit-wrapper button.submit,
		.woocommerce #respond input#submit, 
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button,
		.woocommerce #respond input#submit.alt, 
		.woocommerce a.button.alt, 
		.woocommerce button.button.alt, 
		.woocommerce input.button.alt,
		.woocommerce-demo-store p.demo_store,
		#main-menu,
		.more-button:hover,
		.post-image-content .posted-on:before,
		.wp-block-file .wp-block-file__button,
  		.wp-block-search .wp-block-search__button,
  		.wp-block-button .wp-block-button__link,
  		.social-icons li a:hover,
  		.main-navigation ul li ul
		 {
			background-color: %1$s;
		}

		.bbp-submit-wrapper button.submit,
		.is-style-outline .wp-block-button__link,
		.is-style-outline .more-link,
		.is-style-outline .button,
		.is-style-outline .wp-block-button__link,
		.is-style-outline .more-link,
		.is-style-outline .button   {
			border: 1px solid %1$s;
		}

		.wp-block-pullquote,
		.wp-block-pullquote.alignleft,
		.wp-block-pullquote.alignright,
		.wp-block-quote.is-large,
		.wp-block-quote.is-style-large,
		.wp-block-quote {
		  border-color:  %1$s;
		}

		::selection, ::-moz-selection {
			background:%1$s;
		
		}

		a, a.more-link, 
		.screen-reader-text:focus,
		.entry-content a,
		.widget ul li a:hover,
		.widget ul li a:focus,
		.widget_tag_cloud a,
		.breadcrumb a:hover,
		#bbpress-forums .bbp-topics a:hover,
		.woocommerce .woocommerce-message:before,
		.info-bar .info-menu a:hover,
		.info-bar .info-menu a:focus,
		.entry-title a:hover,
		.entry-title a:focus,
		.entry-title a:active,
		.entry-meta a:hover,
		.navigation.post-navigation .nav-previous::before,
		.navigation.post-navigation .nav-next::after,
		#colophon .widget ul li a:hover,
		#colophon .widget ul li a:focus,
		.site-info .copyright a:hover,
		.site-info .copyright a:focus
		  {
			color: %1$s;
		}
		@media only screen and (max-width: 980px) { 

			.menu-container {
			  background-color: %1$s;

			}

		}';

		wp_add_inline_style( 'canary-led-style', sprintf( $canary_led_theme_color,
		$default_theme_color
		) );

	}
	add_action( 'wp_enqueue_scripts', 'canary_led_theme_color', 120 );

/**
 * Site Branding
 */
function canary_led_site_branding(){
$site_branding_add_sec = get_theme_mod ('site_branding_add_sec','default'); ?>
   <div id="<?php if ($site_branding_add_sec == 'center'){ echo 'site-branding-center'; } else { echo 'site-branding'; } ?>">
        <?php the_custom_logo(); ?>
        <div id="<?php if ($site_branding_add_sec == 'center'){ echo 'site-detail-center'; } else { echo 'site-detail'; } ?>">
            <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $canary_led_description = get_bloginfo( 'description', 'display' );
            if ( $canary_led_description || is_customize_preview() ) :
                ?>
                <div class="site-description"><?php echo $canary_led_description; ?></div>
            <?php endif; ?>

        </div><!-- end . site-detail -->
    </div><!-- .site-branding -->
	<?php
 }

add_action('canary_led_site_branding_show','canary_led_site_branding');

/**
 * Search Form
 */
function canary_led_search_form(){ ?>
<div class="search-navigation"> 
	<button class="search-toggle" type="button"></button>
		<div id="header-search-box" class="header-search-nav">
			<div class="search-box">
				<form  method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
					<label class='screen-reader-text'><?php esc_html_e( 'Search', 'canary-led' ); ?></label> 
					<input class="search-field" placeholder="<?php echo esc_attr_x( 'Search for &hellip;', 'placeholder', 'canary-led' ); ?>" name="s" type="search"> 
					<button type="submit" class="search-submit">
						<i class="fas fa-search"></i>
					</button>
				</form>
				<button type="button" class="search-icon"><i class="fas fa-times"></i></button>
			</div> 
		</div>
</div> <!-- end .search-navigation -->
    
<?php }
add_action('canary_led_search_form_show','canary_led_search_form');

/**
 * Breadcrumb
 */

function canary_led_breadcrumb() {
	if (function_exists('bcn_display')) { ?>
		<div class="breadcrumb home">
			<?php bcn_display(); ?>
		</div> <!-- .breadcrumb -->
	<?php }
}

add_action('canary_led_breadcrumb_show','canary_led_breadcrumb');

/**
 * Header Image and Content
 */

function canary_led_header_image_content() { 
	if( has_header_image() ){ ?>

		<div class="custom-header ">
			<div class="custom-header-wrap">
			<?php the_custom_header_markup();
			$header_text = get_theme_mod ('header_text','');
			$header_description = get_theme_mod('header_description','');
			$header_btn_text = get_theme_mod('header_btn_text',esc_html__('Continue Reading','canary-led'));
			$header_btn_url = get_theme_mod('header_btn_url','#');
			if ($header_text !== '' || $header_description !==''){ ?>

				<div class="custom-header-content">
					<?php if ($header_text !==''){ ?>
						<h2 class="section-title"><?php echo esc_html ($header_text);?></h2>
					<?php }
					if ($header_description !=='' || $header_btn_text !==''){ ?>
						<p class="site-header-text"><?php echo esc_html ($header_description); ?>
					
					<a class ="more-link" href="<?php echo esc_url ($header_btn_url);?>" target="_self"> <span class="more-button"><?php echo esc_html ($header_btn_text); ?><span class="screen-reader-text"><?php echo esc_html ($header_text);?></span></span></a></p>
					<?php } ?>
				</div> 

			<?php }
			?>
			</div>
		</div>
	
<?php  }
}

add_action('canary_led_header_image_content_show','canary_led_header_image_content');


