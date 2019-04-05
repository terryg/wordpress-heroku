<?php
/**
 * Merchant Storefront engine room
 *
 * @package merchant-online-store
 */

/**
 * Set the theme version number as a global variable
 */
$theme				      = wp_get_theme( 'storefront' );
$storefront_version	= $theme['Version'];

/*
-------------------------------------------------------------------------------------------------------
  Homepage
-------------------------------------------------------------------------------------------------------
*/

/**
* Query WooCommerce activation
*/
if ( ! function_exists( 'merchant_online_store_is_woocommerce_activated' ) ) {
    function merchant_online_store_is_woocommerce_activated() {
        return class_exists( 'WooCommerce' ) ? true : false;
    }
}

// Remove Default Storefrint Homepage Sections
add_action( 'init', 'merchant_online_store_remove_default_home' );

// Add New Homepage Sections
add_action( 'homepage', 'merchant_online_store_homepage_hero_image', 				10 );

if ( merchant_online_store_is_woocommerce_activated() ) {
    add_action( 'homepage', 'merchant_online_store_woocommerce_featured_products',	30 );
    add_action( 'homepage', 'merchant_online_store_woocommerce_latest_products',		40 );
    add_action( 'homepage', 'merchant_online_store_woocommerce_products',    		50 );
    add_action( 'homepage', 'merchant_online_store_product_categories', 	60 );
}

add_action( 'homepage', 'merchant_online_store_homepage_articles',				80 );
add_action( 'homepage', 'storefront_homepage_content',    				90 );


/*
-------------------------------------------------------------------------------------------------------
  Header
-------------------------------------------------------------------------------------------------------
*/
if ( absint( get_theme_mod('merchant_header_layout_type', 2 )) === 2){
    add_action( 'init', 'merchant_online_store_header_layout' );
}

/*
-------------------------------------------------------------------------------------------------------
  WooCommerce
-------------------------------------------------------------------------------------------------------
*/
if ( merchant_online_store_is_woocommerce_activated() ) {

    if( absint(get_theme_mod('woocommerce_product_catalog_layout', 2 )) === 2 ){
        add_action('init', 'merchant_online_store_apply_shop_product_two' );
    }

    if( absint(get_theme_mod('woocommerce_product_single_layout', 2 )) === 2 ){
        add_action('init', 'merchant_online_store_apply_woo_single_new');
        add_action('woocommerce_after_single_product_summary', 'merchant_online_store_data_tabs_open', 8);
        add_action('woocommerce_after_single_product_summary', 'merchant_online_store_close_div', 12);
        add_filter( 'woocommerce_product_tabs', 'merchant_online_store_remove_reviews_tab', 98 );
    }

    add_filter( 'woocommerce_pagination_args', 'merchant_online_store_filter_woocommerce_pagination_args', 10, 1 );
}

/*
-------------------------------------------------------------------------------------------------------
  Customizer
-------------------------------------------------------------------------------------------------------
*/
add_action( 'customize_register', 'merchant_online_store_storefront_customize_register', 25 );
add_action( 'wp_head', 'merchant_online_store_customizer_head_styles' );

/*
-------------------------------------------------------------------------------------------------------
  Theme Setup
-------------------------------------------------------------------------------------------------------
*/
add_action( 'after_setup_theme',			'merchant_online_store_theme_setup' );
add_action( 'wp_enqueue_scripts',			'merchant_online_store_scripts');

add_filter( 'body_class', 'merchant_online_store_body_classes' );
add_filter( 'post_class', 'merchant_online_store_archive_column_classes' );
add_filter( 'storefront_setting_default_values', 'merchant_online_store_defaults'  );


/*
-------------------------------------------------------------------------------------------------------
  Footer
-------------------------------------------------------------------------------------------------------
*/
add_action('init', 'merchant_online_store_apply_footer_copyright');


if ( ! function_exists( 'merchant_online_store_storefront_customize_register' ) ){

    function merchant_online_store_storefront_customize_register( $wp_customize ) {

    	require_once( 'inc/customizer-homepage.php' );
      require_once( 'inc/customizer-misc.php' );

        if ( merchant_online_store_is_woocommerce_activated() ) {
            require_once( 'inc/customizer-woocommerce.php' );
        }

    }
}

    require_once( 'inc/components-homepage.php' );
    require_once( 'inc/template-functions.php' );

    if ( merchant_online_store_is_woocommerce_activated() ) {
        require_once( 'inc/woocommerce-functions.php' );
    }


require_once( 'inc/dashboard/minimal-info-dashboard.php');
require_once( 'inc/class-merchant-customizer.php');