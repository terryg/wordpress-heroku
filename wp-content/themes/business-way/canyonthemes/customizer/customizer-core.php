<?php
/**
 * Breadcrumb  display option options
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return array $business_way_show_breadcrumb_option
 *
 */
if (!function_exists('business_way_show_breadcrumb_option')) :
    function business_way_show_breadcrumb_option()
    {
        $business_way_show_breadcrumb_option = array(
            'enable'  => esc_html__('Enable', 'business-way'),
            'disable' => esc_html__('Disable','business-way')
        );
        return apply_filters('business_way_show_breadcrumb_option', $business_way_show_breadcrumb_option);
    }
endif;


/**
 * Top Header Section Hide/Show  options
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return array $business_way_show_top_header_section_option
 *
 */
if (!function_exists('business_way_show_top_header_section_option')) :
    function business_way_show_top_header_section_option()
    {
        $business_way_show_top_header_section_option = array(
            'show' => esc_html__('Show', 'business-way'),
            'hide' => esc_html__('Hide', 'business-way')
        );
        return apply_filters('business_way_show_top_header_section_option', $business_way_show_top_header_section_option);
    }
endif;

/**
 * Show/Hide Feature Image  options
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return array $business_way_show_feature_image_option
 *
 */
if (!function_exists('business_way_show_feature_image_option')) :
    function business_way_show_feature_image_option()
    {
        $business_way_show_feature_image_option = array(
            'show' => esc_html__('Show', 'business-way'),
            'hide' => esc_html__('Hide', 'business-way')
        );
        return apply_filters('business_way_show_feature_image_option', $business_way_show_feature_image_option);
    }
endif;


/**
 * Slider  options
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return array $business_way_slider_option
 *
 */
if (!function_exists('business_way_slider_option')) :
    function business_way_slider_option()
    {
        $business_way_slider_option = array(
            'show' => esc_html__('Show', 'business-way'),
            'hide' => esc_html__('Hide', 'business-way')
        );
        return apply_filters('business_way_slider_option', $business_way_slider_option);
    }
endif;

/**
 * Sidebar layout options
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return array $business_way_sidebar_layout
 *
 */
if (!function_exists('business_way_sidebar_layout')) :
    function business_way_sidebar_layout()
    {
        $business_way_sidebar_layout = array(
            'right-sidebar'   => esc_html__('Right Sidebar', 'business-way'),
            'left-sidebar'    => esc_html__('Left Sidebar', 'business-way'),
            'no-sidebar'      => esc_html__('No Sidebar', 'business-way'),
        );
        return apply_filters('business_way_sidebar_layout', $business_way_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return array $business_way_blog_excerpt
 *
 */
if ( !function_exists( 'business_way_blog_excerpt' ) ) :
    
    function business_way_blog_excerpt()
    
    {
        $business_way_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'business-way'),
            'content' => esc_html__('Content', 'business-way'),

        );
        return apply_filters('business_way_blog_excerpt', $business_way_blog_excerpt);
    }
endif;

/**
 * Blog/Archive Pagination Options
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return array $business_way_blog_pagination
 *
 */
if ( !function_exists( 'business_way_blog_pagination' ) ) :
    
    function business_way_blog_pagination()
    
    {
        $business_way_blog_pagination = array(
            'default' => esc_html__('Default', 'business-way'),
            'numeric' => esc_html__('Numeric', 'business-way'),
            'hide'    => esc_html__('Hide Pagination', 'business-way'),

        );
        return apply_filters('business_way_blog_pagination', $business_way_blog_pagination);
    }
endif;