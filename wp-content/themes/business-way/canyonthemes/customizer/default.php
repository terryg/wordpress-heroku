<?php
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
        $default['business_way_login_register_text']                  = esc_html__('Login/Register', 'business-way');

        //default header on menu section
        $default['business_way_header_search_icon']                   = 0;
        $default['business_way_header_woocommerce_icon']              = 0;

        // Blog.
        $default['business_way_sidebar_layout_option']                = 'right-sidebar';
        $default['business_way_blog_title_option']                    = esc_html__('Latest Blog', 'business-way');
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
        $default['business_way_copyright']                            = esc_html__('Copyright All Rights Reserved', 'business-way');
        $default['business_way_footer_go_to_top']                     = 1;

        // Color Option.
        $default['business_way_primary_color']                        = '#052c7d';

        $default['business_way_front_page_hide_option']               = 0;
        $default['business_way_post_search_placeholder_option']       = esc_html__('Search', 'business-way');
        $default['business_way_slider_option']                       = '';

        // Pass through filter.
        $default  = apply_filters( 'business_way_get_default_theme_options', $default );
        return $default;
    }
endif;
