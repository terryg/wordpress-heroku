<?php
/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_way_footer_section',
    array(
        'priority'        => 100,
        'capability'      => 'edit_theme_options',
        'panel'           => 'business_way_theme_options',
        'theme_supports'  => '',
        'title'           => esc_html__('Footer Option', 'business-way'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'business_way_copyright',
    array(
        'default'           => $default['business_way_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'business_way_copyright',
    array(
        'type'     => 'text',
        'label'    => esc_html__('Copyright', 'business-way'),
        'section'  => 'business_way_footer_section',
        'priority' => 8
    )
);

/*-------------------------------------------------------------------------------------------*/
/**
 * Go To Top Options
 *
 * @since 1.0.4
 */
$wp_customize->add_section(
    'business_way_go_to_top_option',
    array(
        'title'     => esc_html__('Go To Top Option', 'business-way'),
        'panel'     => 'business_way_theme_options',
        'priority'  => 8,
    )
);

/**
 *Go To Top Options setting
*/
$wp_customize->add_setting(
    'business_way_footer_go_to_top',
    array(
        'default'           => $default['business_way_footer_go_to_top'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',

    )
);

$wp_customize->add_control('business_way_footer_go_to_top',
    array(
        'label'    => esc_html__('Go To Top', 'business-way'),
        'section'  => 'business_way_footer_section',
        'type'     => 'checkbox',
        'priority' => 10
    )
);
