<?php
/**
 * Led Callback Functions
 *
 * @package canary led
 */

/**
 * Led call back functions for securing the code before entering into the database
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function canary_led_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


function canary_led_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function canary_led_menu_callback( $control ) {
   if ( $control->manager->get_setting('site_branding_option')->value() == 'default-menu' ) {
      return true;
   } else {
      return false;
   }
}