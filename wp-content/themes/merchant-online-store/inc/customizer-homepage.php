<?php

/*
-------------------------------------------------------------------------------------------------------
  Customizer Panel
-------------------------------------------------------------------------------------------------------
*/
	// Homepage Panel
	$wp_customize->add_panel( 'merchant_frontpage_panel', array(
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
		'title'          => esc_html__( 'Homepage Sections','merchant-online-store' ),
		'description'    => esc_html__( 'Your frontpage elements','merchant-online-store' ),
	) );

	// Typography Panel
	$wp_customize->add_panel( 'homepage_panel_typography', array(
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
		'title'          => esc_html__( 'Typography','merchant-online-store' ),
		'description'    => esc_html__( 'Your frontpage elements','merchant-online-store' ),
	) );

	// Header Panel
	$wp_customize->add_panel( 'homepage_panel_header', array(
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
		'title'          => esc_html__( 'Header','merchant-online-store' ),
	) );

	// Header Panel
	$wp_customize->add_panel( 'homepage_panel_website_layout', array(
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
		'title'          => esc_html__( 'Website Layouts','merchant-online-store' ),
	) );


/*
header_image
	storefront_footer - 28
	storefront_typography - 45
	storefront_buttons - 45
	storefront_layout - 50
	storefront_single_product_page - 60
	storefront_more - 999

woocommerce -200
	woocommerce_store_notice - 10
	woocommerce_product_catalog - 10
	woocommerce_product_images - 20
*/

$wp_customize->remove_section( 'storefront_more' );

$wp_customize->get_section('header_image')->panel 				= 'homepage_panel_header';
$wp_customize->get_section('header_image')->title 				= esc_html__( 'Header Background', 'merchant-online-store' );

$wp_customize->get_section('storefront_layout')->panel 				= 'homepage_panel_website_layout';


$wp_customize->get_section('storefront_typography')->panel 				= 'homepage_panel_typography';
$wp_customize->get_section('storefront_buttons')->panel 				= 'homepage_panel_typography';
$wp_customize->get_section('storefront_typography')->title 				= esc_html__( 'Text Color', 'merchant-online-store' );



