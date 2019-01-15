<?php
/**
 * Business Way Theme Customizer
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('business_way_customize_register')) :
    function business_way_customize_register($wp_customize)
    {
        $wp_customize->get_setting('blogname')->transport         = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
        
        if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'business_way_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'business_way_customize_partial_blogdescription',
		) );
	}

        /*default variable used in setting*/
        $default = business_way_get_default_theme_options();

        /**
         * Customizer setting
         */
        require get_template_directory() . '/canyonthemes/customizer/customizer-core.php';
        require get_template_directory() . '/canyonthemes/customizer/customizer-function.php';
        require get_template_directory() . '/canyonthemes/customizer/slider-section.php';
        require get_template_directory() . '/canyonthemes/customizer/footer-options.php';
        require get_template_directory() . '/canyonthemes/customizer/theme-options.php';
        require get_template_directory() . '/canyonthemes/customizer/header-info-section.php';
        require get_template_directory() . '/canyonthemes/customizer/layout-design-options.php';
        require get_template_directory() . '/canyonthemes/customizer/single-page-options.php';
    }
    add_action('customize_register', 'business_way_customize_register');
endif;

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_way_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_way_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

if (!function_exists('business_way_customize_preview_js')) :
    function business_way_customize_preview_js()
    {
        wp_enqueue_script('business-way-customizer', get_template_directory_uri() . 'assets/js/customizer.js', array('customize-preview'), '1.0.1', true);
    }

    add_action('customize_preview_init', 'business_way_customize_preview_js');

endif;
