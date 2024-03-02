<?php
/**
 * PPC Specialist functions and definitions
 *
 * @subpackage PPC Specialist
 * @since 1.0
 */

//woocommerce//
//shop page no of columns
function ppc_specialist_woocommerce_loop_columns() {
	$retrun = get_theme_mod( 'ppc_specialist_archieve_item_columns', 3 );
    
    return $retrun;
}
add_filter( 'loop_shop_columns', 'ppc_specialist_woocommerce_loop_columns' );
function ppc_specialist_woocommerce_products_per_page() {

		$retrun = get_theme_mod( 'ppc_specialist_archieve_shop_perpage', 6 );
    
    return $retrun;
}
add_filter( 'loop_shop_per_page', 'ppc_specialist_woocommerce_products_per_page' );
// related products
function ppc_specialist_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => get_theme_mod( 'ppc_specialist_related_shop_perpage', 3 ),
        'columns'        => get_theme_mod( 'ppc_specialist_related_item_columns', 3),
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'ppc_specialist_related_products_args' );
function ppc_specialist_related_products_heading($translated_text, $text, $domain) {
    $heading = get_theme_mod('woocommerce_related_products_heading', 'Related products');

    if ($text === 'Related products' && $domain === 'woocommerce') {
        $translated_text = $heading;
    }
    return $translated_text;
}
add_filter('gettext', 'ppc_specialist_related_products_heading', 20, 3);
// breadcrumb seperator
function ppc_specialist_woocommerce_breadcrumb_separator($defaults) {
    $separator = get_theme_mod('woocommerce_breadcrumb_separator', ' / ');

    // Update the separator
    $defaults['delimiter'] = $separator;

    return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'ppc_specialist_woocommerce_breadcrumb_separator');
//woocommerce-end//

// Get start function
function ppc_specialist_custom_admin_notice() {
    // Check if the notice is dismissed
    if (!get_user_meta(get_current_user_id(), 'dismissed_admin_notice', true)) {
        // Check if not on the theme documentation page
        $current_screen = get_current_screen();
        if ($current_screen && $current_screen->id !== 'appearance_page_ppc-specialist-guide-page') {
            $theme = wp_get_theme();
            ?>
            <div class="notice notice-info is-dismissible">
                <div class="notice-div">
                    <div>
                        <p class="theme-name"><?php echo esc_html($theme->get('Name')); ?></p>
                        <p><?php _e('For information and detailed instructions, check out our theme documentation.', 'ppc-specialist'); ?></p>
                    </div>
                    <a class="button-primary" href="themes.php?page=ppc-specialist-guide-page"><?php _e('Theme Documentation', 'ppc-specialist'); ?></a>
                </div>
            </div>
        <?php
        }
    }
}
add_action('admin_notices', 'ppc_specialist_custom_admin_notice');
// Dismiss notice function
function ppc_specialist_dismiss_admin_notice() {
    update_user_meta(get_current_user_id(), 'dismissed_admin_notice', true);
}
add_action('wp_ajax_ppc_specialist_dismiss_admin_notice', 'ppc_specialist_dismiss_admin_notice');
// Enqueue scripts and styles
function ppc_specialist_enqueue_admin_script($hook) {
    // Admin JS
    wp_enqueue_script('ppc-specialist-admin.js', get_theme_file_uri('/assets/js/ppc-specialist-admin.js'), array('jquery'), true);

    // Enqueue custom CSS for the dashboard
    wp_enqueue_style('ppc-specialist-dashboard-css', get_theme_file_uri('/inc/dashboard/dashboard.css'));

    wp_localize_script('ppc-specialist-admin.js', 'ppc_specialist_scripts_localize', array(
        'ajax_url' => esc_url(admin_url('admin-ajax.php'))
    ));
}
add_action('admin_enqueue_scripts', 'ppc_specialist_enqueue_admin_script');
// Reset the dismissed notice status when the theme is switched
function ppc_specialist_after_switch_theme() {
    delete_user_meta(get_current_user_id(), 'dismissed_admin_notice');
}
add_action('after_switch_theme', 'ppc_specialist_after_switch_theme');
//get-start-function-end//

// tag count
function display_post_tag_count() {
    $tags = get_the_tags();
    $tag_count = ($tags) ? count($tags) : 0;
    $tag_text = ($tag_count === 1) ? 'tag' : 'tags'; // Check for pluralization
    echo $tag_count . ' ' . $tag_text;
}

//media post format
function ppc_specialist_get_media($type = array()){
	$content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $content, $type );
    return $output;
  }
}

// front page template
function ppc_specialist_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'ppc_specialist_front_page_template' );

