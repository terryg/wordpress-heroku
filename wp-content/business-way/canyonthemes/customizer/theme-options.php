<?php
/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'business_way_theme_options',
    array(
        'priority'       => 100,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__('Theme Option', 'business-way'),
    )
);


/*----------------------------------------------------------------------------------------------*/
/**
 * Color Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_way_primary_color_option',
    array(
        'title'    => esc_html__('Color Options', 'business-way'),
        'panel'    => 'business_way_theme_options',
        'priority' => 9,
    )
);

$wp_customize->add_setting(
    'business_way_primary_color',
    array(
        'default'           => $default['business_way_primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'business_way_primary_color', array(
    'label'    => esc_html__('Primary Color', 'business-way'),
    'description'  => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'business-way'),
    'section'      => 'business_way_primary_color_option',
    'priority'     => 14,

)));

/*-------------------------------------------------------------------------------------------*/
/**
 * Hide Static page in Home page
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_way_front_page_option',
    array(
        'title'    => esc_html__('Front Page Options', 'business-way'),
        'panel'    => 'business_way_theme_options',
        'priority' => 3,
    )
);

/**
 *   Show/Hide Static page/Posts in Home page
 */
$wp_customize->add_setting(
    'business_way_front_page_hide_option',
    array(
        'default'           => $default['business_way_front_page_hide_option'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',
    )
);

$wp_customize->add_control('business_way_front_page_hide_option',
    array(
        'label'    => esc_html__('Hide Blog Posts or Static Page on Front Page', 'business-way'),
        'section'  => 'business_way_front_page_option',
        'type'     => 'checkbox',
        'priority' => 10
    )
);


/*-------------------------------------------------------------------------------------------*/
/**
 * Breadcrumb Options
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'business_way_breadcrumb_option',
    array(
        'title'    => esc_html__('Breadcrumb Options', 'business-way'),
        'panel'    => 'business_way_theme_options',
        'priority' => 2,
    )
);

/*-------------------------------------------------------------------------------------------*/
/**
 * Search Placeholder
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_way_search_option',
    array(
        'title'     => esc_html__('Search', 'business-way'),
        'panel'     => 'business_way_theme_options',
        'priority'  => 8,
    )
);

/**
 *Search Placeholder
 */
$wp_customize->add_setting(
    'business_way_post_search_placeholder_option',
    array(
        'default'           => $default['business_way_post_search_placeholder_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('business_way_post_search_placeholder_option',
    array(
        'label'    => esc_html__('Search Placeholder', 'business-way'),
        'section'  => 'business_way_search_option',
        'type'     => 'text',
        'priority' => 10
    )
);



/*-------------------------------------------------------------------------------------------*/
/**
 * Google Map APi
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_way_goolge_api_option',
    array(
        'title'     => esc_html__('Google Api Key', 'business-way'),
        'panel'     => 'business_way_theme_options',
        'priority'  => 8,
    )
);

/**
 *Google Api
 */
$wp_customize->add_setting(
    'business_way_api_key_option',
    array(
        'default'           => $default['business_way_api_key_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('business_way_api_key_option',
    array(
        'label'    => esc_html__('Google Map Api Key', 'business-way'),
        'section'  => 'business_way_goolge_api_option',
        'type'     => 'text',
        'priority' => 10
    )
);



/*-------------------------------------------------------------------------------------------*/
/**
 * Animation Options
 *
 * @since 1.0.4
 */
$wp_customize->add_section(
    'business_way_animation_option_section',
    array(
        'title'     => esc_html__('Disable Animation', 'business-way'),
        'panel'     => 'business_way_theme_options',
        'priority'  => 8,
    )
);

/**
 *Animation Options
*/
$wp_customize->add_setting(
    'business_way_animation_option',
    array(
        'default'           => $default['business_way_animation_option'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',

    )
);

$wp_customize->add_control('business_way_animation_option',
    array(
        'label'    => esc_html__('Animation Option', 'business-way'),
        'description'=> esc_html__('Checked to hide the animation on your site', 'business-way'),
        'section'  => 'business_way_animation_option_section',
        'type'     => 'checkbox',
        'priority' => 10
    )
);