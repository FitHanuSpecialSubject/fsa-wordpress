<?php

/**
 * Enquing customizer-custom-scripts for Home/ Frontpage checkbox issue
 *
 * @since  1.0
 * @access public
 */
final class canary_led_frontpage_settings {

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
	 * Sets up initial actions.
	 *
	 */
	private function canary_led_setup_actions() {

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'canary_led_enqueue_control_scripts' ), 0 );
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function canary_led_enqueue_control_scripts() {

		wp_enqueue_script( 'canary-led-customizer-custom-scripts', trailingslashit( get_template_directory_uri() ) . 'js/customizer-custom-scripts.js', array( 'customize-controls' ) );
	}
}

// Doing this customizer thang!
canary_led_frontpage_settings::canary_led_get_instance();
