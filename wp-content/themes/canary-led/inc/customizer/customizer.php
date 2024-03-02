<?php
/**
 * led Theme Customizer
 *
 * @package canary led
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function canary_led_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'canary_led_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'canary_led_customize_partial_blogdescription',
			)
		);
	}

	class Canary_Led_title_display extends WP_Customize_Control {
        public $type = 'main-title';
        public $label = '';
        public function render_content() {
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php
        }
    }

require_once get_template_directory() . '/inc/custom/class-customizer-toggle-control.php';
require_once get_template_directory() . '/inc/custom/radio-image/class-radio-image-control.php';
$wp_customize->register_control_type( 'Canary_Led_Control_Radio_Image' );
require get_template_directory() . '/inc/customizer/control-checkbox-multiple.php';
require get_template_directory() . '/inc/customizer/header-section/header-image.php';
require get_template_directory() . '/inc/customizer/all-theme-options.php';
require get_template_directory() . '/inc/customizer/header-section/site-identity.php';
require get_template_directory() . '/inc/customizer/header-section/colors.php';
require get_template_directory() . '/inc/customizer/header-section/layout.php';
require get_template_directory() . '/inc/customizer/sanitize-callback-functions.php';

}
add_action( 'customize_register', 'canary_led_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function canary_led_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function canary_led_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function canary_led_customize_preview_js() {
	wp_enqueue_script( 'canary-led-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), Canary_Led_Version, true );
}
add_action( 'customize_preview_init', 'canary_led_customize_preview_js' );
