<?php
	
load_template( get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php' );

/**
 * Recommended plugins.
 */
function ppc_specialist_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'WooCommerce', 'ppc-specialist' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	ppc_specialist_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'ppc_specialist_register_recommended_plugins' );