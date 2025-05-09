<?php
/**
 * Register customizer panels & sections for SureCart CPT.
 *
 * @package     Astra
 * @link        https://wpastra.com/
 * @since       Astra 4.6.13
 * @since       4.6.9 Changed to using Astra_Customizer API
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Astra_Customizer_Register_Surecart_Section' ) ) {

	/**
	 * Register SureCart CPT Customizer Configurations.
	 */
	class Astra_Customizer_Register_Surecart_Section extends Astra_Customizer_Config_Base {
		/**
		 * Register Panels and Sections for Customizer.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 4.6.13
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

				$_configs = array(
					array(
						'name'     => 'ast-surecart',
						'type'     => 'section',
						'priority' => 68,
						'title'    => __( 'SureCart', 'astra' ),
					),
				);

				$surecart_post_types = array(
					'sc_product'    => array(
						'name'     => 'section-posttype-sc_product',
						'type'     => 'section',
						'section'  => 'ast-surecart',
						'title'    => __( 'Products', 'astra' ),
						'priority' => 69,
					),
					'sc_collection' => array(
						'name'     => 'section-posttype-sc_collection',
						'type'     => 'section',
						'section'  => 'ast-surecart',
						'title'    => __( 'Collections', 'astra' ),
						'priority' => 70,
					),
					'sc_upsell'     => array(
						'name'     => 'section-posttype-sc_upsell',
						'type'     => 'section',
						'section'  => 'ast-surecart',
						'title'    => __( 'Upsells', 'astra' ),
						'priority' => 71,
					),
				);

				return array_merge( $configurations, $_configs, array_values( $surecart_post_types ) );
		}
	}
}

new Astra_Customizer_Register_Surecart_Section();
