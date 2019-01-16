<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
get_header();
 ?>

    <!-- Page header  End -->
        <div class="page-header text-center">
            <h3><?php esc_html_e('404 Not Found', 'business-way'); ?></h3>
        </div>
        <!-- Page Header End -->
        <div id="error-txt">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="error-txt text-center">
                            <h1><?php esc_html_e('404', 'business-way'); ?></h1>
                            <div class="breadcrumb-wrap"><?php do_action('business_way_breadcrumb_hook'); ?></div>
                            <h2><?php esc_html_e('oops, sorry we cant find that page!', 'business-way'); ?></h2>
                            <h4><?php esc_html_e('Other something went wrong or the page doesnt exist anymore', 'business-way'); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php get_footer();
