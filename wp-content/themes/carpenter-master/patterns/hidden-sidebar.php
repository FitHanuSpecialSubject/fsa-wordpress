<?php

/**
 * Title: Hidden Sidebar
 * Slug: carpenter-master/hidden-sidebar
 * Inserter: no
 */
?>
<!-- wp:group {"metadata":{"name":"Sidebar"},"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|52","bottom":"var:preset|spacing|52"}},"position":{"type":""}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--52);padding-bottom:var(--wp--preset--spacing--52)"><!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide"><!-- wp:heading {"level":3,"className":"is-style-heading-basic","fontSize":"diminutive"} -->
      <h3 class="wp-block-heading is-style-heading-basic has-diminutive-font-size"><?php esc_html_e('Popular Posts', 'carpenter-master'); ?></h3>
      <!-- /wp:heading -->

      <!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
      <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":null,"minimumColumnWidth":"10rem"}} -->
        <!-- wp:columns {"verticalAlignment":"center"} -->
        <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
          <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:post-featured-image {"aspectRatio":"4/3"} /--></div>
          <!-- /wp:column -->

          <!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
          <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|4"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group"><!-- wp:post-title {"isLink":true,"fontSize":"tiny"} /-->

              <!-- wp:post-date {"format":"M j, Y","isLink":true,"fontSize":"minute"} /-->
            </div>
            <!-- /wp:group -->
          </div>
          <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
        <!-- /wp:post-template -->
      </div>
      <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->

  <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32"}}}} -->
  <hr class="wp-block-separator has-alpha-channel-opacity" style="margin-top:var(--wp--preset--spacing--32);margin-bottom:var(--wp--preset--spacing--32)" />
  <!-- /wp:separator -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide"><!-- wp:heading {"level":3,"className":"is-style-heading-basic is-style-default","fontSize":"diminutive"} -->
      <h3 class="wp-block-heading is-style-heading-basic is-style-default has-diminutive-font-size"><?php esc_html_e('Tags', 'carpenter-master'); ?></h3>
      <!-- /wp:heading -->

      <!-- wp:tag-cloud {"numberOfTags":10,"className":"is-style-outline"} /-->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
