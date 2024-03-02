<?php

add_action( 'admin_menu', 'ppc_specialist_gettingstarted' );
function ppc_specialist_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Documentation', 'ppc-specialist'), esc_html__('Theme Documentation', 'ppc-specialist'), 'edit_theme_options', 'ppc-specialist-guide-page', 'ppc_specialist_guide');   
}

function ppc_specialist_admin_theme_style() {
   wp_enqueue_style('ppc-specialist-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'ppc_specialist_admin_theme_style');

if ( ! defined( 'PPC_SPECIALIST_SUPPORT' ) ) {
	define('PPC_SPECIALIST_SUPPORT',__('https://wordpress.org/support/theme/ppc-specialist','ppc-specialist'));
}
if ( ! defined( 'PPC_SPECIALIST_REVIEW' ) ) {
	define('PPC_SPECIALIST_REVIEW',__('https://wordpress.org/support/theme/ppc-specialist/reviews/#new-post','ppc-specialist'));
}
if ( ! defined( 'PPC_SPECIALIST_LIVE_DEMO' ) ) {
define('PPC_SPECIALIST_LIVE_DEMO',__('https://www.ovationthemes.com/demos/ppc-specialist/','ppc-specialist'));
}
if ( ! defined( 'PPC_SPECIALIST_BUY_PRO' ) ) {
define('PPC_SPECIALIST_BUY_PRO',__('https://www.ovationthemes.com/wordpress/email-marketing-wordpress-theme/','ppc-specialist'));
}
if ( ! defined( 'PPC_SPECIALIST_PRO_DOC' ) ) {
define('PPC_SPECIALIST_PRO_DOC',__('https://ovationthemes.com/docs/ot-ppc-specialist-pro-doc/','ppc-specialist'));
}
if ( ! defined( 'PPC_SPECIALIST_FREE_DOC' ) ) {
define('PPC_SPECIALIST_FREE_DOC',__('https://ovationthemes.com/docs/ot-ppc-specialist-free-doc','ppc-specialist'));
}
if ( ! defined( 'PPC_SPECIALIST_THEME_NAME' ) ) {
define('PPC_SPECIALIST_THEME_NAME',__('Premium PPC Specialist Theme','ppc-specialist'));
}

/**
 * Theme Info Page
 */
function ppc_specialist_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'ppc-specialist'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( PPC_SPECIALIST_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Instructions', 'ppc-specialist'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( PPC_SPECIALIST_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'ppc-specialist'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( PPC_SPECIALIST_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'ppc-specialist'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','ppc-specialist'); ?></h3>
					<p><?php esc_html_e('To step the PPC Specialist theme follow the below steps.','ppc-specialist'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','ppc-specialist'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number and email address.','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ppc_specialist_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','ppc-specialist'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','ppc-specialist'); ?></a>

					<h4><?php esc_html_e('4. Setup Social Icons','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Social Media >> Add social links.','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ppc_specialist_urls') ); ?>" target="_blank"><?php esc_html_e('Add Social Icons','ppc-specialist'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','ppc-specialist'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ppc_specialist_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','ppc-specialist'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','ppc-specialist'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','ppc-specialist'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates >> Publish it.','ppc-specialist'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','ppc-specialist'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','ppc-specialist'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ppc_specialist_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','ppc-specialist'); ?></a>

					<h4><?php esc_html_e('3. Setup Products','ppc-specialist'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Woo-commerce >> Add New Product >> Add title, content, Select >> Publish it.','ppc-specialist'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ppc_specialist_millions_of_hours_section') ); ?>" target="_blank"><?php esc_html_e('Add Product','ppc-specialist'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(PPC_SPECIALIST_THEME_NAME); ?></h3>
				<img class="ppc_specialist_img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
					<a class="button-primary buynow" href="<?php echo esc_url( PPC_SPECIALIST_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'ppc-specialist'); ?></a>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( PPC_SPECIALIST_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'ppc-specialist'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( PPC_SPECIALIST_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'ppc-specialist'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'ppc-specialist');?> </li>
                    <li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'ppc-specialist');?> </li>
                   	<li class="upsell-ppc_specialist"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'ppc-specialist');?> </li>                    
                </ul>
        	</div>
		</div>
	</div>

<?php }?>
