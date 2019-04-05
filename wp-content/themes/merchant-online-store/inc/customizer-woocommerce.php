<?php

/*
woocommerce -200
	woocommerce_store_notice - 10
	woocommerce_product_catalog - 10
	woocommerce_product_images - 20
*/



/*
-------------------------------------------------------------------------------------------------------
  Product Catalog
-------------------------------------------------------------------------------------------------------
*/

	// Product Category Layout
	$wp_customize->add_setting( 'woocommerce_product_catalog_layout' ,
		array(
			'default' => 2,
			'sanitize_callback' => 'absint',
			'transport' => 'refresh',
		)
	);

		$wp_customize->add_control( 'woocommerce_product_catalog_layout',array(
				'label'      	=> esc_html__( 'Catalog Layout', 'merchant-online-store' ),
				'section'    	=> 'woocommerce_product_catalog',
				'settings'   	=> 'woocommerce_product_catalog_layout',
			    'priority'   	=> 2,
			    'type'       	=> 'radio',
				'choices'    	=> array(
									1   => esc_html__( 'Default', 'merchant-online-store' ),
									2 	=> esc_html__( '3 Column', 'merchant-online-store' ),
								),
			)
		);


/*
-------------------------------------------------------------------------------------------------------
  Single Product
-------------------------------------------------------------------------------------------------------
*/

	// Product  Layout
	$wp_customize->add_setting( 'woocommerce_product_single_layout' ,
		array(
			'default' => 2,
			'sanitize_callback' => 'absint',
			'transport' => 'refresh',
		)
	);

		$wp_customize->add_control( 'woocommerce_product_single_layout',array(
				'label'      	=> esc_html__( 'Catalog Layout', 'merchant-online-store' ),
				'section'    	=> 'storefront_single_product_page',
				'settings'   	=> 'woocommerce_product_single_layout',
			    'priority'   	=> 2,
			    'type'       	=> 'radio',
				'choices'    	=> array(
									1   => esc_html__( 'Default', 'merchant-online-store' ),
									2 	=> esc_html__( '3 Column', 'merchant-online-store' ),
								),
			)
		);