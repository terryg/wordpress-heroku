<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
$hide_show_feature_image = business_way_get_option( 'business_way_show_feature_image_single_option' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="col-md-12">
        <div class="blog-block">
            <?php business_way_post_thumbnail(); ?>
            
            <p class="blog-text">
                <?php the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:','business-way' ),
                        'after'  => '</div>',
                      ) );
                ?>
            </p>
        </div>
        <?php if ( get_edit_post_link() ) : ?>
        		<footer class="entry-footer">
        			<?php
        				edit_post_link(
        					sprintf(
        						/* translators: %s: Name of current post */
        						esc_html__( 'Edit %s','business-way'),
        						the_title( '<span class="screen-reader-text">"', '"</span>', false )
        					),
        					'<span class="edit-link">',
        					'</span>'
        				);
        			?>
        		</footer><!-- .entry-footer -->
        <?php endif; ?>
    </div>
</article><!-- #post-## -->
