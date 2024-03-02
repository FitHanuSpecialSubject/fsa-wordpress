<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0
 * @access public
 */
final class canary_led_Customize {

	/**
	 * Returns the instance.
	 *
	 */
	public static function canary_led_get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->canary_led_setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 */
	private function canary_led_setup_actions() {

		// Register panels, canary_led_sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'canary_led_sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'canary_led_enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer canary_led_sections.
	 *
	 */
	public function canary_led_sections( $manager ) {

		// Load custom canary_led_sections.
		require get_template_directory() . '/inc/upgrade-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Canary_Led_Customize_Section_Pro' );

		// Register canary_led_sections.
		$manager->add_section(
			new Canary_Led_Customize_Section_Pro(
				$manager,
				'canary-led',
				array(
					'title'    => esc_html__( 'Led', 'canary-led' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',         'canary-led' ),
					'pro_url'  => 'https://themecanary.com/themes/canary-led-pro/',
					'priority' => 1
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function canary_led_enqueue_control_scripts() {

		wp_enqueue_script( 'canary-led-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/js/customizer-custom-scripts.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'canary-led-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-control.css' );
	}
}

// Doing this customizer thang!
canary_led_Customize::canary_led_get_instance();
