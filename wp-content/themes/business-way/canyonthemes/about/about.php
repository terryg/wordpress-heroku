<?php
/**
 * About setup
 *
 * @package Nexas
 */

if ( ! function_exists( 'business_way_about_setup' ) ) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function business_way_about_setup() {

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ):

		    $url =  admin_url( 'themes.php?page=pt-one-click-demo-import' );

		else:

		     $url = admin_url();

		endif;

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use. Thank you for choosing Business Way for your Website. Please follow theme documentation properly to know how to use Business Way.', 'business-way' ), 'Business Way' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'business-way' ),
				'free_pro' => esc_html__( 'Free Vs Pro', 'business-way' ),
				'demos'=> esc_html__( 'Multiple Demos', 'business-way' ),
				),

			// Quick links.
			'quick_links' => array(
                'theme_url' => array(
                    'text' => esc_html__( 'Theme Details', 'business-way' ),
                    'url'  => 'https://canyonthemes.com/themes/business-way/',
                    'button' => 'primary',
                ),
                'theme_demo' => array(
                    'text' => esc_html__( 'Demo', 'business-way' ),
                    'url'  => 'https://canyonthemes.com/demo/business-way/',
                    'button' => 'primary',
                ),
                'documentation' => array(
                    'text' => esc_html__( 'Documentation', 'business-way' ),
                    'url'  => 'https://doc.canyonthemes.com/business-way/',
                    'button' => 'primary',
                ),
                'support' => array(
                    'text' => esc_html__( 'Support', 'business-way' ),
                    'url'  => 'https://www.canyonthemes.com/supports/',
                    'button' => 'primary',
                ),
            ),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'business-way' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'business-way' ),
					'button_text' => esc_html__( 'View Documentation', 'business-way' ),
					'button_url'  => 'http://doc.canyonthemes.com/business-way/',
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'business-way' ),
					'icon'        => 'dashicons dashicons-admin-generic',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'business-way' ),
					'button_text' => esc_html__( 'Static Front Page', 'business-way' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'business-way' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'business-way' ),
					'button_text' => esc_html__( 'Customize', 'business-way' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'four' => array(
					'title'       => esc_html__( 'Demo Content', 'business-way' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'business-way' ), esc_html__( 'One Click Demo Import', 'business-way' ) ),
					'button_text' => esc_html__( 'Demo Import', 'business-way' ),
					'button_url'  => $url,
					'button_type' => 'primary',
					),
				'five' => array(
					'title'       => esc_html__( 'Theme Preview', 'business-way' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'business-way' ),
					'button_text' => esc_html__( 'View Demo', 'business-way' ),
					'button_url'  => 'http://canyonthemes.com/demo/business-way',
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
                'six' => array(
                    'title'       => esc_html__( 'Contact Support', 'business-way' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'business-way' ),
                    'button_text' => esc_html__( 'Contact Support', 'business-way' ),
                    'button_url'  => 'https://canyonthemes.com/contact-us/',
					'button_type' => 'primary',
                    'is_new_tab'  => true,
                ),
				),

			// Free vs pro array.
		    'free_pro' => array(
			    array(
				    'title'       => __( 'Custom Widgets', 'business-way' ),
				    'desc' => __( 'Added custom Widgets', 'business-way' ),
				    'free'  => __('9+ Available','business-way'),
				    'pro'   => __('13+ Available','business-way'),
			    ),
			    array(
				    'title' => __( 'Slider Settings', 'business-way' ),
				    'desc' => __( 'Options to Manage Slider', 'business-way' ),
				    'free'  => __('Limited','business-way'),
				    'pro'   => __('Multiple Options Available','business-way'),
			    ),
			    array(
				    'title' => __( 'Header Settings', 'business-way' ),
				    'desc' => __( 'Options to Manage Header Section', 'business-way' ),
				    'free'  => __('Limited','business-way'),
				    'pro'   => __('Multiple Options Available','business-way'),
			    ),
			    array(
				    'title' => __( 'Blog Page Options', 'business-way' ),
				    'desc' => __( 'Blog Page options to manage blog page', 'business-way' ),
				    'free'  => __('Limited','business-way'),
				    'pro'   => __('Multiple Options Available','business-way'),
			    ),
			    array(
				    'title' => __( 'Single Page Options', 'business-way' ),
				    'desc' => __( 'Single Page options to manage Single page', 'business-way' ),
				    'free'  => __('Limited','business-way'),
				    'pro'   => __('Options to manage related posts','business-way'),
			    ),
			    array(
				    'title' => __( 'Featured Image Options', 'business-way' ),
				    'desc' => __( 'Featured image on single page and post', 'business-way' ),
				    'free'  => __('Limited','business-way'),
				    'pro'   => __('Options show hide','business-way'),
			    ),
			    array(
				    'title' => __( 'Pagination Options', 'business-way' ),
				    'desc' => __( 'Featured image on single page and post', 'business-way' ),
				    'free'  => __('Default & Numeric','business-way'),
				    'pro'   => __('Default, Numeric','business-way'),
			    ),
			    array(
				    'title' => __( 'Pagination Options', 'business-way' ),
				    'desc' => __( 'Featured image on single page and post', 'business-way' ),
				    'free'  => __('Default & Numeric','business-way'),
				    'pro'   => __('Default, Numeric','business-way'),
			    ),
			    array(
				    'title' => __( 'Search Placeholder', 'business-way' ),
				    'desc' => __( 'It will help to change the search placeholder', 'business-way' ),
				    'free'  => __('Yes','business-way'),
				    'pro'   => __('Yes','business-way'),
			    ),
			    array(
				    'title' => __( 'Color', 'business-way' ),
				    'desc' => __( 'Options to manage site color', 'business-way' ),
				    'free'  => __('Primary','business-way'),
				    'pro'   => __('Multiple Options','business-way'),
			    ),
			    array(
				    'title' => __( 'Fonts', 'business-way' ),
				    'desc' => __( 'Options to manage site Fonts', 'business-way' ),
				    'free'  => __('Default','business-way'),
				    'pro'   => __('Indivdual Section Options for Fonts','business-way'),
			    ),
			    array(
				    'title' => __( 'Animation Options', 'business-way' ),
				    'desc' => __( 'Do not like animation?', 'business-way' ),
				    'free'  => __('Disable Option','business-way'),
				    'pro'   => __('Disable Option','business-way'),
			    ),
			    array(
				    'title' => __( 'Copyright Options', 'business-way' ),
				    'free'  => __('Yes','business-way'),
				    'pro'   => __('Yes','business-way'),
			    ),
			    array(
				    'title' => __( 'Powered By Text Options', 'business-way' ),
				    'free'  => __('No','business-way'),
				    'pro'   => __('Yes','business-way'),
			    ),
			    array(
				    'title' => __( 'Go to Top', 'business-way' ),
				    'free'  => __('Yes','business-way'),
				    'pro'   => __('Yes','business-way'),
			    ),
			    array(
				    'title' => __( 'Header Types', 'business-way' ),
				    'free'  => __('Default','business-way'),
				    'pro'   => __('Multiple Types','business-way'),
			    ),
			    array(
				    'title' => __( 'Footer Types', 'business-way' ),
				    'free'  => __('Default','business-way'),
				    'pro'   => __('Multiple Types','business-way'),
			    ),
			    array(
				    'title' => __( 'Documentation', 'business-way' ),
				    'free'  => __('Yes','business-way'),
				    'pro'   => __('Yes','business-way'),
			    ),
			    array(
				    'title' => __( 'Updates', 'business-way' ),
				    'free'  => __('Free but Limited','business-way'),
				    'pro'   => __('Free and Regular','business-way'),
			    ),
			    array(
				    'title'       => __( 'Support Forum', 'business-way' ),
				    'desc' => __( 'Highly dedicated support team are assigned for your help. Try this today.', 'business-way' ),
				    'free'  => __('Second', 'business-way'),
				    'pro'   => __('Dedicated With High Priority', 'business-way'),
			    )

		    ),
		);

		Business_Way_About::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'business_way_about_setup' );
