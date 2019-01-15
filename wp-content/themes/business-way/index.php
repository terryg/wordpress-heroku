<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
get_header();
    /*
    * Blog Page title and Heder Image Section
    */
    business_way_blog_header_section(); 
?>
    <section id="section14" class="section-margine gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-<?php business_way_sidebar_condition_single_page();?> left-block">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();
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
