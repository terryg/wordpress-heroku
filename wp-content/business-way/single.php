<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
get_header();    
    /*
    * Get header image 
    */
    business_way_header_image_single_page();
?>
<section id="section14" class="section-margine gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-<?php business_way_sidebar_condition_single_page();?> left-block">
                <?php
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'single');
                    echo '<div class="entry-box">';
                        
                        the_post_navigation();

                        echo '<div class="comment-form-container">';
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                        echo '</div>';
                    echo '</div>';
                endwhile; // End of the loop.
                ?>
            </div>
            <?php business_way_page_sidebar_conditions_below(); ?>
        </div>
    </div>
</section>
<?php
get_footer(); ?>
