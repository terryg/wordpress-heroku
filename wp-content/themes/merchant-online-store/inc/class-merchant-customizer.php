<?php
/**
 * Merchant_Customizer Class
 * Makes adjustments to Storefront cores Customizer implementation.
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Merchant_Customizer' ) ) {

class Merchant_Customizer {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		global $storefront_version;

		add_action( 'customize_register', 	array( $this, 'edit_default_controls' ),					99 );
		add_filter( 'storefront_setting_default_values', array( $this, 'get_boutique_defaults' ) );
		add_filter( 'storefront_default_background_color', array( $this, 'default_background_color' ) );

		/**
		 * The following can be removed when Storefront 2.1 lands
		 */
		add_action( 'init',					array( $this, 'default_theme_mod_values' )					);
		add_action( 'customize_register',	array( $this, 'edit_default_customizer_settings' ),			99 );
		if ( version_compare( $storefront_version, '2.0.0', '<' ) ) {
			add_action( 'init',				array( $this, 'default_theme_settings' ) );
		}
	}

	/**
	 * Returns an array of the desired default Storefront options
	 * @return array
	 */
	public function get_boutique_defaults() {
        return apply_filters( 'inventory_default_settings',
          $args = array(


            'storefront_header_background_color'            => '#ffffff',
            'storefront_heading_color'                      => '#2b2b2b',
            'storefront_footer_heading_color'               => '#333333',
            'storefront_footer_background_color'            => '#ffffff',
            'storefront_header_link_color'                  => '#333333',
            'storefront_header_text_color'                  => '#000000',
            'storefront_button_background_color'            => '#03A9F4',
            'storefront_button_text_color'                  => '#ffffff',
            'storefront_button_alt_background_color'        => '#b64902',
            'storefront_button_alt_text_color'              => '#ffffff',
            'storefront_footer_link_color'                  => '#333333',
            'storefront_text_color'                         => '#615d59',
            'storefront_footer_text_color'                  => '#333333',
            'storefront_accent_color'                       => '#03A9F4',

        ) );
	}

	/**
	 * Set default Customizer settings based on Storechild design.
	 * @uses get_boutique_defaults()
	 * @return void
	 */
	public function edit_default_customizer_settings( $wp_customize ) {
		foreach ( Merchant_Customizer::get_boutique_defaults() as $mod => $val ) {
			$setting = $wp_customize->get_setting( $mod );

			if ( is_object( $setting ) ) {
				$setting->default = $val;
			}
		}
	}

	/**
	 * Sets default theme color filters for storefront color values.
	 * This function is required for Storefront < 2.0.0 support
	 * @uses get_storechild_defaults()
	 * @return void
	 */
	public function default_theme_settings() {
		$prefix_regex = '/^storefront_/';
		foreach ( self::get_boutique_defaults() as $mod => $val) {
			if ( preg_match( $prefix_regex, $mod ) ) {
				$filter = preg_replace( $prefix_regex, 'storefront_default_', $mod );
				add_filter( $filter, function( $_ ) use ( $val ) {
					return $val;
				}, 99 );
			}
		}
	}

	/**
	 * Returns a default theme_mod value if there is none set.
	 * @uses get_boutique_defaults()
	 * @return void
	 */
	public function default_theme_mod_values() {
		foreach ( Merchant_Customizer::get_boutique_defaults() as $mod => $val ) {
			add_filter( 'theme_mod_' . $mod, function( $setting ) use ( $val ) {
				return $setting ? $setting : $val;
			});
		}
	}

	/**
	 * Modify the default controls
	 * @return void
	 */
	public function edit_default_controls( $wp_customize ) {
		$wp_customize->get_setting( 'storefront_header_text_color' )->transport 	= 'refresh';
	}

	/**
	 * Default background color.
	 *
	 * @param string $color Default color.
	 * @return string
	 */
	public function default_background_color( $color ) {
		return '303030';
	}
}

}

return new Merchant_Customizer();