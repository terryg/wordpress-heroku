<?php
/*
Plugin Name: GDPR Cookie Consent Banner
Plugin URI: https://termly.io/products/
Description: Our easy to use cookie consent plugin can assist in your GDPR and ePrivacy Directive compliance efforts.
Version: 2.3.14
Author: termly
Author URI: https://termly.io/
Text Domain: uk-cookie-consent
Domain Path: /languages
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Define constants
 **/
if ( ! defined( 'CTCC_PLUGIN_URL' ) ) {
	define( 'CTCC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( is_admin() ) {
	require_once dirname( __FILE__ ) . '/admin/class-ctcc-admin.php';
	$CTCC_Admin = new CTCC_Admin();
	$CTCC_Admin -> init();

	$options = get_option( 'ctcc_options_settings' );
	// Add the metafield if enabled
	if( ! empty( $options['enable_metafield'] ) ) {
		require_once dirname( __FILE__ ) . '/admin/class-ctcc-metafield.php';
		$CTCC_Metafield = new CTCC_Metafield();
		$CTCC_Metafield -> init();
	}
} else {
	require_once dirname( __FILE__ ) . '/public/class-ctcc-public.php';
	$CTCC_Public = new CTCC_Public();
	$CTCC_Public -> init();
}
require_once dirname( __FILE__ ) . '/public/customizer.php';


function ctcc_load_plugin_textdomain() {
    load_plugin_textdomain( 'uk-cookie-consent', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ctcc_load_plugin_textdomain' );

/*
 * Automatically create cookie policy page on activation
 *
 */
function ctcc_create_policy_page() {
	//Check to see if the info page has been created
	$more_info_page = get_option ( 'ctcc_more_info_page' );
	if ( empty ( $more_info_page ) ) { // The page hasn't been set yet
		// Create the page parameters
		$pagename = __( 'Cookie Policy', 'uk-cookie-consent' );
		$content = __( 'This site uses cookies - small text files that are placed on your machine to help the site provide a better user experience. In general, cookies are used to retain user preferences, store information for things like shopping carts, and provide anonymised tracking data to third party applications like Google Analytics. As a rule, cookies will make your browsing experience better. However, you may prefer to disable cookies on this site and on others. The most effective way to do this is to disable cookies in your browser. We suggest consulting the Help section of your browser or taking a look at <a href="http://www.aboutcookies.org">the About Cookies website</a> which offers guidance for all modern browsers', 'uk-cookie-consent' );
		$cpage = get_page_by_title ( $pagename ); // Double check there's not already a Cookie Policy page
		if ( !$cpage ) {
			global $user_ID;
			$page['post_type']    = 'page';
			$page['post_content'] = $content;
			$page['post_parent']  = 0;
			$page['post_author']  = $user_ID;
			$page['post_status']  = 'publish';
			$page['post_title']   = $pagename;
			$pageid = wp_insert_post ( $page );
		} else {
			// There's already a page called Cookie Policy so we'll use that
			$pageid = $cpage -> ID;
		}
		// Update the option
		update_option ( 'ctcc_more_info_page', $pageid );
	}
}
register_activation_hook ( __FILE__, 'ctcc_create_policy_page' );

function ctcc_admin_notice() {

	$option = get_option( 'ctcc_dismiss_gdpr' );
	if( false === $option && ! isset( $_GET['dismiss'] ) ) {
		$url = add_query_arg(
			'dismiss',
			'gdpr',
			$_SERVER['REQUEST_URI']
		);
		printf(
			'<div class="notice notice-info"><p><strong>%s</strong></p><p>%s</p><p><a href="%s" class="button button-primary">%s</a></p><p><a href="%s">%s</a></p></div>',
			__( 'Cookie Consent and GDPR', 'ctcc' ),
			__( 'Do you need help with making your site compliant with the GDPR? Termly provides attorney-level solutions to help with your legal requirements, including generating privacy and cookie policies that are automatically updated when laws and regulations change.', 'ctcc' ),
			'https://termly.io/products/privacy-policy-generator/?utm_source=Wordpress%20Plugin&utm_medium=privacy%20policy%20link',
			__( 'Find Out More', 'ctcc' ),
			esc_url( $url ),
			__( 'No Thanks', 'ctcc' )
		);
	} else {
		update_option( 'ctcc_dismiss_gdpr', 1 );
	}

}
// add_action( 'admin_notices', 'ctcc_admin_notice' );
