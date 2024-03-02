<?php
/**
 * Add the about page under appearance.
 *
 * Display the details about the theme information
 *
 * @package canary led
 */
?>
<?php
// About Information
add_action( 'admin_menu', 'canary_led_about' );
function canary_led_about() {         
        add_theme_page( esc_html__('About Theme', 'canary-led'), esc_html__('Canary Led Theme', 'canary-led'), 'edit_theme_options', 'canary-led-about', 'canary_led_about_page');   
}

// CSS for About Theme Page
function canary_led_admin_theme_style($hook) {

        if ( 'appearance_page_canary-led-about' != $hook ) {
        return;
    }

   wp_enqueue_style('canary-led-admin-style', get_template_directory_uri() . '/inc/admin/theme-info.css');
}
add_action('admin_enqueue_scripts', 'canary_led_admin_theme_style');

function canary_led_about_page() {
$theme = wp_get_theme();
$pro_purchase_url = "https://themecanary.com/pricing/canary-led/";
$doc_url = "https://themecanary.com/documentation/canary-led/";
$demo_url = "https://themecanary.com/themes/canary-led/#demos";
$support_url = "https://wordpress.org/support/theme/canary-led/";

$theme_name = esc_html( $theme->Name );
$free_theme_name = str_replace( ' Pro', '',$theme_name );
$plugin_is_installed = file_exists( WP_PLUGIN_DIR. '/one-click-demo-import' );
$plugin_is_active = is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' );
?>
<div class="canary-led-wrapper">
  <div id="theme-info-page">
    <div class="admin-banner">
      <div class="banner-left">
        <h2>
          <?php echo esc_html( $theme->Name ); ?>
        </h2>
        <p>
          <?php esc_html_e( 'Multipurpose WordPress Theme', 'canary-led' ); ?>
        </p>
      </div>
      <div class="banner-right">
        <div class="canary-led-buttons">
          <a href="<?php echo esc_url($doc_url); ?>" class="canary-led-admin-button demo" target="_blank" rel="noreferrer">
            <?php esc_html_e( 'Documentation', 'canary-led' ); ?>
          </a>
          <a href="<?php echo esc_url($demo_url); ?>" class="canary-led-admin-button documentation" target="_blank" rel="noreferrer">
            <?php esc_html_e( 'Demo', 'canary-led' ); ?>
          </a>
          <a href="<?php echo esc_url($pro_purchase_url); ?>" class="canary-led-admin-button upgrade-to-pro" target="__blank">
            <?php echo esc_html( 'Upgrade Pro', 'canary-led' ); ?>
          </a>
        </div>
      </div>
    </div>

    <div class="theme-canary-demo-import">
      <h2><?php esc_html_e( 'Download Demo content for Free!', 'canary-led' ); ?></h2>
      <p><?php esc_html_e( 'Install Recommended Plugins and access to all the Theme Canary Demo templates. This plugin will help you to show exactly as shown in demo', 'canary-led' ); ?></p>
        <?php if ( ! $plugin_is_installed  ): ?>
        <a href="javascript:void(0);"  class="canary-led-admin-button canary-led-install-plugin" >
          <span class="dashicons dashicons-arrow-down-alt"></span>
            <?php printf( esc_html( 'Install Plugin', 'canary-led' ), $theme->Name ); ?>
        </a>
        <?php elseif ( $plugin_is_installed && ! $plugin_is_active ): ?>
        <a href="javascript:void(0);"  class="canary-led-admin-button canary-led-activate-plugin" >
          <span class="dashicons dashicons-arrow-down-alt"></span>
            <?php printf( esc_html( 'Activate Plugin', 'canary-led' ), $theme->Name ); ?>
        </a>
        <?php else:?>
        <a href="<?php echo esc_url( admin_url( 'themes.php?page=one-click-demo-import' ) ); ?>"  class="canary-led-admin-button" >
          <span class="dashicons dashicons-arrow-down-alt"></span>
            <?php printf( esc_html( 'Explore Templates', 'canary-led' ), $theme->Name ); ?>
        </a>
        <?php endif; ?>
          <small><?php esc_html_e( 'Note: Clicking the button will both install and activate recommended plugins. It may take few minutes to install all the plugins', 'canary-led' ); ?></small>
    </div>
    <div class="feature-list">
          <div class="canary-led-about-container compare-table">
              <h3>
                <?php echo esc_html( $free_theme_name ); ?>
                <?php esc_html_e( 'Free Vs Pro', 'canary-led' ); ?>
              </h3>
              <table>
                <thead>
                   <tr>
                    <th>
                      <?php esc_html_e( 'Features', 'canary-led' ); ?>
                    </th>
                    <th>
                     <?php esc_html_e( 'Canary Led Free', 'canary-led' ); ?>
                    </th>
                    <th>
                      <?php esc_html_e( 'Canary Led Pro', 'canary-led' ); ?>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Easy Setup', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Responsive', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Color Skin', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Background Color Options', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                   <tr>
                    <td>
                      <?php esc_html_e( 'Font Color Options', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Font Family', 'canary-led' ); ?>
                    </td>
                    <td> <?php esc_html_e( '1 Google Fonts', 'canary-led' ); ?>
                    </td>
                    <td><?php esc_html_e( '800+ Google Fonts', 'canary-led' ); ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Demos', 'canary-led' ); ?>
                    </td>
                    <td><?php esc_html_e( '7', 'canary-led' ); ?>
                    </td>
                    <td><?php esc_html_e( '12', 'canary-led' ); ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Slider ', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Multiple Footer Column', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Footer Editing Options', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Font Size', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Change Excerpt & Search Text', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Front/ Home page posts categories', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Sticky Menu', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Blog/ Single Options', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Change Header Content', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Boxed Layout', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Site Layout', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Small Blog', 'canary-led' ); ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Footer Menu','canary-led') ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Menu and Logo Same Line','canary-led') ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Logo and Social Center','canary-led') ?>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <?php esc_html_e( 'Menu Center','canary-led') ?>
                    </td>
                    <td><span class="dashicons dashicons-no"></span>
                    </td>
                    <td><span class="dashicons dashicons-yes"></span>
                    </td>
                  </tr>
                </tbody>
              </table>
          </div>
      <div class="about-us">
        <div class="our-product"><span><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></span>
          <h3>
            <?php esc_html_e( 'Love our product?', 'canary-led' ); ?>
          </h3>
          <h4>
            <?php esc_html_e( 'Motivate 5 Star rating', 'canary-led' ); ?>
          </h4>
          <a href="https://wordpress.org/support/theme/canary-led/reviews/?filter=5" class="canary-led-admin-button" target="__blank">
            <?php esc_html_e( 'Rate Us', 'canary-led' ); ?>
          </a>
        </div>
        <div class="our-product">
          <h3>
            <?php esc_html_e( 'Still have any question?', 'canary-led' ); ?>
          </h3>
          <p>
          <?php esc_html_e( 'Don\'t hesitate to ask', 'canary-led' ); ?>
          </p>
          <a href="<?php echo esc_url($support_url); ?>" class="canary-led-admin-button" target="_blank">
            <?php esc_html_e( 'Get Support', 'canary-led' ); ?>
          </a>
        </div>
        <div class="canary-led-buttons">
          <a href="<?php echo esc_url($pro_purchase_url); ?>" class="canary-led-admin-button upgrade-to-pro" rel="noreferrer" target="_blank"><i class="fa fa-paint-brush"></i>
            <?php printf( esc_html( 'Get Canary Led Pro', 'canary-led' ), $theme->Name ); ?>
          </a>
          <a href="<?php echo esc_url($doc_url); ?>" class="canary-led-admin-button premium-button documentation" target="_blank" rel="noreferrer"><i class="fa fa-book"></i>
            <?php esc_html_e( 'Documentation', 'canary-led' ); ?>
          </a>
        </div>
      </div>
    </div>
</div>

<?php }