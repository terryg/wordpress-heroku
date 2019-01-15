<?php
/*This file is part of Business Path, Business Way child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
/**
 * Loads the child theme textdomain.
 */
function business_path_load_language() {
    load_child_theme_textdomain( 'business-path' );
}
add_action( 'after_setup_theme', 'business_path_load_language' );
/**
 *Enqueue Style
*/
function business_path_child_enqueue_child_styles() {
$parent_style = 'parent-style'; 
	wp_enqueue_style('business-path-googleapis', '//fonts.googleapis.com/css?family=Karla:400,700', array(), null);
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
	}
add_action( 'wp_enqueue_scripts', 'business_path_child_enqueue_child_styles' );

/**
 * Business Way default theme options.
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */

if ( !function_exists('business_way_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function business_way_get_default_theme_options()
    {

        $default = array();

        // Homepage Slider Section
        $default['business_way_homepage_slider_option']               = 'hide';
        $default['business_way_homepage_slider_prev_next']            = 0;
        $default['business_way_homepage_slider_auto_slide']           = 0;
        $default['business_way_homepage_slider_pagination']           = 0;
        $default['business_way_api_key_option']                       = 'AIzaSyCcSoZc93wAPCPS2m0sO4aY58jpKkhO3pc';

        // Home Page Top header Info.
        $default['business_way_top_header_section']                   = 'hide';
        $default['business_way_email_icon']                           = 'fa-envelope-o';
        $default['business_way_top_header_email']                     = '';
        $default['business_way_social_link_hide_option']              = 0;
        $default['business_way_login_register_link']                  = '';
        $default['business_way_login_register_text']                  = esc_html__('Login/Register', 'business-path');

        //default header on menu section
        $default['business_way_header_search_icon']                   = 0;
        $default['business_way_header_woocommerce_icon']              = 0;

        // Blog.
        $default['business_way_sidebar_layout_option']                = 'right-sidebar';
        $default['business_way_blog_title_option']                    = esc_html__('Latest Blog', 'business-path');
        $default['business_way_blog_excerpt_option']                  = 'excerpt';
        $default['business_way_description_length_option']            = 40;
        $default['business_way_exclude_cat_blog_archive_option']      = '';
        $default['business_way_blog_page_author']                     = 0;
        $default['business_way_blog_page_date']                       = 0;
        $default['business_way_blog_page_comments']                   = 0;
        $default['business_way_post_thumbnail_image']                 = 0;
        $default['business_way_blog_pagination_types']                = 'numeric'; 

        

        //Single Page
        $default['business_way_show_feature_image_single_option']     = 0;


        // Animation Option.
        $default['business_way_animation_option']                     = 0;

        // footer section.
        $default['business_way_copyright']                            = esc_html__('Copyright All Rights Reserved', 'business-path');
        $default['business_way_footer_go_to_top']                     = 1;

        // Color Option.
        $default['business_way_primary_color']                        = '#052c7d';

        $default['business_way_front_page_hide_option']               = 0;
        $default['business_way_post_search_placeholder_option']       = esc_html__('Search', 'business-path');
        $default['business_way_slider_option']                       = '';

        // Pass through filter.
        $default  = apply_filters( 'business_way_get_default_theme_options', $default );
        return $default;
    }
endif;


/*
* Footer Section footer widget section 
* @since 1.0.0
* @package Business Way
*/ 
if ( ! function_exists( 'business_way_site_footer_button_action' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function business_way_site_footer_button_action() {
	$copyright = wp_kses_post(business_way_get_option('business_way_copyright'));
	$to_top    = absint(business_way_get_option('business_way_footer_go_to_top'));
	$powered   = wp_kses_post(business_way_get_option('business_way_footer_powered_text'));
    	?>
		<!-- Footer Bottom Start -->
	        <div id="footer-bottom" class="footer-bottom">
	            <div class="footer-text text-center">
	                <?php if( $to_top == 1 ) { ?>
		                <div class="scroll-to-top">
		                    <div class="scroll-top">
		                        <a href="#" id="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
		                    </div>
		                </div>
	                <?php } ?>
	                <p><?php echo $copyright; ?></p>
	                <div class="powered-text">
	                	<?php
	                		/* translators: %s: CMS name, i.e. WordPress. */
	                		printf( esc_html__( 'Proudly powered by %s', 'business-path' ), 'WordPress' );
	                	?>
	                	<span class="sep"> | </span>
	                	<?php
	                		/* translators: 1: Theme name, 2: Theme author. */
	                		printf( esc_html__( 'Theme: %1$s by %2$s.', 'business-path' ), 'Business Path', '<a href="http://www.canyonthemes.com/">Canyon Themes</a>' );
	                	?>
	                </div>
	            </div>
	        </div>
	    <!-- Footer Bottom End -->
<?php }
endif;
add_filter('business_way_site_footer_button', 'business_way_site_footer_button_action');