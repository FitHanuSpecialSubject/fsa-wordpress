<?php 

$ppc_specialist_custom_style= "";

/*---------------------------Width -------------------*/

$ppc_specialist_theme_width = get_theme_mod( 'ppc_specialist_width_options','full_width');

if($ppc_specialist_theme_width == 'full_width'){

$ppc_specialist_custom_style .='body{';

	$ppc_specialist_custom_style .='max-width: 100%;';

$ppc_specialist_custom_style .='}';

}else if($ppc_specialist_theme_width == 'Container'){

$ppc_specialist_custom_style .='body{';

	$ppc_specialist_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

$ppc_specialist_custom_style .='}';

$ppc_specialist_custom_style .='@media screen and (max-width:600px){';

$ppc_specialist_custom_style .='body{';

    $ppc_specialist_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$ppc_specialist_custom_style .='} }';

}else if($ppc_specialist_theme_width == 'container_fluid'){

$ppc_specialist_custom_style .='body{';

	$ppc_specialist_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$ppc_specialist_custom_style .='}';

$ppc_specialist_custom_style .='@media screen and (max-width:600px){';

$ppc_specialist_custom_style .='body{';

    $ppc_specialist_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$ppc_specialist_custom_style .='} }';
}

//------------------sticky-header--------
if (false === get_option('ppc_specialist_sticky_header')) {
    add_option('ppc_specialist_sticky_header', 'off');
}

// Define the custom CSS based on the 'ppc_specialist_sticky_header' option

if (get_option('ppc_specialist_sticky_header', 'off') !== 'on') {
    $ppc_specialist_custom_style .= '.fixed-header.fixed {';
    $ppc_specialist_custom_style .= 'position: static;';
    $ppc_specialist_custom_style .= '}';
}

if (get_option('ppc_specialist_sticky_header', 'off') !== 'off') {
    $ppc_specialist_custom_style .= '.fixed-header.fixed {';
    $ppc_specialist_custom_style .= 'position: fixed; background: #fff; box; box-shadow: 0px 3px 10px 2px #eee;';
    $ppc_specialist_custom_style .= '}';

    $ppc_specialist_custom_style .= '.admin-bar .fixed {';
    $ppc_specialist_custom_style .= ' margin-top: 32px;';
    $ppc_specialist_custom_style .= '}';
}

/*---------------------------Scroll-top-position -------------------*/

$ppc_specialist_scroll_options = get_theme_mod( 'ppc_specialist_scroll_options','right_align');

if($ppc_specialist_scroll_options == 'right_align'){

$ppc_specialist_custom_style .='.scroll-top button{';

	$ppc_specialist_custom_style .='';

$ppc_specialist_custom_style .='}';

}else if($ppc_specialist_scroll_options == 'center_align'){

$ppc_specialist_custom_style .='.scroll-top button{';

	$ppc_specialist_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$ppc_specialist_custom_style .='}';

}else if($ppc_specialist_scroll_options == 'left_align'){

$ppc_specialist_custom_style .='.scroll-top button{';

	$ppc_specialist_custom_style .='right: auto; left:5%; margin: 0 auto';

$ppc_specialist_custom_style .='}';
}

/*---------------------------text-transform-------------------*/

$ppc_specialist_text_transform = get_theme_mod( 'ppc_specialist_menu_text_transform','CAPITALISE');
if($ppc_specialist_text_transform == 'CAPITALISE'){

$ppc_specialist_custom_style .='nav#top_gb_menu ul li a{';

	$ppc_specialist_custom_style .='text-transform: capitalize ; font-size: 14px;';

$ppc_specialist_custom_style .='}';

}else if($ppc_specialist_text_transform == 'UPPERCASE'){

$ppc_specialist_custom_style .='nav#top_gb_menu ul li a{';

	$ppc_specialist_custom_style .='text-transform: uppercase ; font-size: 14px;';

$ppc_specialist_custom_style .='}';

}else if($ppc_specialist_text_transform == 'LOWERCASE'){

$ppc_specialist_custom_style .='nav#top_gb_menu ul li a{';

	$ppc_specialist_custom_style .='text-transform: lowercase ; font-size: 14px;';

$ppc_specialist_custom_style .='}';
}

/*-------------------------Slider-content-alignment-------------------*/


$ppc_specialist_slider_content_alignment = get_theme_mod( 'ppc_specialist_slider_content_alignment','LEFT-ALIGN');

