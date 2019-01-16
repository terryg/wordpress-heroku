<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
$hide_show_feature_image = business_way_get_option( 'business_way_show_feature_image_single_option' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-block">
        <?php business_way_single_post_thumbnail(); ?>

        <?php business_way_single_page_top_meta();?> 
        <p class="blog-text">
            <?php the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:','business-way' ),
                    'after'  => '</div>',
                  ) );
            ?>
        </p>
    </div>
    <?php business_way_content_tags(); ?>
</article><!-- #post-## -->
