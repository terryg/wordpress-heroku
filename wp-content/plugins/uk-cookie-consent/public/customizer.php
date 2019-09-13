<?php
/*
 * Customizer
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ctcc_customize_register( $wp_customize ) {
	// Do stuff with $wp_customize, the WP_Customize_Manager object.
	//$options = get_option( 'ctcc_styles_settings' );
	//echo $options['text_color'];
	
	$wp_customize -> add_section ( 'cctc', array (
		'title'		=>	__( 'Cookie Consent', 'uk-cookie-consent' ),
		'priority'	=> 	999
	) );
	
	$wp_customize -> add_setting( 'ctcc_styles_settings[position]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[position]', array(
		'type' 					=> 'select',
		'priority' 				=> 1, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Position', 'uk-cookie-consent' ),
		'choices'				=> array (
			'top-bar' 				=> __( 'Top Bar', 'uk-cookie-consent' ),
			'bottom-bar' 			=> __( 'Bottom Bar', 'uk-cookie-consent' ),
			'top-left-block' 		=> __( 'Top Left Block', 'uk-cookie-consent' ),
			'top-right-block' 		=> __( 'Top Right Block', 'uk-cookie-consent' ),
			'bottom-left-block'	 	=> __( 'Bottom Left Block', 'uk-cookie-consent' ),
			'bottom-right-block'	=> __( 'Bottom Right Block', 'uk-cookie-consent' ),
		),
		'description' 			=> __( 'Position and placement.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[container_class]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[container_class]', array(
		'type' 					=> 'text',
		'priority' 				=> 2, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Container Class', 'uk-cookie-consent' ),
		'description' 			=> __( 'Optional wrapper class.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[enqueue_styles]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[enqueue_styles]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 4, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Enqueue Styles', 'uk-cookie-consent' ),
		'description' 			=> __( 'Deselect this to dequeue the plugin stylesheet.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[rounded_corners]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[rounded_corners]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 6, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Rounded Corners', 'uk-cookie-consent' ),
		'description' 			=> __( 'Round the corners on the block.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[drop_shadow]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[drop_shadow]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 8, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Drop Shadow', 'uk-cookie-consent' ),
		'description' 			=> __( 'Add drop shadow to the block.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[display_accept_with_text]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[display_accept_with_text]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 9, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Display Button With Text', 'uk-cookie-consent' ),
		'description' 			=> __( 'Deselect to float button to right.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[x_close]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[x_close]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 10, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Use X Close', 'uk-cookie-consent' ),
		'description' 			=> __( 'Replace confirmation button with \'X\' icon.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[text_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[text_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 15, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Text Color', 'uk-cookie-consent' ),
		'description' 			=> __( 'Text color for your notification bar.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[bg_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[bg_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 20, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Background Color', 'uk-cookie-consent' ),
		'description' 			=> __( 'Background color for your notification bar.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[link_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[link_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 30, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Link Color', 'uk-cookie-consent' ),
		'description' 			=> __( 'Link color for your notification bar.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[button_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[button_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 40, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Button Color', 'uk-cookie-consent' ),
		'description' 			=> __( 'Text color for your notification bar button.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[button_bg_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[button_bg_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 50, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Button Background', 'uk-cookie-consent' ),
		'description' 			=> __( 'Background color for your notification bar button.', 'uk-cookie-consent' )
	) );
	$wp_customize -> add_setting( 'ctcc_styles_settings[flat_button]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'ctcc_styles_settings[flat_button]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 60, // Within the section.
		'section' 				=> 'cctc', // Required, core or custom.
		'label' 				=> __( 'Flat Button', 'uk-cookie-consent' ),
		'description' 			=> __( 'Deselect to inherit button styles from the theme.', 'uk-cookie-consent' )
	) );
}
add_action( 'customize_register', 'ctcc_customize_register' );