if($ppc_specialist_slider_content_alignment == 'LEFT-ALIGN'){

$ppc_specialist_custom_style .='#slider .carousel-caption{';

	$ppc_specialist_custom_style .='text-align:left; left:15%; right:50%';

$ppc_specialist_custom_style .='}';


}else if($ppc_specialist_slider_content_alignment == 'CENTER-ALIGN'){

$ppc_specialist_custom_style .='#slider .carousel-caption{';

	$ppc_specialist_custom_style .='text-align:center; left:15%; right:15%';

$ppc_specialist_custom_style .='}';


}else if($ppc_specialist_slider_content_alignment == 'RIGHT-ALIGN'){

$ppc_specialist_custom_style .='#slider .carousel-caption{';

	$ppc_specialist_custom_style .='text-align:right; left:50%; right:15%';

$ppc_specialist_custom_style .='}';

}

//---------------------------------Logo-Max-height---------	
$ppc_specialist_logo_max_height = get_theme_mod('ppc_specialist_logo_max_height','100');

if($ppc_specialist_logo_max_height != false){

$ppc_specialist_custom_style .='.custom-logo-link img{';

	$ppc_specialist_custom_style .='max-height: '.esc_html($ppc_specialist_logo_max_height).'px;';

$ppc_specialist_custom_style .='}';
}
//related products
if( get_option( 'ppc_specialist_related_product',true) != 'on') {

$ppc_specialist_custom_style .='.related.products{';

	$ppc_specialist_custom_style .='display: none;';
	
$ppc_specialist_custom_style .='}';
}

if( get_option( 'ppc_specialist_related_product',true) != 'off') {

$ppc_specialist_custom_style .='.related.products{';

	$ppc_specialist_custom_style .='display: block;';
	
$ppc_specialist_custom_style .='}';
}

// footer text alignment
$ppc_specialist_footer_content_alignment = get_theme_mod( 'ppc_specialist_footer_content_alignment','CENTER-ALIGN');

if($ppc_specialist_footer_content_alignment == 'LEFT-ALIGN'){

$ppc_specialist_custom_style .='.site-info{';

	$ppc_specialist_custom_style .='text-align:left; padding-left: 30px;';

$ppc_specialist_custom_style .='}';

$ppc_specialist_custom_style .='.site-info a{';

	$ppc_specialist_custom_style .='padding-left: 30px;';

$ppc_specialist_custom_style .='}';


}else if($ppc_specialist_footer_content_alignment == 'CENTER-ALIGN'){

$ppc_specialist_custom_style .='.site-info{';

	$ppc_specialist_custom_style .='text-align:center;';

$ppc_specialist_custom_style .='}';


}else if($ppc_specialist_footer_content_alignment == 'RIGHT-ALIGN'){

$ppc_specialist_custom_style .='.site-info{';

	$ppc_specialist_custom_style .='text-align:right; padding-right: 30px;';

$ppc_specialist_custom_style .='}';

$ppc_specialist_custom_style .='.site-info a{';

	$ppc_specialist_custom_style .='padding-right: 30px;';

$ppc_specialist_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('ppc_specialist_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('ppc_specialist_slider_button_show_hide', '1');

$ppc_specialist_custom_style .= '#slider .home-btn {';

if ($main_button_setting == 'off') {
    $ppc_specialist_custom_style .= 'display: none;';
}

$ppc_specialist_custom_style .= '}';

// Add media query for mobile devices
$ppc_specialist_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $ppc_specialist_custom_style .= '#slider .home-btn { display: none; }';
}
$ppc_specialist_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('ppc_specialist_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('ppc_specialist_scroll_enable', '1');

$ppc_specialist_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $ppc_specialist_custom_style .= 'display: none;';
}

$ppc_specialist_custom_style .= '}';

// Add media query for mobile devices
$ppc_specialist_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $ppc_specialist_custom_style .= '.scrollup { display: none; }';
}
$ppc_specialist_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('ppc_specialist_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('ppc_specialist_enable_breadcrumb', '1');

$ppc_specialist_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $ppc_specialist_custom_style .= 'display: none;';
}

$ppc_specialist_custom_style .= '}';

// Add media query for mobile devices
$ppc_specialist_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $ppc_specialist_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$ppc_specialist_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('ppc_specialist_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('ppc_specialist_single_enable_breadcrumb', '1');

$ppc_specialist_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $ppc_specialist_custom_style .= 'display: none;';
}

$ppc_specialist_custom_style .= '}';

// Add media query for mobile devices
$ppc_specialist_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $ppc_specialist_custom_style .= '.single_breadcrumb { display: none; }';
}
$ppc_specialist_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('ppc_specialist_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('ppc_specialist_woocommerce_enable_breadcrumb', '1');

$ppc_specialist_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $ppc_specialist_custom_style .= 'display: none;';
}

$ppc_specialist_custom_style .= '}';

// Add media query for mobile devices
$ppc_specialist_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $ppc_specialist_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$ppc_specialist_custom_style .= '}';