// excerpt function
function ppc_specialist_custom_excerpt() {
    $excerpt = get_the_excerpt();
    $plain_text_excerpt = wp_strip_all_tags($excerpt);
    
    // Get dynamic word limit from theme mod
    $word_limit = esc_attr(get_theme_mod('ppc_specialist_post_excerpt', '30'));
    
    // Limit the number of words
    $limited_excerpt = implode(' ', array_slice(explode(' ', $plain_text_excerpt), 0, $word_limit));

    echo esc_html($limited_excerpt);
}

// typography
function ppc_specialist_fonts_scripts() {
	$ppc_specialist_headings_font = esc_html(get_theme_mod('ppc_specialist_headings_text'));
	$ppc_specialist_body_font = esc_html(get_theme_mod('ppc_specialist_body_text'));

	if( $ppc_specialist_headings_font ) {
		wp_enqueue_style( 'ppc-specialist-headings-fonts', '//fonts.googleapis.com/css?family='. $ppc_specialist_headings_font );
	} else {
		wp_enqueue_style( 'ppc-specialist-source-sans', '//fonts.googleapis.com/css?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900');
	}
	if( $ppc_specialist_body_font ) {
		wp_enqueue_style( 'ppc-specialist-body-fonts', '//fonts.googleapis.com/css?family='. $ppc_specialist_body_font );
	} else {
		wp_enqueue_style( 'ppc-specialist-source-body', '//fonts.googleapis.com/css?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'ppc_specialist_fonts_scripts' );

// Footer Text
function ppc_specialist_copyright_link() {
    $footer_text = get_theme_mod('ppc_specialist_footer_text', esc_html__('PPC Specialist WordPress Theme', 'ppc-specialist'));
    $credit_link = esc_url('https://www.ovationthemes.com/wordpress/free-ppc-wordpress-theme/');

    echo '<a href="' . $credit_link . '" target="_blank">' . esc_html($footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'ppc-specialist') . '</span></a>';
}

// custom sanitizations
// dropdown
function ppc_specialist_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
// slider custom control
if ( ! function_exists( 'ppc_specialist_sanitize_integer' ) ) {
	function ppc_specialist_sanitize_integer( $input ) {
		return (int) $input;
	}
}
// range contol
function ppc_specialist_sanitize_number_absint( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
// select post page
function ppc_specialist_sanitize_select( $input, $setting ){  
    $input = sanitize_key($input);    
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );      
}
// toggle switch
function ppc_specialist_callback_sanitize_switch( $value ) {
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );
}
//choices control
function ppc_specialist_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
// phone number
function ppc_specialist_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}
// Sanitize Sortable control.
function ppc_specialist_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

// customizer dropdown
function ppc_specialist_slider_dropdown(){
	if(get_option('ppc_specialist_slider_arrows') == true ) {
		return true;
	}
	return false;
}
function ppc_specialist_services_show_hide_dropdown(){
	if(get_option('ppc_specialist_services_show_hide') == true ) {
		return true;
	}
	return false;
}

// theme setup
function ppc_specialist_setup() {	
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'ppc-specialist-featured-image', 2000, 1200, true );
	add_image_size( 'ppc-specialist-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ppc-specialist' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio','quote',) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'ppc_specialist_setup' );

// widgets
function ppc_specialist_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ppc-specialist' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'ppc-specialist' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'ppc-specialist' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ppc-specialist' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ppc-specialist' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ppc-specialist' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ppc-specialist' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Category Dropdown', 'ppc-specialist' ),
		'id'            => 'product-cat',
		'description'   => __( 'Add widgets here to appear in your header.', 'ppc-specialist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ppc_specialist_widgets_init' );

//Enqueue scripts and styles.
function ppc_specialist_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'roboto',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' ),
		array(),
		'1.0'
	);

	//Bootstarp 
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );	
	
	// Theme stylesheet.
	wp_enqueue_style( 'ppc-specialist-style', get_stylesheet_uri() );

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'ppc-specialist-style',$ppc_specialist_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Block Style
	wp_enqueue_style( 'ppc-specialist-block-style', esc_url( get_template_directory_uri() ).'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'ppc-specialist-custom.js', get_theme_file_uri( '/assets/js/theme-script.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'ppc-specialist-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );


	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ppc_specialist_scripts' );

function ppc_specialist_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'ppc-specialist-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );
}
add_action( 'enqueue_block_editor_assets', 'ppc_specialist_block_editor_styles' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'ppc_specialist_customize_controls_register_scripts' );
function ppc_specialist_customize_controls_register_scripts() {
	
	wp_enqueue_style( 'ppc-specialist-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}

require get_parent_theme_file_path( '/inc/custom-header.php' );
require get_parent_theme_file_path( '/inc/template-tags.php' );
require get_parent_theme_file_path( '/inc/template-functions.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_parent_theme_file_path( '/inc/typofont.php' );
require get_template_directory() .'/inc/TGM/tgm.php';
require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );
require get_parent_theme_file_path( '/inc/breadcrumb.php' );
require get_parent_theme_file_path( 'inc/sortable/sortable_control.php' );