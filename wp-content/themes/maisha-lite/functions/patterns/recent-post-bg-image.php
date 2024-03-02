<?php
/**
 * Three column cover block pattern
 */
return array(
	'title'	  => __( 'Three Column Cover Block', 'maisha' ),
	'categories' => array( 'maisha-blocks', 'featured' ),
	'content'	=> '<!-- wp:group {"align":"full","className":"maisha-recent-post"} -->
	<div class="wp-block-group alignfull maisha-recent-post"><!-- wp:columns {"align":"full","className":"has-3-columns recent-post-standard maisha"} -->
	<div class="wp-block-columns alignfull has-3-columns recent-post-standard maisha"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'images/post-1.jpg' ) ) . '","dimRatio":0,"className":"is-light"} -->
	<div class="wp-block-cover is-light"><img class="wp-block-cover__image-background" alt="" src="' . esc_url( get_theme_file_uri( 'images/post-1.jpg' ) ) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size"></p>
	<!-- /wp:paragraph -->
		
	<!-- wp:query {"queryId":2,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query"><!-- wp:post-template -->
	<!-- wp:post-title {"isLink":true,"textColor":"white","fontSize":"small"} /-->
	<!-- /wp:post-template --></div>
	<!-- /wp:query --></div></div>
	<!-- /wp:cover --></div>
	<!-- /wp:column -->
		
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'images/post-2.jpg' ) ) . '","dimRatio":0} -->
	<div class="wp-block-cover"><img class="wp-block-cover__image-background" alt="" src="' . esc_url( get_theme_file_uri( 'images/post-2.jpg' ) ) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size"></p>
	<!-- /wp:paragraph -->
		
	<!-- wp:query {"queryId":0,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query"><!-- wp:post-template -->
	<!-- wp:post-title {"isLink":true,"textColor":"white","fontSize":"small"} /-->
	<!-- /wp:post-template --></div>
	<!-- /wp:query --></div></div>
	<!-- /wp:cover --></div>
	<!-- /wp:column -->
		
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'images/post-3.jpg' ) ) . '","dimRatio":0} -->
	<div class="wp-block-cover"><img class="wp-block-cover__image-background" alt="" src="' . esc_url( get_theme_file_uri( 'images/post-3.jpg' ) ) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size"></p>
	<!-- /wp:paragraph -->
		
	<!-- wp:query {"queryId":1,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query"><!-- wp:post-template -->
	<!-- wp:post-title {"isLink":true,"textColor":"white","fontSize":"small"} /-->
	<!-- /wp:post-template --></div>
	<!-- /wp:query --></div></div>
	<!-- /wp:cover --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->',
);
