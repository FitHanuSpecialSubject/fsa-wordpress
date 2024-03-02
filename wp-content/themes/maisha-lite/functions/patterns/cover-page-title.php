<?php
/**
 * Cover with page title block pattern
 */
return array(
	'title'	  => __( 'Cover with Page Title', 'maisha' ),
	'categories' => array( 'maisha-blocks', 'featured' ),
	'content'	=> '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'images/hero.jpg' ) ) . '","hasParallax":true,"dimRatio":70,"align":"full","className":"maisha-page-title"} -->
	<div class="wp-block-cover alignfull has-background-dim-70 has-background-dim has-parallax maisha-page-title" style="background-image:url(' . esc_url( get_theme_file_uri( 'images/hero.jpg' ) ) . ')"><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"6rem"}}} -->
	<h1 class="has-text-align-center" style="font-size:6rem">' . esc_html__( 'Page Title', 'maisha' ) . '</h1>
	<!-- /wp:heading -->
	
	<!-- wp:separator -->
	<hr class="wp-block-separator"/>
	<!-- /wp:separator -->
	
	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . esc_html__( 'Here goes a small title', 'maisha' ) . '</p>
	<!-- /wp:paragraph --></div></div>
	<!-- /wp:cover -->',
);
