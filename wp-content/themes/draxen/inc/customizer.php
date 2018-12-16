<?php
/**
 * draxen Theme Customizer
 *
 * @package draxen
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function draxen_customize_register( $wp_customize ) {

	global $draxenPostsPagesArray, $draxenYesNo, $draxenSliderType, $draxenServiceLayouts, $draxenAvailableCats, $draxenBusinessLayoutType;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'draxen_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'draxen_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'draxen_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'draxen'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'draxen_general';
	$wp_customize->get_section( 'background_image' )->panel = 'draxen_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'draxen');
	$wp_customize->get_section( 'header_image' )->panel = 'draxen_general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'draxen');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'draxen' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'draxen'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'draxen_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new draxen_Customize_Control_Upgrade(
		$wp_customize,
		'draxen_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'draxen' ),
			'settings'   => 'draxen_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'draxen'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'draxen_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new draxen_Customize_Control_Guide(
		$wp_customize,
		'draxen_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'draxen' ),
			'settings'   => 'draxen_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'draxen'),
		'active_callback' => '',
	) );
	$wp_customize->add_section( 'business_page_layout', array(
		'priority'       => 13,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select layout', 'draxen'),
		'active_callback' => 'draxen_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'business_page_layout_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_layout_type',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_page_layout_type',
		array(
			'label'      => __( 'Layout type :', 'draxen' ),
			'settings'   => 'business_page_layout_type',
			'priority'   => 10,
			'section'    => 'business_page_layout',
			'type'    => 'select',
			'choices' => $draxenBusinessLayoutType,
		)
	) );
	
	$wp_customize->add_section( 'business_page_layout_one', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout One settings', 'draxen'),
		'active_callback' => 'draxen_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'draxen_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_show_slider',
		array(
			'label'      => __( 'Show header?', 'draxen' ),
			'settings'   => 'draxen_show_slider',
			'priority'   => 10,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $draxenYesNo,
		)
	) );

	$wp_customize->add_setting( 'draxen_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'draxen' ),
			'settings'   => 'draxen_welcome_post',
			'priority'   => 11,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $draxenPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'draxen_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_services_cat',
		array(
			'label'      => __( 'Select category for services :', 'draxen' ),
			'settings'   => 'draxen_services_cat',
			'priority'   => 21,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $draxenAvailableCats,
		)
	) );
	
	

	$wp_customize->add_setting( 'draxen_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_portfolio_cat',
		array(
			'label'      => __( 'Select category for portfolio :', 'draxen' ),
			'settings'   => 'draxen_portfolio_cat',
			'priority'   => 21,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $draxenAvailableCats,
		)
	) );
	

	$wp_customize->add_setting( 'draxen_news_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_news_cat',
		array(
			'label'      => __( 'Select category for news :', 'draxen' ),
			'settings'   => 'draxen_news_cat',
			'priority'   => 31,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $draxenAvailableCats,
		)
	) );	
	
	
	
	
	$wp_customize->add_section( 'business_page_layout_two', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout Two settings', 'draxen'),
		'active_callback' => 'draxen_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'draxen_show_slider_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_show_slider_two',
		array(
			'label'      => __( 'Show header?', 'draxen' ),
			'settings'   => 'draxen_show_slider_two',
			'priority'   => 10,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $draxenYesNo,
		)
	) );
	$wp_customize->add_setting( 'draxen_two_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_two_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'draxen' ),
			'settings'   => 'draxen_two_welcome_post',
			'priority'   => 20,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $draxenPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_setting( 'draxen_two_product_post_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_two_product_post_one',
		array(
			'label'      => __( 'Product One :', 'draxen' ),
			'settings'   => 'draxen_two_product_post_one',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $draxenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'draxen_two_product_post_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_two_product_post_two',
		array(
			'label'      => __( 'Product Two :', 'draxen' ),
			'settings'   => 'draxen_two_product_post_two',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $draxenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'draxen_two_product_post_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_two_product_post_three',
		array(
			'label'      => __( 'Product Three :', 'draxen' ),
			'settings'   => 'draxen_two_product_post_three',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $draxenPostsPagesArray,
		)
	) );	
	

	$wp_customize->add_section( 'business_page_quote', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'draxen'),
		'active_callback' => '',
		'panel'  => 'draxen_general',
	) );
	$wp_customize->add_setting( 'draxen_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_show_quote',
		array(
			'label'      => __( 'Show quote?', 'draxen' ),
			'settings'   => 'draxen_show_quote',
			'priority'   => 10,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $draxenYesNo,
		)
	) );
	$wp_customize->add_setting( 'draxen_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_quote_post',
		array(
			'label'      => __( 'Select post', 'draxen' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'draxen' ),
			'settings'   => 'draxen_quote_post',
			'priority'   => 11,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $draxenPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'business_page_social', array(
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'draxen'),
		'active_callback' => '',
		'panel'  => 'draxen_general',
	) );	
	$wp_customize->add_setting( 'draxen_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'draxen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'draxen_show_social',
		array(
			'label'      => __( 'Show social?', 'draxen' ),
			'settings'   => 'draxen_show_social',
			'priority'   => 10,
			'section'    => 'business_page_social',
			'type'    => 'select',
			'choices' => $draxenYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'draxen' ),
	  'description' => __( 'Enter your facebook url.', 'draxen' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'draxen' ),
	  'description' => __( 'Enter your flickr url.', 'draxen' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'draxen' ),
	  'description' => __( 'Enter your gplus url.', 'draxen' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'draxen' ),
	  'description' => __( 'Enter your linkedin url.', 'draxen' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'draxen' ),
	  'description' => __( 'Enter your reddit url.', 'draxen' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'draxen' ),
	  'description' => __( 'Enter your stumble url.', 'draxen' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'draxen' ),
	  'description' => __( 'Enter your twitter url.', 'draxen' ),
	) );	
	
}
add_action( 'customize_register', 'draxen_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function draxen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function draxen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function draxen_customize_preview_js() {
	wp_enqueue_script( 'draxen-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'draxen_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function draxen_sanitize_yes_no_setting( $value ){
	global $draxenYesNo;
    if ( ! array_key_exists( $value, $draxenYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function draxen_sanitize_post_selection( $value ){
	global $draxenPostsPagesArray;
    if ( ! array_key_exists( $value, $draxenPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function draxen_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function draxen_sanitize_slider_type_setting( $value ){

	global $draxenSliderType;
    if ( ! array_key_exists( $value, $draxenSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function draxen_sanitize_cat_setting( $value ){
	
	global $draxenAvailableCats;
	
	if( ! array_key_exists( $value, $draxenAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function draxen_sanitize_layout_type( $value ){
	
	global $draxenBusinessLayoutType;
	
	if( ! array_key_exists( $value, $draxenBusinessLayoutType ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'draxen_load_customize_classes', 0 );
function draxen_load_customize_classes( $wp_customize ) {
	
	class draxen_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'draxen-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="draxen-upgrade-container" class="draxen-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .draxen-upgrade-container -->
			
		<?php }	
		
	}
	
	class draxen_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'draxen-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="draxen-upgrade-container" class="draxen-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .draxen-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'draxen_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'draxen_Customize_Control_Guide' );
	
	
}