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
    business_way_woocommerce_header_image();
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-<?php business_way_sidebar_condition_single_page();?> left-block">
                    <?php
                        woocommerce_content();
                    ?>

                </div><!--div -->
                 <?php
                    //function for sidebar section
                    business_way_sidebar_conditions_below(); 
                ?>
            </div>
        </div><!-- div -->
    </section>
<?php get_footer();
