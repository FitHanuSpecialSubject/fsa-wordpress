<?php
/**
 * led functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package canary led
 */

if ( ! defined( 'Canary_Led_Version' ) ) {
	// Replace the version number of the theme on each release.
	define( 'Canary_Led_Version', '1.0.5' );
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function canary_led_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on led, use a find and replace
		* to change 'canary-led' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'canary-led', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'canary-led-post-image', 768, 480, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary Menu', 'canary-led' ),
			'menu-2' => esc_html__( 'Top Menu', 'canary-led' ),
			'menu-3' => esc_html__( 'Social Icon', 'canary-led' ),
		)
	);

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'canary_led_custom_background_args',
			array(
				'default-color' => 'dddddd',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_editor_style( array( 'css/editor-style.css', canary_led_fonts_url() ) );

	add_theme_support( 'align-wide' );
	
	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	if ( class_exists( 'WooCommerce' ) ) {

			/**
			 * Load WooCommerce compatibility files.
			 */
				
			require get_template_directory() . '/woocommerce/functions.php';

		}
}
add_action( 'after_setup_theme', 'canary_led_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function canary_led_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'canary_led_content_width', 1170 );
}
add_action( 'after_setup_theme', 'canary_led_content_width', 0 );



/**
 * Icon Functions
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Theme Functions
 */
require get_template_directory() . '/inc/functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Register sidebars & widgets
 */
require get_template_directory() . '/inc/sidebar-widget.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customize toggle control and Radio Image
 */
require get_template_directory() . '/inc/custom/customizer-custom.php';

/**
 * Upgrade Pro
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/upgrade-pro/class-customize.php' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function canary_led_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Post title. Only visible to screen readers. */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'canary-led' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'canary_led_excerpt_more' );

function canary_led_excerpt_length($length) {
   
		return 40;

}
add_filter('excerpt_length', 'canary_led_excerpt_length');

//load Welcome Notice
require get_template_directory() . '/inc/admin/admin-notice.php';
//load Theme Info
require get_template_directory() . '/inc/admin/theme-info.php';

// Theme Activation Notice
add_action( 'admin_notices', 'canary_led_activation' );

// Theme Ignore
add_action( 'admin_init', 'canary_led_ignore' );
function canary_led_ignore() {
  global $current_user;
  $user_id   = $current_user->ID;
  $theme_data  = wp_get_theme();

  if ( isset( $_GET[ sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) && '0' == $_GET[ sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) {
    add_user_meta( $user_id, sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore', 'true', true );
  }
}

function canary_led_admin_css (){

  wp_enqueue_style( 'canary-led-admin-css', get_template_directory_uri() . '/inc/admin/admin.css' );



$deps = array( 'wp-api-fetch' );
	$handle = 'canary-led-admin';
	wp_enqueue_script( $handle, get_template_directory_uri() . '/assets/js/admin.js', $deps, date( 'Ymd-Gis', filemtime( get_theme_file_path( 'assets/js/admin.js' ) ) ), true );

	wp_localize_script( $handle, 'canary_led',
        array(
            'canary_led_nonce' => wp_create_nonce( "canary-led-nonce" ),
            'canary_led_demo_import_page' => esc_url( admin_url( 'themes.php?page=one-click-demo-import' ) ),
        )
    );
}
add_action( 'admin_enqueue_scripts', 'canary_led_admin_css' );
