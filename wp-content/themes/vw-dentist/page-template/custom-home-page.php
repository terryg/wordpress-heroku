<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php do_action( 'vw_dentist_before_slider' ); ?>

<?php if( get_theme_mod( 'vw_dentist_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 4; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_dentist_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_dentist_string_limit_words( $excerpt,30 ) ); ?></p>
              <div class="more-btn">
                <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'vw-dentist' ); ?><i class="fa fa-angle-right"></i></a>
              </div>
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
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>

<?php do_action( 'vw_dentist_after_slider' ); ?>

<section id="serv-section">
  <div class="container">
    <?php if( get_theme_mod( 'vw_dentist_section_sub_title') != '') { ?>
      <span><h6><?php echo esc_html(get_theme_mod('vw_dentist_section_sub_title',''));?></h6></span>
    <?php }?>
    <?php if( get_theme_mod( 'vw_dentist_section_title') != '') { ?>
      <h3><?php echo esc_html(get_theme_mod('vw_dentist_section_title',''));?></h3>
    <?php }?>
    <div class="row m-0">
      <?php
        $catData =  get_theme_mod('vw_dentist_services','');
        if($catData){
        $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'vw-dentist'))); ?>
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
        <div class="col-lg-3 col-md-4">
          <div class="serv-box">
            <?php the_post_thumbnail(); ?>
            <h4><?php the_title(); ?></h4>
            <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_dentist_string_limit_words( $excerpt,10 ) ); ?></p>
            <div class="service-btn">
              <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'vw-dentist' ); ?><i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
          </div>
        </div>
        <?php endwhile;
        wp_reset_postdata();
      } ?>
    </div>
  </div>
</section>

<?php do_action( 'vw_dentist_after_services' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>
