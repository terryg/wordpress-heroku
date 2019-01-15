<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
get_header();    
    /*
    * Get header image 
    */
    business_way_header_image();
?>
        <!-- Page Header End -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-<?php business_way_sidebar_condition_single_page();?> left-block">
                    <?php
                    if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        endwhile;

                        do_action('business_way_action_navigation');

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div><!--div -->
                 <?php
                    //function for sidebar section
                    business_way_sidebar_conditions_below(); 
                ?>
            </div>
        </div><!-- div -->
    </section>
<?php get_footer();
