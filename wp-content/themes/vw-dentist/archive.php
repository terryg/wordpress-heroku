<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package VW Dentist
 */

get_header(); ?>

<div class="container">
  <div class="middle-align">
    <?php
        $theme_lay = get_theme_mod( 'vw_dentist_theme_options','Right Sidebar');
        if($theme_lay == 'Left Sidebar'){ ?>
        <div class="row m-0">
          <div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
          <div id="our-services" class="services col-lg-8 col-md-8">
            <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/content'); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'vw-dentist' ),
                      'next_text'          => __( 'Next page', 'vw-dentist' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-dentist' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
    <?php }else if($theme_lay == 'Right Sidebar'){ ?>
        <div class="row m-0">
          <div id="our-services" class="services col-lg-8 col-md-8">
            <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/content'); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'vw-dentist' ),
                      'next_text'          => __( 'Next page', 'vw-dentist' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-dentist' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        </div>
    <?php }else if($theme_lay == 'One Column'){ ?>
        <div id="our-services" class="services">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content'); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-dentist' ),
                    'next_text'          => __( 'Next page', 'vw-dentist' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-dentist' ) . ' </span>',
                ) );
            ?>
            <div class="clearfix"></div>
          </div>
        </div>
    <?php }else if($theme_lay == 'Three Columns'){ ?>
        <div class="row m-0">
          <div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
          <div id="our-services" class="services col-lg-6 col-md-6">
            <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/content'); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'vw-dentist' ),
                      'next_text'          => __( 'Next page', 'vw-dentist' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-dentist' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
        </div>
    <?php }else if($theme_lay == 'Four Columns'){ ?>
        <div class="row m-0">
          <div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
          <div id="our-services" class="services col-lg-3 col-md-3">
            <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/content'); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'vw-dentist' ),
                      'next_text'          => __( 'Next page', 'vw-dentist' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-dentist' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
          <div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
        </div>
    <?php }else if($theme_lay == 'Grid Layout'){ ?>
        <div class="row m-0">
          <div id="our-services" class="services flipInX col-lg-9 col-md-9">
            <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <div class="row">
              <?php if ( have_posts() ) :
                /* Start the Loop */
                  
                  while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/grid-layout' ); 
                  
                  endwhile;

                  else :

                    get_template_part( 'no-results' ); 

                  endif; 
              ?>
            </div>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'vw-dentist' ),
                      'next_text'          => __( 'Next page', 'vw-dentist' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-dentist' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        </div>
    <?php }else{ ?>
      <div class="row m-0">
        <div id="our-services" class="services col-lg-8 col-md-8">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content'); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-dentist' ),
                    'next_text'          => __( 'Next page', 'vw-dentist' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-dentist' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php } ?>
    <div class="clearfix"></div>
  </div>
</div>

<?php get_footer(); ?>