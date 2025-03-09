<?php

/**
 * Title: Query Loop 1
 * Slug: carpenter-master/query-loop-1
 * Categories: query
 * Block Types: core/query
 */
?>
<!-- wp:group {"tagName":"section","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|52","bottom":"var:preset|spacing|52"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--52);padding-bottom:var(--wp--preset--spacing--52)"><!-- wp:query {"queryId":4,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"default"}} -->
  <div class="wp-block-query"><!-- wp:post-template {"className":"is-style-post-template-2 is-style-post-template","layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null},"isGridResponsive":true,"gridSMCols":2,"gridLGCols":3,"gridXLCols":3,"gridXXLCols":3} -->
    <!-- wp:group {"className":"is-style-default","style":{"spacing":{"blockGap":"0"},"border":{"width":"1px"}},"borderColor":"secondary-100","layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-default has-border-color has-secondary-100-border-color" style="border-width:1px"><!-- wp:group {"layout":{"type":"default"}} -->
      <div class="wp-block-group"><!-- wp:group {"layout":{"type":"default"}} -->
        <div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","align":"center","className":"is-style-image-1"} /--></div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24","right":"var:preset|spacing|24"}}},"layout":{"type":"default"}} -->
      <div class="wp-block-group is-style-default" style="padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"layout":{"type":"default"}} -->
        <div class="wp-block-group is-style-default"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"default"}} -->
          <div class="wp-block-group"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} /-->

            <!-- wp:post-title {"isLink":true,"fontSize":"diminutive"} /-->

            <!-- wp:post-date {"isLink":true,"fontSize":"minute"} /-->
          </div>
          <!-- /wp:group -->

          <!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":10,"fontSize":"tiny"} /-->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"arrow","className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:query-pagination-previous {"label":"Prev"} /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next {"label":"Next"} /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('No posts were found.', 'carpenter-master'); ?></p>
    <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
  </div>
  <!-- /wp:query -->
</section>
<!-- /wp:group -->
