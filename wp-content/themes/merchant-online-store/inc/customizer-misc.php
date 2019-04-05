<?php

/*
-------------------------------------------------------------------------------------------------------
  Customizer Section
-------------------------------------------------------------------------------------------------------
*/
	// Header Layouts
	$wp_customize->add_section('section_header_layout',array(
			'title' 			=> esc_html__( 'Header Layout', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 2,
			'panel' 			=> 'homepage_panel_website_layout',
		)
	);


/*
-------------------------------------------------------------------------------------------------------
  Customizer Settings
-------------------------------------------------------------------------------------------------------
*/


	// Header Section - Header Layout
	$wp_customize->add_setting( 'merchant_header_layout_type' ,
		array(
			'default' => 2,
			'sanitize_callback' => 'absint',
			'transport' => 'refresh',
		)
	);

		$wp_customize->add_control( 'merchant_header_layout_type',array(
				'label'      	=> esc_html__( 'Header Layout', 'merchant-online-store' ),
				'section'    	=> 'section_header_layout',
				'settings'   	=> 'merchant_header_layout_type',
			    'priority'   	=> 1,
			    'type'       	=> 'radio',
				'choices'    	=> array(
									1   => esc_html__( 'Default', 'merchant-online-store' ),
									2 	=> esc_html__( 'Centered', 'merchant-online-store' ),
								),
			)
		);

/*
-------------------------------------------------------------------------------------------------------
  Typography
-------------------------------------------------------------------------------------------------------
*/

	// Google Fonts
	$wp_customize->add_section('section_typography_fonts',array(
			'title' 			=> esc_html__( 'Fonts', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 2,
			'panel' 			=> 'homepage_panel_typography',
		)
	);


	// H1 Font Size
	$wp_customize->add_setting('minimal_typography_heading_one_size', array(
		'default'	=> '50px',
		'transport' => 'refresh',
		'sanitize_callback' 	=> 'sanitize_text_field',
	) );

			$wp_customize->add_control('minimal_typography_heading_one_size',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'H1 Font Size', 'merchant-online-store' ),
               'section'    => 'section_typography_fonts',
               'settings'   => 'minimal_typography_heading_one_size',
               'priority'   => 20,
			));


	// H2 Font Size
	$wp_customize->add_setting('minimal_typography_heading_two_size', array(
		'default'	=> '33px',
		'transport' => 'refresh',
		'sanitize_callback' 	=> 'sanitize_text_field',
	) );

			$wp_customize->add_control('minimal_typography_heading_two_size',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'H2 Font Size', 'merchant-online-store' ),
               'section'    => 'section_typography_fonts',
               'settings'   => 'minimal_typography_heading_two_size',
               'priority'   => 21,
			));

	// H3 Font Size
	$wp_customize->add_setting('minimal_typography_heading_three_size', array(
		'default'	=> '22px',
		'transport' => 'refresh',
		'sanitize_callback' 	=> 'sanitize_text_field',
	) );

			$wp_customize->add_control('minimal_typography_heading_three_size',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'H3 Font Size', 'merchant-online-store' ),
               'section'    => 'section_typography_fonts',
               'settings'   => 'minimal_typography_heading_three_size',
               'priority'   => 22,
			));


	// H4 Font Size
	$wp_customize->add_setting('minimal_typography_heading_four_size', array(
		'default'	=> '15px',
		'transport' => 'refresh',
		'sanitize_callback' 	=> 'sanitize_text_field',
	) );

			$wp_customize->add_control('minimal_typography_heading_four_size',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'H4 Font Size', 'merchant-online-store' ),
               'section'    => 'section_typography_fonts',
               'settings'   => 'minimal_typography_heading_four_size',
               'priority'   => 23,
			));

	// H5 Font Size
	$wp_customize->add_setting('minimal_typography_heading_five_size', array(
		'default'	=> '15px',
		'transport' => 'refresh',
		'sanitize_callback' 	=> 'sanitize_text_field',
	) );

			$wp_customize->add_control('minimal_typography_heading_five_size',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'H5 Font Size', 'merchant-online-store' ),
               'section'    => 'section_typography_fonts',
               'settings'   => 'minimal_typography_heading_five_size',
               'priority'   => 24,
			));

	// H6 Font Size
	$wp_customize->add_setting('minimal_typography_heading_six_size', array(
		'default'	=> '15px',
		'transport' => 'refresh',
		'sanitize_callback' 	=> 'sanitize_text_field',
	) );

			$wp_customize->add_control('minimal_typography_heading_six_size',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'H6 Font Size', 'merchant-online-store' ),
               'section'    => 'section_typography_fonts',
               'settings'   => 'minimal_typography_heading_six_size',
               'priority'   => 25,
			));

	// H6 Font Size
	$wp_customize->add_setting('minimal_typography_body_font_size', array(
		'default'	=> '15px',
		'transport' => 'refresh',
		'sanitize_callback' 	=> 'sanitize_text_field',
	) );

			$wp_customize->add_control('minimal_typography_body_font_size',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Body Font Size', 'merchant-online-store' ),
               'section'    => 'section_typography_fonts',
               'settings'   => 'minimal_typography_body_font_size',
               'priority'   => 26,
			));


	// Footer Copyright Text
	$wp_customize->add_setting( 'merchant_footer_text', array(
        'default'           => esc_html__( 'Custom Footer Text', 'merchant-online-store' ),
       	'transport' 		=> 'refresh',
		'sanitize_callback' 	=> 'wp_filter_nohtml_kses',
    ));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'merchant_footer_text',
	            array(
	                'label'      => __( 'Footer Copyright Text', 'merchant-online-store' ),
	                'section'    => 'storefront_footer',
	                'settings'   => 'merchant_footer_text',
	                'type'		 => 'textarea',
					'priority'      => 45,
	                )
	            )
	        );