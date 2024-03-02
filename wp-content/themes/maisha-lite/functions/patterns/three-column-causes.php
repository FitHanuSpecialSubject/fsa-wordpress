<?php
/**
 * Three Column Causes block pattern
 */
return array(
	'title'	  => __( 'Three Column Causes', 'maisha' ),
	'categories' => array( 'maisha-blocks', 'featured' ),
	'content'	=> '<!-- wp:group {"align":"wide","className":"maisha-causes"} -->
	<div class="wp-block-group alignwide maisha-causes"><!-- wp:heading {"align":"center"} -->
	<h2 class="has-text-align-center"><strong>' . esc_html__( 'Donate for charity & stop the war !', 'maisha' ) . '</strong></h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . esc_html__( 'Marzipan marshmallow cookie cake icing marshmallow chocolate cookie carrot cake dragée chocolatecandy canes carrot cake. Wypas donut sweet roll 20,456 toffee sweet roll 19 jelly-o.', 'maisha' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:columns {"className":"has-3-columns"} -->
	<div class="wp-block-columns has-3-columns"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"align":"center"} -->
	<div class="wp-block-image"><figure class="aligncenter"><img src="' . esc_url( get_theme_file_uri( 'images/icon-1.jpg' ) ) . '" alt="" class=""/></figure></div>
	<!-- /wp:image -->
	
	<!-- wp:heading {"align":"center","level":3,"className":"headings"} -->
	<h3 class="has-text-align-center headings"><strong>' . esc_html__( 'First Cause', 'maisha' ) . '</strong></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . esc_html__( 'Fusce a ante nisl, vitae pretium enim. Nunc imperdiet iaculis augue nec porta! Phasellus congue sapien eget libero ornare lobortis.', 'maisha' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"align":"center"} -->
	<div class="wp-block-image"><figure class="aligncenter"><img src="' . esc_url( get_theme_file_uri( 'images/icon-2.jpg' ) ) . '" alt="" class=""/></figure></div>
	<!-- /wp:image -->
	
	<!-- wp:heading {"align":"center","level":3,"className":"headings"} -->
	<h3 class="has-text-align-center headings"><strong>' . esc_html__( 'Second Cause', 'maisha' ) . '</strong></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . esc_html__( 'Fusce a ante nisl, vitae pretium enim. Nunc imperdiet iaculis augue nec porta! Phasellus congue sapien eget libero ornare lobortis.', 'maisha' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"align":"center"} -->
	<div class="wp-block-image"><figure class="aligncenter"><img src="' . esc_url( get_theme_file_uri( 'images/icon-3.jpg' ) ) . '" alt="" class=""/></figure></div>
	<!-- /wp:image -->
	
	<!-- wp:heading {"align":"center","level":3,"className":"headings"} -->
	<h3 class="has-text-align-center headings"><strong>' . esc_html__( 'Third Cause', 'maisha' ) . '</strong></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . esc_html__( 'Fusce a ante nisl, vitae pretium enim. Nunc imperdiet iaculis augue nec porta! Phasellus congue sapien eget libero ornare lobortis.', 'maisha' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->',
);
