<?php
/**
 * Cover with call to action block pattern
 */
return array(
	'title'	  => __( 'Cover with Call-to-Action', 'maisha' ),
	'categories' => array( 'maisha-blocks', 'featured' ),
	'content'	=> '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'images/hero.jpg' ) ) . '","hasParallax":true,"dimRatio":15,"minHeight":700,"align":"full","className":"is-style-editorskit-diagonal"} -->
    <div class="wp-block-cover alignfull has-background-dim-20 has-background-dim has-parallax is-style-editorskit-diagonal" style="background-image:url(' . esc_url( get_theme_file_uri( 'images/hero.jpg' ) ) . ');min-height:700px"><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","className":"content-caption","style":{"color":{"gradient":"linear-gradient(135deg,rgba(32,32,34,0.74) 0%,rgba(34,36,38,0.51) 100%)"}}} -->
    <div class="wp-block-group alignwide content-caption has-text-color has-white-color has-text-color has-background" style="background:linear-gradient(135deg,rgba(32,32,34,0.74) 0%,rgba(34,36,38,0.51) 100%)"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":1} -->
    <h1>' . esc_html__( 'Maisha', 'maisha' ) . '</h1>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph -->
    <p>' . esc_html__( 'Beautiful charity theme inspired by “Virunga” documentary. Virunga National Park is one of the most bio-diverse places on earth and home to the planet´s last remaining mountain gorillas. Maisha is dedicated to raising awareness for the problems this 90 years old National Park is faced with.', 'maisha' ) . '</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons -->
    <div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"text":"#333333"}},"backgroundColor":"orange"} -->
    <div class="wp-block-button"><a class="wp-block-button__link has-orange-background-color has-text-color has-background" style="color:#333333">' . esc_html__( 'Donate Now', 'maisha' ) . '</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div></div>
    <!-- /wp:group --></div></div>
    <!-- /wp:cover -->',
);
