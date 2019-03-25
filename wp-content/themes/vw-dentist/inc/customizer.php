<?php
/**
 * VW Dentist Theme Customizer
 *
 * @package VW Dentist
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_dentist_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_dentist_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-dentist' ),
	) );

	// Layout
	$wp_customize->add_section( 'vw_dentist_left_right', array(
    	'title'      => __( 'General Settings', 'vw-dentist' ),
		'panel' => 'vw_dentist_panel_id'
	) );

	$wp_customize->add_setting('vw_dentist_theme_options',array(
        'default' => __('Right Sidebar','vw-dentist'),
        'sanitize_callback' => 'vw_dentist_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_dentist_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-dentist'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-dentist'),
        'section' => 'vw_dentist_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-dentist'),
            'Right Sidebar' => __('Right Sidebar','vw-dentist'),
            'One Column' => __('One Column','vw-dentist'),
            'Three Columns' => __('Three Columns','vw-dentist'),
            'Four Columns' => __('Four Columns','vw-dentist'),
            'Grid Layout' => __('Grid Layout','vw-dentist')
        ),
	) );

	$wp_customize->add_setting('vw_dentist_page_layout',array(
        'default' => __('One Column','vw-dentist'),
        'sanitize_callback' => 'vw_dentist_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_dentist_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-dentist'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-dentist'),
        'section' => 'vw_dentist_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-dentist'),
            'Right Sidebar' => __('Right Sidebar','vw-dentist'),
            'One Column' => __('One Column','vw-dentist')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_dentist_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-dentist' ),
		'panel' => 'vw_dentist_panel_id'
	) );

	$wp_customize->add_setting('vw_dentist_header_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_dentist_header_call',array(
		'label'	=> __('Add Phone No.','vw-dentist'),
		'input_attrs' => array(
            'placeholder' => __( '+07 123 125 1234', 'vw-dentist' ),
        ),
		'section'=> 'vw_dentist_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_dentist_header_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_dentist_header_email',array(
		'label'	=> __('Add Email Address','vw-dentist'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-dentist' ),
        ),
		'section'=> 'vw_dentist_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_dentist_header_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_dentist_header_address',array(
		'label'	=> __('Add Location','vw-dentist'),
		'input_attrs' => array(
            'placeholder' => __( '123 lorem ipsum dummy street, COUNTRY', 'vw-dentist' ),
        ),
		'section'=> 'vw_dentist_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_dentist_header_search',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_dentist_header_search',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Search','vw-dentist'),
       'section' => 'vw_dentist_topbar',
    ));
    
	//Slider
	$wp_customize->add_section( 'vw_dentist_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-dentist' ),
		'panel' => 'vw_dentist_panel_id'
	) );

	$wp_customize->add_setting('vw_dentist_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_dentist_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-dentist'),
       'section' => 'vw_dentist_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_dentist_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_dentist_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_dentist_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-dentist' ),
			'description' => __('Slider image size (1500 x 590)','vw-dentist'),
			'section'  => 'vw_dentist_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Services section
	$wp_customize->add_section( 'vw_dentist_services_section' , array(
    	'title'      => __( 'Awesome Features Section', 'vw-dentist' ),
		'priority'   => null,
		'panel' => 'vw_dentist_panel_id'
	) );

	$wp_customize->add_setting('vw_dentist_section_sub_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_dentist_section_sub_title',array(
		'label'	=> __('Section Sub Title','vw-dentist'),
		'input_attrs' => array(
            'placeholder' => __( 'Awesome Features', 'vw-dentist' ),
        ),
		'section'=> 'vw_dentist_services_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_dentist_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_dentist_section_title',array(
		'label'	=> __('Section Title','vw-dentist'),
		'input_attrs' => array(
            'placeholder' => __( 'Our Dental Clinic Services', 'vw-dentist' ),
        ),
		'section'=> 'vw_dentist_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_dentist_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_dentist_sanitize_choices',
	));
	$wp_customize->add_control('vw_dentist_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-dentist'),
		'description' => __('Image Size (250 x 250)','vw-dentist'),
		'section' => 'vw_dentist_services_section',
	));

	//Content Craetion
	$wp_customize->add_section( 'vw_dentist_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-dentist' ),
		'priority' => null,
		'panel' => 'vw_dentist_panel_id'
	) );

	$wp_customize->add_setting('vw_dentist_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Dentist_Content_Creation( $wp_customize, 'vw_dentist_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-dentist' ),
		),
		'section' => 'vw_dentist_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-dentist' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_dentist_footer',array(
		'title'	=> __('Footer','vw-dentist'),
		'panel' => 'vw_dentist_panel_id',
	));	
	
	$wp_customize->add_setting('vw_dentist_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_dentist_footer_text',array(
		'label'	=> __('Copyright Text','vw-dentist'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-dentist' ),
        ),
		'section'=> 'vw_dentist_footer',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_dentist_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Dentist_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Dentist_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Dentist_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW DENTIST PRO', 'vw-dentist' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-dentist' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/dentist-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-dentist-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-dentist-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Dentist_Customize::get_instance();