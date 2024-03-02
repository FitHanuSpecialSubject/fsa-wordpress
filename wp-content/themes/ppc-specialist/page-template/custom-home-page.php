<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('ppc_specialist_slider_arrows') == '1'){ ?>
    <section id="slider">
      <span class="design-right"></span>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $mod =  get_theme_mod( 'ppc_specialist_post_setting' . $i );
            if ( 'page-none-selected' != $mod ) {
              $ppc_specialist_slide_post[] = $mod;
            }
          }
           if( !empty($ppc_specialist_slide_post) ) :
          $args = array(
            'post_type' =>array('post'),
            'post__in' => $ppc_specialist_slide_post,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($ppc_specialist_slide_post) && is_sticky()) {
              $args['post__in'] = get_option('sticky_posts');
          }

          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else { ?><div class="bg-color"></div> <?php } ?>
            <div class="carousel-caption">
              <a href="<?php the_permalink(); ?>"><h2 class="slider-title"><?php the_title();?></h2></a>
              <?php if( get_option('ppc_specialist_slider_excerpt_show_hide',false) != 'off'){ ?>
                <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('ppc_specialist_slider_excerpt_count',25) );?></p>
              <?php } ?>
              <div class="home-btn my-4">
                <a class="py-2 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('ppc_specialist_slider_read_more',__('READ MORE','ppc-specialist'))); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php if( get_option('ppc_specialist_services_show_hide') == '1'){ ?>
    <section id="skill" class="py-5">
      <div class="container">
        <div class="row">
          <?php
            $ppc_specialist_skill_category=  get_theme_mod('ppc_specialist_services_category_setting');if($ppc_specialist_skill_category){
            $ppc_specialist_page_query = new WP_Query(array( 'category_name' => esc_html($ppc_specialist_skill_category ,'ppc-specialist')));?>
              <?php while( $ppc_specialist_page_query->have_posts() ) : $ppc_specialist_page_query->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12 skill-inn mb-5">
                  <div class="box mb-5">
                    <?php the_post_thumbnail(); ?>
                    <div class="box-content px-3 pt-5 pb-2">
                      <h4 class="skill-title"><?php the_title();?></h4>
                      <p class="mb-0 skill-txt"><?php echo wp_trim_words( get_the_content(),25 );?></p>
                      <div class="home-btn my-2">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('MORE INFO','ppc-specialist'); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile;
            wp_reset_postdata();
          }?>
        </div>      
      </div>
    </section>
  <?php }?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>