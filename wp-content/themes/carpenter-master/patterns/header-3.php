<?php

/**
 * Title: Box Header
 * Slug: carpenter-master/header-3
 * Categories: header, carpenter-master-patterns
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Header"},"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|48","bottom":"var:preset|spacing|24","left":"var:preset|spacing|48","right":"var:preset|spacing|48"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-default" style="padding-top:var(--wp--preset--spacing--48);padding-right:var(--wp--preset--spacing--48);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--48)"><!-- wp:group {"className":"is-style-section-2","style":{"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|32","right":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
  <div class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--32)"><!-- wp:group {"className":"is-style-default","layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-default"><!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
      <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
        <div class="wp-block-group"><!-- wp:site-title {"level":0} /-->

          <!-- wp:site-tagline /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"default"}} -->
        <div class="wp-block-group">
          <!-- wp:navigation {"className":"is-style-navigation-basic is-style-navigation-d-medium"} -->

          <!-- wp:navigation-link {"label":"<?php esc_html_e('Home', 'carpenter-master'); ?>","url":"<?php echo esc_url(home_url('/')); ?>","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Blog', 'carpenter-master'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('About', 'carpenter-master'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Pricing', 'carpenter-master'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Services', 'carpenter-master'); ?>","url":"#!","kind":"custom"} /-->

          <!-- /wp:navigation -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
