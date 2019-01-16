<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
    <section id="section16" class="section16">
        <div class="container">
            <div class="row">
                <div class="col-sm-<?php business_way_sidebar_condition_single_page();?> left-block">
                    <?php
                    if (have_posts()) : ?>

                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('template-parts/content', 'search');

                        endwhile;

                        do_action('business_way_action_navigation');

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div><!-- div -->
                 <?php
                    //function for sidebar section
                    business_way_sidebar_conditions_below(); 
                ?>
            </div><!-- div -->
        </div>
    </section>

<?php get_footer();