/*
-------------------------------------------------------------------------------------------------------
  Customizer Sections
-------------------------------------------------------------------------------------------------------
*/

	// Homepage Section Homepage Hero
	$wp_customize->add_section('jewelry_home_hero_section',array(
			'title' 			=> esc_html__( 'Homepage Hero', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 2,
			'panel' 			=> 'merchant_frontpage_panel',
		)
	);

	// Homepage Section About Us
	$wp_customize->add_section('jewelry_home_about_us_section',array(
			'title' 			=> esc_html__( 'About Us', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 3,
			'panel' 			=> 'merchant_frontpage_panel',
		)
	);

	// Homepage Section Featured Products
	$wp_customize->add_section('jewelry_home_product_featured_section',array(
			'title' 			=> esc_html__( 'Featured Products', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 4,
			'panel' 			=> 'merchant_frontpage_panel',
		)
	);

	// Homepage Section Latest Products
	$wp_customize->add_section('jewelry_home_product_latest_section',array(
			'title' 			=> esc_html__( 'Latest Products', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 5,
			'panel' 			=> 'merchant_frontpage_panel',
		)
	);


	// Homepage All Product Category
	$wp_customize->add_section('jewelry_home_all_product_section',array(
			'title' 			=> esc_html__( 'All Product', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 6,
			'panel' 			=> 'merchant_frontpage_panel',
		)
	);

	// Homepage Section Product Category
	$wp_customize->add_section('jewelry_home_product_category_section',array(
			'title' 			=> esc_html__( 'Product Category', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 7,
			'panel' 			=> 'merchant_frontpage_panel',
		)
	);


	// Homepage Section Articles
	$wp_customize->add_section('jewelry_home_articles_section',array(
			'title' 			=> esc_html__( 'Homepage Articles', 'merchant-online-store' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 9,
			'panel' 			=> 'merchant_frontpage_panel',
		)
	);





/*
-------------------------------------------------------------------------------------------------------
  Customizer Settings
-------------------------------------------------------------------------------------------------------
*/

/*
-------------------------------------------------------------------------------------------------------
  Hero Image
-------------------------------------------------------------------------------------------------------
*/

	// Homepage Section - Hero Image - Slider Type
	$wp_customize->add_setting( 'bellini_front_slider_type' ,
		array(
			'default' => 1,
			'sanitize_callback' => 'absint',
			'transport' => 'refresh',
		)
	);

		$wp_customize->add_control( 'bellini_front_slider_type',array(
				'label'      	=> esc_html__( 'Slider Type', 'merchant-online-store' ),
				'description' 	=> esc_html__( 'Choose your homepage slider type.', 'merchant-online-store' ),
				'section'    	=> 'jewelry_home_hero_section',
				'settings'   	=> 'bellini_front_slider_type',
			    'priority'   	=> 1,
			    'type'       	=> 'radio',
				'choices'    	=> array(
									1   => esc_html__( 'Single Image', 'merchant-online-store' ),
									2 	=> esc_html__( 'Insert Slider Shortcode', 'merchant-online-store' ),
								),
			)
		);


	// Homepage Section - Hero Image - Image
	$wp_customize->add_setting('bellini_static_slider_image', array(
		'default'           => get_theme_file_uri( '/images/Merchant-Slider.jpg' ),
		'sanitize_callback' => 'esc_url_raw',
		'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_static_slider_image',array(
               'section'    => 'jewelry_home_hero_section',
               'settings'   => 'bellini_static_slider_image',
               'description'=> esc_html__('Slider Image', 'merchant-online-store'),
               'priority'   => 2,
				'active_callback' 	=> 'is_active_slider_type_hero',

			   )
			));


	// Homepage Section - Hero Image - Title
	$wp_customize->add_setting('bellini_static_slider_title', array(
		'default'			=> __('Beautifully Designed Pieces by Talented Designers', 'merchant-online-store'),
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('bellini_static_slider_title',array(
				'type' 		=>'text',
				'description'=> esc_html__('Slider Title', 'merchant-online-store'),
               'input_attrs' 	=> array('placeholder' 	=> esc_html__( 'Title', 'merchant-online-store' ),),
               'section'    => 'jewelry_home_hero_section',
               'settings'   => 'bellini_static_slider_title',
               'priority'   => 3,
				'active_callback' 	=> 'is_active_slider_type_hero',
			));


	// Homepage Section - Hero Image - Content
	$wp_customize->add_setting('bellini_static_slider_content', array(
		'transport' 		=> 'postMessage',
		'default'			=> esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
		'sanitize_callback' 	=> 'wp_filter_nohtml_kses',
	) );

			$wp_customize->add_control('bellini_static_slider_content',array(
				'type' 		=>'textarea',
				'description'=> esc_html__('Slider Content', 'merchant-online-store'),
               'section'    => 'jewelry_home_hero_section',
               'settings'   => 'bellini_static_slider_content',
               'priority'   => 4,
				'active_callback' 	=> 'is_active_slider_type_hero',
			));


	//Button Text
	$wp_customize->add_setting('bellini_static_slider_button_text-1', array(
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('bellini_static_slider_button_text-1',array(
				'type' 				=>'text',
				'description'=> esc_html__('Slider Button 1 Label', 'merchant-online-store'),
               'section'    		=> 'jewelry_home_hero_section',
               'settings'   		=> 'bellini_static_slider_button_text-1',
               'priority'   		=> 5,
	    		'input_attrs' 		=> array('placeholder' 	=> esc_html__( 'Button 1 Text', 'merchant-online-store' ),),
				'active_callback' 	=> 'is_active_slider_type_hero',
			));


	//Button Link
	$wp_customize->add_setting('bellini_static_slider_button_url-1', array(
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'esc_url_raw',
	) );

			$wp_customize->add_control('bellini_static_slider_button_url-1',array(
				'type' 		=>'url',
				'description'=> esc_html__('Slider Button 1 Link', 'merchant-online-store'),
               'section'    		=> 'jewelry_home_hero_section',
               'settings'   		=> 'bellini_static_slider_button_url-1',
               'priority'   		=> 5,
               'input_attrs' 		=> array('placeholder' 	=> esc_html__( 'Button 1 URL', 'merchant-online-store' ),),
				'active_callback' 	=> 'is_active_slider_type_hero',
			));




	// Homepage Section - Hero Image - Content Color
	$wp_customize->add_setting( 'home_hero_image_content_color' ,
		array(
	    'default' 			=> '#051a3c',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_hero_image_content_color',
			array(
				'section'    => 'jewelry_home_hero_section',
				'settings'   => 'home_hero_image_content_color',
			    'priority'   => 10,
			    'label'      => esc_html__( 'Content Color', 'merchant-online-store' ),
				'active_callback' 	=> 'is_active_slider_type_hero',
			)
		));


	// Homepage Section - Hero Image - Button Color
	$wp_customize->add_setting( 'home_hero_image_button_color' ,
		array(
	    'default' 			=> '#03A9F4',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_hero_image_button_color',
			array(
				'section'    => 'jewelry_home_hero_section',
				'settings'   => 'home_hero_image_button_color',
			    'priority'   => 11,
			    'label'      => esc_html__( 'Button Color', 'merchant-online-store' ),
				'active_callback' 	=> 'is_active_slider_type_hero',
			)
		));


	// Homepage Section - Hero Image - Button Text Color
	$wp_customize->add_setting( 'home_hero_image_button_text_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_hero_image_button_text_color',
			array(
				'section'    => 'jewelry_home_hero_section',
				'settings'   => 'home_hero_image_button_text_color',
			    'priority'   => 12,
			    'label'      => esc_html__( 'Button Text Color', 'merchant-online-store' ),
				'active_callback' 	=> 'is_active_slider_type_hero',			)
		));



	$wp_customize->add_setting('bellini_slider_third_party_field', array(
		'transport' 		=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('bellini_slider_third_party_field',array(
				'type' 			=>'text',
               'label'      	=> esc_html__( '3rd Party Slider Shortcode', 'merchant-online-store' ),
               'section'    	=> 'jewelry_home_hero_section',
               'settings'   	=> 'bellini_slider_third_party_field',
               'priority'   	=> 6,
				'active_callback' 	=> 'is_active_slider_type_third_party',
			));


/*
-------------------------------------------------------------------------------------------------------
  Product Category
-------------------------------------------------------------------------------------------------------
*/

	// Homepage Section - Category Box Color
	$wp_customize->add_setting( 'home_product_cat_box_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_cat_box_color',
			array(
				'section'    => 'jewelry_home_product_category_section',
				'settings'   => 'home_product_cat_box_color',
			    'priority'   => 4,
			    'label'      => esc_html__( 'Category Box Color', 'merchant-online-store' ),
			)
		));


	// Product Category Section Title
	$wp_customize->add_setting('home_product_cat_section_title', array(
		'default'	=> __('Shop Collection', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('home_product_cat_section_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Section Title', 'merchant-online-store' ),
               'section'    => 'jewelry_home_product_category_section',
               'settings'   => 'home_product_cat_section_title',
               'priority'   => 10,
			));


	// Category Products Section Title
	$wp_customize->add_setting('home_product_category_section_desc', array(
		'transport' => 'postMessage',
		'sanitize_callback' 	=> 'wp_filter_nohtml_kses',
		'default'	=> __('We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store'),

	) );

			$wp_customize->add_control('home_product_category_section_desc',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Section Description', 'merchant-online-store' ),
               'section'    => 'jewelry_home_product_category_section',
               'settings'   => 'home_product_category_section_desc',
               'priority'   => 11,
			));

	// Homepage Section - Product Category - Background Color
	$wp_customize->add_setting( 'home_product_cat_back_color' ,
		array(
	    'default' 			=> '#efefef',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_cat_back_color',
			array(
				'section'    => 'jewelry_home_product_category_section',
				'settings'   => 'home_product_cat_back_color',
			    'priority'   => 12,
			    'label'      => esc_html__( 'Section Background Color', 'merchant-online-store' ),
			)
		));


	// Homepage Section - Product Category - Background Image
	$wp_customize->add_setting('home_product_cat_back_image', array(
		'default'           => false,
		'sanitize_callback' => 'esc_url_raw',
		'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'home_product_cat_back_image',array(
               'section'    => 'jewelry_home_product_category_section',
               'settings'   => 'home_product_cat_back_image',
               'description'=> esc_html__('Section Background Image', 'merchant-online-store'),
               'priority'   => 13,
			   )
			));



/*
-------------------------------------------------------------------------------------------------------
  Featured Products
-------------------------------------------------------------------------------------------------------
*/

	// Homepage Section - Featured Products - Product Box Color
	$wp_customize->add_setting( 'home_product_featured_box_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_featured_box_color',
			array(
				'section'    => 'jewelry_home_product_featured_section',
				'settings'   => 'home_product_featured_box_color',
			    'priority'   => 2,
			    'label'      => esc_html__( 'Product Box Color', 'merchant-online-store' ),
			)
		));

	// Product Featured Section Title
	$wp_customize->add_setting('home_product_featured_section_title', array(
		'default'	=> __('Staff picks of the week', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('home_product_featured_section_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Section Title', 'merchant-online-store' ),
               'section'    => 'jewelry_home_product_featured_section',
               'settings'   => 'home_product_featured_section_title',
               'priority'   => 10,
			));


	// Latest Products Section Title
	$wp_customize->add_setting('home_product_featured_section_desc', array(
		'default'	=> __('We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' 	=> 'wp_filter_nohtml_kses',
	) );

			$wp_customize->add_control('home_product_featured_section_desc',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Section Description', 'merchant-online-store' ),
               'section'    => 'jewelry_home_product_featured_section',
               'settings'   => 'home_product_featured_section_desc',
               'priority'   => 11,
			));


	// Homepage Section - Product Featured - Background Color
	$wp_customize->add_setting( 'home_product_featured_back_color' ,
		array(
	    'default' 			=> '#f0f8ff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_featured_back_color',
			array(
				'section'    => 'jewelry_home_product_featured_section',
				'settings'   => 'home_product_featured_back_color',
			    'priority'   => 12,
			    'label'      => esc_html__( 'Section Background Color', 'merchant-online-store' ),
			)
		));


	// Homepage Section - Product Featured - Background Image
	$wp_customize->add_setting('home_product_featured_back_image', array(
		'default'           => false,
		'sanitize_callback' => 'esc_url_raw',
		'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'home_product_featured_back_image',array(
               'section'    => 'jewelry_home_product_featured_section',
               'settings'   => 'home_product_featured_back_image',
               'description'=> esc_html__('Section Background Image', 'merchant-online-store'),
               'priority'   => 13,
			   )
			));


/*
-------------------------------------------------------------------------------------------------------
  Latest Products
-------------------------------------------------------------------------------------------------------
*/
	// Latest Products - Number of Products to display
	$wp_customize->add_setting('home_product_latest_product_per_section', array(
		'default'	=> 3,
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('home_product_latest_product_per_section',array(
				'type' 		=>'number',
               'label'      => esc_html__( 'Number of Products', 'merchant-online-store' ),
               'section'    => 'jewelry_home_product_latest_section',
               'settings'   => 'home_product_latest_product_per_section',
               'priority'   => 1,
			));


	// Latest Products Layout
	$wp_customize->add_setting( 'home_product_latest_layout' ,
		array(
			'default' 			=> 2,
			'sanitize_callback' => 'absint',
			'transport' 		=> 'refresh',
		)
	);

		$wp_customize->add_control( 'home_product_latest_layout',array(
				'label'      	=> esc_html__( 'Latest Products Layout', 'merchant-online-store' ),
				'section'    	=> 'jewelry_home_product_latest_section',
				'settings'   	=> 'home_product_latest_layout',
			    'priority'   	=> 2,
			    'type'       	=> 'radio',
				'choices'    	=> array(
									1   => esc_html__( 'Compact', 'merchant-online-store' ),
									2 	=> esc_html__( 'Box', 'merchant-online-store' ),
								),
			)
		);

	// Homepage Section - Latest Products - Product Box Color
	$wp_customize->add_setting( 'home_product_latest_box_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_latest_box_color',
			array(
				'section'    => 'jewelry_home_product_latest_section',
				'settings'   => 'home_product_latest_box_color',
			    'priority'   => 3,
			    'label'      => esc_html__( 'Product Box Color', 'merchant-online-store' ),
			)
		));


	// Latest Products Section Title
	$wp_customize->add_setting('home_product_latest_section_title', array(
		'default'	=> __('Latest Release', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('home_product_latest_section_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Section Title', 'merchant-online-store' ),
               'section'    => 'jewelry_home_product_latest_section',
               'settings'   => 'home_product_latest_section_title',
               'priority'   => 10,
			));

	// Latest Products Section Description
	$wp_customize->add_setting('home_product_latest_section_desc', array(
		'default'	=> __('We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' 	=> 'wp_filter_nohtml_kses',
	) );

			$wp_customize->add_control('home_product_latest_section_desc',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Section Description', 'merchant-online-store' ),
               'section'    => 'jewelry_home_product_latest_section',
               'settings'   => 'home_product_latest_section_desc',
               'priority'   => 11,
			));


	// Homepage Section - Product Category - Background Color
	$wp_customize->add_setting( 'home_product_latest_back_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_latest_back_color',
			array(
				'section'    => 'jewelry_home_product_latest_section',
				'settings'   => 'home_product_latest_back_color',
			    'priority'   => 12,
			    'label'      => esc_html__( 'Section Background Color', 'merchant-online-store' ),
			)
		));


	// Homepage Section - Product Category - Background Image
	$wp_customize->add_setting('home_product_latest_back_image', array(
		'default'           => false,
		'sanitize_callback' => 'esc_url_raw',
		'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'home_product_latest_back_image',array(
               'section'    => 'jewelry_home_product_latest_section',
               'settings'   => 'home_product_latest_back_image',
               'description'=> esc_html__('Section Background Image', 'merchant-online-store'),
               'priority'   => 13,
			   )
			));



/*
-------------------------------------------------------------------------------------------------------
  Homepage Articles
-------------------------------------------------------------------------------------------------------
*/

	// Products - Number of Products to display
	$wp_customize->add_setting('home_articles_per_section', array(
		'default'	=> 3,
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('home_articles_per_section',array(
				'type' 		=>'number',
               'label'      => esc_html__( 'Number of Products', 'merchant-online-store' ),
               'section'    => 'jewelry_home_articles_section',
               'settings'   => 'home_articles_per_section',
               'priority'   => 1,
			));

	// Products - Sort Products
	$wp_customize->add_setting( 'home_articles_sort' ,
		array(
			'default' => 1,
			'sanitize_callback' => 'absint',
			'transport' => 'refresh',
		)
	);

		$wp_customize->add_control( 'home_articles_sort',array(
				'label'      	=> esc_html__( 'Display Articles by', 'merchant-online-store' ),
				'section'    	=> 'jewelry_home_articles_section',
				'settings'   	=> 'home_articles_sort',
			    'priority'   	=> 2,
			    'type'       	=> 'radio',
				'choices'    	=> array(
									1   => esc_html__( 'Title A - Z', 'merchant-online-store' ),
									2 	=> esc_html__( 'Title Z - A', 'merchant-online-store' ),
									3   => esc_html__( 'Newest Article First', 'merchant-online-store' ),
									4 	=> esc_html__( 'Oldest Article First', 'merchant-online-store' ),
									5 	=> esc_html__( 'Most Commented Article First', 'merchant-online-store' ),
								),
			)
		);





	// Homepage Articles Box Color
	$wp_customize->add_setting( 'home_articles_box_color' ,
		array(
	    'default' 			=> '#f0f8ff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_articles_box_color',
			array(
				'section'    => 'jewelry_home_articles_section',
				'settings'   => 'home_articles_box_color',
			    'priority'   => 4,
			    'label'      => esc_html__( 'Articles Box Color', 'merchant-online-store' ),
			)
		));

	// Articles Text Color
	$wp_customize->add_setting( 'home_articles_box_text_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_articles_box_text_color',
			array(
				'section'    => 'jewelry_home_articles_section',
				'settings'   => 'home_articles_box_text_color',
			    'priority'   => 5,
			    'label'      => esc_html__( 'Articles Text Color', 'merchant-online-store' ),
			)
		));




	// Homepage Articles Section Title
	$wp_customize->add_setting('home_articles_section_title', array(
		'default'	=> __('Note from Editors', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('home_articles_section_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Section Title', 'merchant-online-store' ),
               'section'    => 'jewelry_home_articles_section',
               'settings'   => 'home_articles_section_title',
               'priority'   => 10,
			));


	// Category Products Section Title
	$wp_customize->add_setting('home_articles_section_desc', array(
		'transport' => 'postMessage',
		'sanitize_callback' 	=> 'wp_filter_nohtml_kses',
		'default'	=> __('We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store'),

	) );

			$wp_customize->add_control('home_articles_section_desc',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Section Description', 'merchant-online-store' ),
               'section'    => 'jewelry_home_articles_section',
               'settings'   => 'home_articles_section_desc',
               'priority'   => 10,
			));



	// Homepage Section - Homepage Articles - Background Color
	$wp_customize->add_setting( 'home_articles_back_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_articles_back_color',
			array(
				'section'    => 'jewelry_home_articles_section',
				'settings'   => 'home_articles_back_color',
			    'priority'   => 10,
			    'label'      => esc_html__( 'Section Background Color', 'merchant-online-store' ),
			)
		));


	// Homepage Section - Homepage Articles - Background Image
	$wp_customize->add_setting('home_articles_back_image', array(
		'default'           => false,
		'sanitize_callback' => 'esc_url_raw',
		'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'home_articles_back_image',array(
               'section'    => 'jewelry_home_articles_section',
               'settings'   => 'home_articles_back_image',
               'description'=> esc_html__('Section Background Image', 'merchant-online-store'),
               'priority'   => 11,
			   )
			));


/*
-------------------------------------------------------------------------------------------------------
  All Products
-------------------------------------------------------------------------------------------------------
*/
	// Products - Number of Products to display
	$wp_customize->add_setting('home_product_all_product_per_section', array(
		'default'	=> 6,
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('home_product_all_product_per_section',array(
				'type' 		=>'number',
               'label'      => esc_html__( 'Number of Products', 'merchant-online-store' ),
               'section'    => 'jewelry_home_all_product_section',
               'settings'   => 'home_product_all_product_per_section',
               'priority'   => 1,
			));


	// Homepage Section - Latest Products - Product Box Color
	$wp_customize->add_setting( 'home_product_all_box_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_all_box_color',
			array(
				'section'    => 'jewelry_home_all_product_section',
				'settings'   => 'home_product_all_box_color',
			    'priority'   => 3,
			    'label'      => esc_html__( 'Product Box Color', 'merchant-online-store' ),
			)
		));


	// Latest Products Section Title
	$wp_customize->add_setting('home_product_all_section_title', array(
		'default'	=> __('Best Selling', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

			$wp_customize->add_control('home_product_all_section_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Best Selling', 'merchant-online-store' ),
               'section'    => 'jewelry_home_all_product_section',
               'settings'   => 'home_product_all_section_title',
               'priority'   => 10,
			));

	// Latest Products Section Description
	$wp_customize->add_setting('home_product_all_section_desc', array(
		'default'	=> __('We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store'),
		'transport' => 'postMessage',
		'sanitize_callback' 	=> 'wp_filter_nohtml_kses',
	) );

			$wp_customize->add_control('home_product_all_section_desc',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Section Description', 'merchant-online-store' ),
               'section'    => 'jewelry_home_all_product_section',
               'settings'   => 'home_product_all_section_desc',
               'priority'   => 11,
			));


	// Homepage Section - Product Category - Background Color
	$wp_customize->add_setting( 'home_product_all_back_color' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'home_product_all_back_color',
			array(
				'section'    => 'jewelry_home_all_product_section',
				'settings'   => 'home_product_all_back_color',
			    'priority'   => 12,
			    'label'      => esc_html__( 'Section Background Color', 'merchant-online-store' ),
			)
		));


	// Homepage Section - Product Category - Background Image
	$wp_customize->add_setting('home_product_all_back_image', array(
		'default'           => false,
		'sanitize_callback' => 'esc_url_raw',
		'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'home_product_all_back_image',array(
               'section'    => 'jewelry_home_all_product_section',
               'settings'   => 'home_product_all_back_image',
               'description'=> esc_html__('Section Background Image', 'merchant-online-store'),
               'priority'   => 13,
			   )
			));