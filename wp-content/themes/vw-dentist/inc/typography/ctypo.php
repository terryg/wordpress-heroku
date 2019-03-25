<?php
/**
 * @package VW Dentist
 * @subpackage vw-dentist
 *
*/

# Register our customizer panels, sections, settings, and controls.
add_action( 'customize_register', 'vw_dentist_typography_customize_register', 15 );

# Load scripts and styles.
add_action( 'customize_controls_enqueue_scripts', 'vw_dentist_customize_controls_register_scripts' );
add_action( 'customize_preview_init', 'vw_dentist_customize_preview_enqueue_scripts'   );

# Add custom styles to `<head>`.
add_action( 'wp_head', 'vw_dentist_print_styles' );

function vw_dentist_typography_customize_register( $wp_customize ) {

	// Load customizer typography control class.
	load_template( get_template_directory(). '/inc/typography/customize/control-typography.php' );
	
	// Register typography control JS template.
	$wp_customize->register_control_type( 'VW_Dentist_Control_Typography' );

	// Add the typography panel.
	$wp_customize->add_panel( 'vw_dentist_typography', array( 'priority' => 10, 'title' => esc_html__( 'Theme Typography', 'vw-dentist' ) ) );

	// Add the `<p>` typography section.
	$wp_customize->add_section( 'vw_dentist_p_typography',
		array( 'panel' => 'vw_dentist_typography', 'title' => esc_html__( 'Content Typography', 'vw-dentist' ) )
	);

	// Add the headings typography section.
	$wp_customize->add_section( 'vw_dentist_headings_typography', 
		array( 'panel' => 'vw_dentist_typography', 'title' => esc_html__( 'Headings Typography', 'vw-dentist' ) )
	);

	// Add the `<p>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_p_font_color', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_p_font_family', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_p_font_weight', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_p_font_style',  array( 'default' => '','sanitize_callback' => 'sanitize_key','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_p_font_size',   array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_p_line_height', array( 'default' => '','sanitize_callback' => 'absint',  'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_p_letter_spacing', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );

	// Add the `<a>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_a_font_color', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_a_font_family', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_a_font_weight', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_a_font_style',  array( 'default' => '','sanitize_callback' => 'sanitize_key','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_a_font_size',   array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_a_line_height', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_a_letter_spacing', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );

	// Add the `<h1>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_h1_font_color', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h1_font_family', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h1_font_weight', array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h1_font_style',  array( 'default' => '','sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h1_font_size',   array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h1_line_height', array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h1_letter_spacing', array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );

	// Add the `<h2>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_h2_font_color', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h2_font_family', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h2_font_weight', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h2_font_style',  array( 'default' => '','sanitize_callback' => 'sanitize_key','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h2_font_size',   array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h2_line_height', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h2_letter_spacing', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );

	// Add the `<h3>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_h3_font_color', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h3_font_family', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h3_font_weight', array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h3_font_style',  array( 'default' => '','sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h3_font_size',   array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h3_line_height', array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h3_letter_spacing', array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );

	// Add the `<h4>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_h4_font_color', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h4_font_family', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h4_font_weight', array( 'default' => '','sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h4_font_style',  array( 'default' => '','sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h4_font_size',   array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h4_line_height', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h4_letter_spacing', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );

	// Add the `<h5>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_h5_font_color', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h5_font_family', array( 'default' => '','sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h5_font_weight', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h5_font_style',  array( 'default' => '','sanitize_callback' => 'sanitize_key','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h5_font_size',   array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h5_line_height', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h5_letter_spacing', array( 'default' => '','sanitize_callback' => 'absint','transport' => 'postMessage' ) );

	// Add the `<h6>` typography settings.
	// @todo Better sanitize_callback functions.
	$wp_customize->add_setting( 'vw_dentist_h6_font_color', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h6_font_family', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h6_font_weight', array( 'default' => '', 'sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h6_font_style',  array( 'default' => '', 'sanitize_callback' => 'sanitize_key','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h6_font_size',   array( 'default' => '', 'sanitize_callback' => 'absint','transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h6_line_height', array( 'default' => '', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_setting( 'vw_dentist_h6_letter_spacing', array( 'default' => '', 'sanitize_callback' => 'absint','transport' => 'postMessage' ) );

	// Add the `<p>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_p_font_color', array(
		'label'       => esc_html__( 'Paragraph Color', 'vw-dentist' ),
		'description' => __( 'Select how you want your paragraphs to appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_p_typography',
	) ) );

	$wp_customize->add_control(	new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_p_typography', array(
		'label'       => esc_html__( 'Paragraph Typography', 'vw-dentist' ),
		'description' => __( 'Select how you want your paragraphs to appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_p_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_p_font_family',
			'weight'      => 'vw_dentist_p_font_weight',
			'style'       => 'vw_dentist_p_font_style',
			'size'        => 'vw_dentist_p_font_size',
			'line_height' => 'vw_dentist_p_line_height',
			'letter_spacing' => 'vw_dentist_p_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) ) );

	// Add the `<a>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_a_font_color', array(
		'label'       => esc_html__( 'Anchor Tag Color', 'vw-dentist' ),
		'description' => __( 'Select how you want your a tag to appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_p_typography',
	) ) );

	$wp_customize->add_control(	new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_a_typography', array(
		'label'       => esc_html__( 'Anchor Tag Typography', 'vw-dentist' ),
		'description' => __( 'Select how you want your a tag to appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_p_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_a_font_family',
			'weight'      => 'vw_dentist_a_font_weight',
			'style'       => 'vw_dentist_a_font_style',
			'size'        => 'vw_dentist_a_font_size',
			'line_height' => 'vw_dentist_a_line_height',
			'letter_spacing' => 'vw_dentist_a_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) )	);

	// Add the `<h1>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_h1_font_color', array(
		'label'       => esc_html__( 'Heading 1 Color', 'vw-dentist' ),
		'description' => __( 'Select how heading 1 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',
	) ) );

	$wp_customize->add_control(	new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_h1_typography', array(
		'label'       => esc_html__( 'Heading 1', 'vw-dentist' ),
		'description' => __( 'Select how heading 1 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_h1_font_family',
			'weight'      => 'vw_dentist_h1_font_weight',
			'style'       => 'vw_dentist_h1_font_style',
			'size'        => 'vw_dentist_h1_font_size',
			'line_height' => 'vw_dentist_h1_line_height',
			'letter_spacing' => 'vw_dentist_h1_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) ) );

	// Add the `<h2>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_h2_font_color', array(
		'label'       => esc_html__( 'Heading 2 Color', 'vw-dentist' ),
		'description' => __( 'Select how heading 2 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',
	) ) );

	$wp_customize->add_control( new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_h2_typography', array(
		'label'       => esc_html__( 'Heading 2', 'vw-dentist' ),
		'description' => __( 'Select how heading 2 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_h2_font_family',
			'weight'      => 'vw_dentist_h2_font_weight',
			'style'       => 'vw_dentist_h2_font_style',
			'size'        => 'vw_dentist_h2_font_size',
			'line_height' => 'vw_dentist_h2_line_height',
			'letter_spacing' => 'vw_dentist_h2_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) )	);

	// Add the `<h3>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_h3_font_color', array(
		'label'       => esc_html__( 'Heading 3 Color', 'vw-dentist' ),
		'description' => __( 'Select how heading 3 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',
	) ) );

	$wp_customize->add_control(	new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_h3_typography', array(
		'label'       => esc_html__( 'Heading 3', 'vw-dentist' ),
		'description' => __( 'Select how heading 3 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_h3_font_family',
			'weight'      => 'vw_dentist_h3_font_weight',
			'style'       => 'vw_dentist_h3_font_style',
			'size'        => 'vw_dentist_h3_font_size',
			'line_height' => 'vw_dentist_h3_line_height',
			'letter_spacing' => 'vw_dentist_h3_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) )	);

	// Add the `<h4>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_h4_font_color', array(
		'label'       => esc_html__( 'Heading 4 Color', 'vw-dentist' ),
		'description' => __( 'Select how heading 4 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',
	) ) );

	$wp_customize->add_control( new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_h4_typography', array(
		'label'       => esc_html__( 'Heading 4', 'vw-dentist' ),
		'description' => __( 'Select how heading 4 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_h4_font_family',
			'weight'      => 'vw_dentist_h4_font_weight',
			'style'       => 'vw_dentist_h4_font_style',
			'size'        => 'vw_dentist_h4_font_size',
			'line_height' => 'vw_dentist_h4_line_height',
			'letter_spacing' => 'vw_dentist_h4_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) )	);

	// Add the `<h5>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_h5_font_color', array(
		'label'       => esc_html__( 'Heading 5 Color', 'vw-dentist' ),
		'description' => __( 'Select how heading 5 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',
	) ) );

	$wp_customize->add_control(	new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_h5_typography', array(
		'label'       => esc_html__( 'Heading 5', 'vw-dentist' ),
		'description' => __( 'Select how heading 5 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_h5_font_family',
			'weight'      => 'vw_dentist_h5_font_weight',
			'style'       => 'vw_dentist_h5_font_style',
			'size'        => 'vw_dentist_h5_font_size',
			'line_height' => 'vw_dentist_h5_line_height',
			'letter_spacing' => 'vw_dentist_h5_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) )	);

	// Add the `<h6>` typography control.

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'vw_dentist_h6_font_color', array(
		'label'       => esc_html__( 'Heading 6 Color', 'vw-dentist' ),
		'description' => __( 'Select how heading 6 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',
	) ) );

	$wp_customize->add_control(	new VW_Dentist_Control_Typography( $wp_customize, 'vw_dentist_h6_typography', array(
		'label'       => esc_html__( 'Heading 6', 'vw-dentist' ),
		'description' => __( 'Select how heading 6 should appear.', 'vw-dentist' ),
		'section'     => 'vw_dentist_headings_typography',

		// Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
		'settings'    => array(
			'family'      => 'vw_dentist_h6_font_family',
			'weight'      => 'vw_dentist_h6_font_weight',
			'style'       => 'vw_dentist_h6_font_style',
			'size'        => 'vw_dentist_h6_font_size',
			'line_height' => 'vw_dentist_h6_line_height',
			'letter_spacing' => 'vw_dentist_h6_letter_spacing'
		),

		// Pass custom labels. Use the setting key (above) for the specific label.
		'l10n'        => array(),
	) )	);
}

/**
 * Load preview scripts/styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function vw_dentist_customize_preview_enqueue_scripts() {
	wp_enqueue_script( 'vw-dentist-ctypo-customize-preview', trailingslashit( get_template_directory_uri() ) . 'inc/typography/js/customize-preview.js',array( 'jquery' )  );
}

/**
 * Add custom body class to give some more weight to our styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function vw_dentist_print_styles() {

	$style = $_p_style = $_a_style = $_h1_style = $_h2_style = $_h3_style = $_h4_style = $_h5_style = $_h6_style ='';

	$allowed_weights = array( 100, 300, 400, 500, 700, 900 );
	$allowed_styles  = array( 'normal', 'italic', 'oblique' );

	/* === <p> === */
	$p_color = get_theme_mod( 'vw_dentist_p_font_color' );
	$p_family = get_theme_mod( 'vw_dentist_p_font_family' );
	$p_weight = get_theme_mod( 'vw_dentist_p_font_weight' );
	$p_style  = get_theme_mod( 'vw_dentist_p_font_style' );
	$p_size   = get_theme_mod( 'vw_dentist_p_font_size' );
	$p_line_h = get_theme_mod( 'vw_dentist_p_line_height' );
	$p_letter_s = get_theme_mod( 'vw_dentist_p_letter_spacing' );

	if ( $p_color ){
		$_p_style .= sprintf( 'color: %s;',  $p_color  );
	}
	if ( $p_family ){
		$_p_style .= sprintf( 'font-family: %s;', esc_attr( $p_family ) );
	}
	if ( $p_weight ){
		$_p_style .= sprintf( 'font-weight: %s;', in_array( absint( $p_weight ), $allowed_weights ) ? $p_weight : 400 );
	}
	if ( $p_style ){
		$_p_style .= sprintf( 'font-style: %s;', in_array( $p_style, $allowed_styles ) ? $p_style : 'normal' );
	}
	if ( $p_size ){
		$_p_style .= sprintf( 'font-size: %spx;', absint( $p_size ) );
	}
	if ( $p_line_h ){
		$_p_style .= sprintf( 'line-height: %spx;', absint( $p_line_h ) );
	}
	if ( $p_letter_s ){
		$_p_style .= sprintf( 'letter-spacing: %spx;', absint( $p_letter_s ) );
	}
	if ( $_p_style ){
		$_p_style = sprintf( 'body.ctypo p { %s }', $_p_style );
	}

	/* === <a> === */
	$a_color = get_theme_mod( 'vw_dentist_a_font_color' );
	$a_family = get_theme_mod( 'vw_dentist_a_font_family' );
	$a_weight = get_theme_mod( 'vw_dentist_a_font_weight' );
	$a_style  = get_theme_mod( 'vw_dentist_a_font_style' );
	$a_size   = get_theme_mod( 'vw_dentist_a_font_size' );
	$a_line_h = get_theme_mod( 'vw_dentist_a_line_height' );
	$a_letter_s = get_theme_mod( 'vw_dentist_a_letter_spacing' );

	if ( $a_color ){
		$_a_style .= sprintf( 'color: %s;',  $a_color  );
	}	
	if ( $a_family ){
		$_a_style .= sprintf( 'font-family: %s;', esc_attr( $a_family ) );
	}
	if ( $a_weight ){
		$_a_style .= sprintf( 'font-weight: %s;', in_array( absint( $a_weight ), $allowed_weights ) ? $a_weight : 400 );
	}
	if ( $a_style ){
		$_a_style .= sprintf( 'font-style: %s;', in_array( $a_style, $allowed_styles ) ? $a_style : 'normal' );
	}
	if ( $a_size ){
		$_a_style .= sprintf( 'font-size: %spx;', absint( $a_size ) );
	}
	if ( $a_line_h ){
		$_a_style .= sprintf( 'line-height: %spx;', absint( $a_line_h ) );
	}
	if ( $a_letter_s ){
		$_a_style .= sprintf( 'letter-spacing: %spx;', absint( $a_letter_s ) );
	}
	if ( $_a_style ){
		$_a_style = sprintf( 'body.ctypo a { %s }', $_a_style );
	}

	/* === <h1> === */

	$h1_color = get_theme_mod( 'vw_dentist_h1_font_color' );
	$h1_family = get_theme_mod( 'vw_dentist_h1_font_family' );
	$h1_weight = get_theme_mod( 'vw_dentist_h1_font_weight' );
	$h1_style  = get_theme_mod( 'vw_dentist_h1_font_style' );
	$h1_size   = get_theme_mod( 'vw_dentist_h1_font_size' );
	$h1_line_h = get_theme_mod( 'vw_dentist_h1_line_height' );
	$h1_letter_s = get_theme_mod( 'vw_dentist_h1_letter_spacing' );

	if ( $h1_color ){
		$_h1_style .= sprintf( 'color: %s;',  $h1_color  );
	}
	if ( $h1_family ){
		$_h1_style .= sprintf( 'font-family: %s;', esc_attr( $h1_family ) );
	}
	if ( $h1_weight ){
		$_h1_style .= sprintf( 'font-weight: %s;', in_array( absint( $h1_weight ), $allowed_weights ) ? $h1_weight : 400 );
	}
	if ( $h1_style ){
		$_h1_style .= sprintf( 'font-style: %s;', in_array( $h1_style, $allowed_styles ) ? $h1_style : 'normal' );
	}
	if ( $h1_size ){
		$_h1_style .= sprintf( 'font-size: %spx;', absint( $h1_size ) );
	}
	if ( $h1_line_h ){
		$_h1_style .= sprintf( 'line-height: %spx;', absint( $h1_line_h ) );
	}
	if ( $h1_letter_s ){
		$_h1_style .= sprintf( 'letter-spacing: %spx;', absint( $h1_letter_s ) );
	}
	if ( $_h1_style ){
		$_h1_style = sprintf( 'body.ctypo h1 { %s }', $_h1_style );
	}

	/* === <h2> === */

	$h2_color = get_theme_mod( 'vw_dentist_h2_font_color' );
	$h2_family = get_theme_mod( 'vw_dentist_h2_font_family' );
	$h2_weight = get_theme_mod( 'vw_dentist_h2_font_weight' );
	$h2_style  = get_theme_mod( 'vw_dentist_h2_font_style' );
	$h2_size   = get_theme_mod( 'vw_dentist_h2_font_size' );
	$h2_line_h = get_theme_mod( 'vw_dentist_h2_line_height' );
	$h2_letter_s = get_theme_mod( 'vw_dentist_h2_letter_spacing' );

	if ( $h2_color ){
		$_h2_style .= sprintf( 'color: %s;',  $h2_color  );
	}
	if ( $h2_family ){
		$_h2_style .= sprintf( 'font-family: %s;', esc_attr( $h2_family ) );
	}
	if ( $h2_weight ){
		$_h2_style .= sprintf( 'font-weight: %s;', in_array( absint( $h2_weight ), $allowed_weights ) ? $h2_weight : 400 );
	}
	if ( $h2_style ){
		$_h2_style .= sprintf( 'font-style: %s;', in_array( $h2_style, $allowed_styles ) ? $h2_style : 'normal' );
	}
	if ( $h2_size ){
		$_h2_style .= sprintf( 'font-size: %spx;', absint( $h2_size ) );
	}
	if ( $h2_line_h ){
		$_h2_style .= sprintf( 'line-height: %spx;', absint( $h2_line_h ) );
	}
	if ( $h2_letter_s ){
		$_h2_style .= sprintf( 'letter-spacing: %spx;', absint( $h2_letter_s ) );
	}
	if ( $_h2_style ){
		$_h2_style = sprintf( 'body.ctypo h2 { %s }', $_h2_style );
	}

	/* === <h3> === */

	$h3_color = get_theme_mod( 'vw_dentist_h3_font_color' );
	$h3_family = get_theme_mod( 'vw_dentist_h3_font_family' );
	$h3_weight = get_theme_mod( 'vw_dentist_h3_font_weight' );
	$h3_style  = get_theme_mod( 'vw_dentist_h3_font_style' );
	$h3_size   = get_theme_mod( 'vw_dentist_h3_font_size' );
	$h3_line_h = get_theme_mod( 'vw_dentist_h3_line_height' );
	$h3_letter_s = get_theme_mod( 'vw_dentist_h3_letter_spacing' );

	if ( $h3_color ){
		$_h3_style .= sprintf( 'color: %s;',  $h3_color  );
	}
	if ( $h3_family ){
		$_h3_style .= sprintf( 'font-family: %s;', esc_attr( $h3_family ) );
	}
	if ( $h3_weight ){
		$_h3_style .= sprintf( 'font-weight: %s;', in_array( absint( $h3_weight ), $allowed_weights ) ? $h3_weight : 400 );
	}
	if ( $h3_style ){
		$_h3_style .= sprintf( 'font-style: %s;', in_array( $h3_style, $allowed_styles ) ? $h3_style : 'normal' );
	}
	if ( $h3_size ){
		$_h3_style .= sprintf( 'font-size: %spx;', absint( $h3_size ) );
	}
	if ( $h3_line_h ){
		$_h3_style .= sprintf( 'line-height: %spx;', absint( $h3_line_h ) );
	}
	if ( $h3_letter_s ){
		$_h3_style .= sprintf( 'letter-spacing: %spx;', absint( $h3_letter_s ) );
	}
	if ( $_h3_style ){
		$_h3_style = sprintf( 'body.ctypo h3 { %s }', $_h3_style );
	}

	/* === <h4> === */

	$h4_color = get_theme_mod( 'vw_dentist_h4_font_color' );
	$h4_family = get_theme_mod( 'vw_dentist_h4_font_family' );
	$h4_weight = get_theme_mod( 'vw_dentist_h4_font_weight' );
	$h4_style  = get_theme_mod( 'vw_dentist_h4_font_style' );
	$h4_size   = get_theme_mod( 'vw_dentist_h4_font_size' );
	$h4_line_h = get_theme_mod( 'vw_dentist_h4_line_height' );
	$h4_letter_s = get_theme_mod( 'vw_dentist_h4_letter_spacing' );

	if ( $h4_color ){
		$_h4_style .= sprintf( 'color: %s;',  $h4_color  );
	}
	if ( $h4_family ){
		$_h4_style .= sprintf( 'font-family: %s;', esc_attr( $h4_family ) );
	}
	if ( $h4_weight ){
		$_h4_style .= sprintf( 'font-weight: %s;', in_array( absint( $h4_weight ), $allowed_weights ) ? $h4_weight : 400 );
	}
	if ( $h4_style ){
		$_h4_style .= sprintf( 'font-style: %s;', in_array( $h4_style, $allowed_styles ) ? $h4_style : 'normal' );
	}
	if ( $h4_size ){
		$_h4_style .= sprintf( 'font-size: %spx;', absint( $h4_size ) );
	}
	if ( $h4_line_h ){
		$_h4_style .= sprintf( 'line-height: %spx;', absint( $h4_line_h ) );
	}
	if ( $h4_letter_s ){
		$_h4_style .= sprintf( 'letter-spacing: %spx;', absint( $h4_letter_s ) );
	}
	if ( $_h4_style ){
		$_h4_style = sprintf( 'body.ctypo h4 { %s }', $_h4_style );
	}

	/* === <h5> === */

	$h5_color = get_theme_mod( 'vw_dentist_h5_font_color' );
	$h5_family = get_theme_mod( 'vw_dentist_h5_font_family' );
	$h5_weight = get_theme_mod( 'vw_dentist_h5_font_weight' );
	$h5_style  = get_theme_mod( 'vw_dentist_h5_font_style' );
	$h5_size   = get_theme_mod( 'vw_dentist_h5_font_size' );
	$h5_line_h = get_theme_mod( 'vw_dentist_h5_line_height' );
	$h5_letter_s = get_theme_mod( 'vw_dentist_h5_letter_spacing' );

	if ( $h5_color ){
		$_h5_style .= sprintf( 'color: %s;',  $h5_color  );
	}
	if ( $h5_family ){
		$_h5_style .= sprintf( 'font-family: %s;', esc_attr( $h5_family ) );
	}
	if ( $h5_weight ){
		$_h5_style .= sprintf( 'font-weight: %s;', in_array( absint( $h5_weight ), $allowed_weights ) ? $h5_weight : 400 );
	}
	if ( $h5_style ){
		$_h5_style .= sprintf( 'font-style: %s;', in_array( $h5_style, $allowed_styles ) ? $h5_style : 'normal' );
	}
	if ( $h5_size ){
		$_h5_style .= sprintf( 'font-size: %spx;', absint( $h5_size ) );
	}
	if ( $h5_line_h ){
		$_h5_style .= sprintf( 'line-height: %spx;', absint( $h5_line_h ) );
	}
	if ( $h5_letter_s ){
		$_h5_style .= sprintf( 'letter-spacing: %spx;', absint( $h5_letter_s ) );
	}
	if ( $_h5_style ){
		$_h5_style = sprintf( 'body.ctypo h5 { %s }', $_h5_style );
	}

	/* === <h6> === */

	$h6_color = get_theme_mod( 'vw_dentist_h6_font_color' );
	$h6_family = get_theme_mod( 'vw_dentist_h6_font_family' );
	$h6_weight = get_theme_mod( 'vw_dentist_h6_font_weight' );
	$h6_style  = get_theme_mod( 'vw_dentist_h6_font_style' );
	$h6_size   = get_theme_mod( 'vw_dentist_h6_font_size' );
	$h6_line_h = get_theme_mod( 'vw_dentist_h6_line_height' );
	$h6_letter_s = get_theme_mod( 'vw_dentist_h6_letter_spacing' );

	if ( $h6_color ){
		$_h6_style .= sprintf( 'color: %s;',  $h6_color  );
	}
	if ( $h6_family ){
		$_h6_style .= sprintf( 'font-family: %s;', esc_attr( $h6_family ) );
	}
	if ( $h6_weight ){
		$_h6_style .= sprintf( 'font-weight: %s;', in_array( absint( $h6_weight ), $allowed_weights ) ? $h6_weight : 400 );
	}
	if ( $h6_style ){
		$_h6_style .= sprintf( 'font-style: %s;', in_array( $h6_style, $allowed_styles ) ? $h6_style : 'normal' );
	}
	if ( $h6_size ){
		$_h6_style .= sprintf( 'font-size: %spx;', absint( $h6_size ) );
	}
	if ( $h6_line_h ){
		$_h6_style .= sprintf( 'line-height: %spx;', absint( $h6_line_h ) );
	}
	if ( $h6_letter_s ){
		$_h6_style .= sprintf( 'letter-spacing: %spx;', absint( $h6_letter_s ) );
	}
	if ( $_h6_style ){
		$_h6_style = sprintf( 'body.ctypo h6 { %s }', $_h6_style );
	}

	/* === Output === */

	// Join the styles.
	$style = join( '', array( $_p_style, $_a_style, $_h1_style, $_h2_style, $_h3_style, $_h4_style, $_h5_style, $_h6_style ) );

	// Output the styles.
	if ( $style ) {
		echo "\n" . '<style type="text/css" id="ctypo-css">' . esc_html( $style ) . '</style>' . "\n";

		// Body class filter.
		add_filter( 'body_class', 'vw_dentist_body_class' );
	}
}

/**
 * Add custom body class to give some more weight to our styles.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $classes
 * @return array
 */
function vw_dentist_body_class( $classes ) {
	return array_merge( $classes, array( 'ctypo' ) );
}