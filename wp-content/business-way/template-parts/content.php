<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
$excerpt_option     = esc_html(business_way_get_option('business_way_blog_excerpt_option'));
$description_length = esc_html(business_way_get_option('business_way_description_length_option'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-block">
            
        <?php business_way_post_thumbnail(); ?>

            <a href="<?php the_permalink();?>">
                <h3><?php the_title();?></h3>
            </a>
            <?php business_way_page_top_meta();?>     
            <p class="blog-text">
                <?php 
                    if( $excerpt_option == 'excerpt'){
                          echo esc_html( wp_trim_words( get_the_excerpt(),$description_length) );
                    }else{
                         echo esc_html( wp_trim_words( get_the_content(),$description_length) );
                    }                
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:','business-way' ),
                        'after'  => '</div>',
                      ) );
                ?>
            </p>

        </div>
        <?php business_way_content_tags(); ?>
</article><!-- #post-## -->
