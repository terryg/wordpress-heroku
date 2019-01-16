<?php
/**
 * Business Way Single Page Options
 *
 */
$wp_customize->add_section(
    'business_way_single_page_options',
    array(
        'priority'   => 15,
        'capability' => 'edit_theme_options',
        'panel'      => 'business_way_theme_options',
        'title'      => esc_html__('Single Page Options', 'business-way'),
    )
);

/**
 * Select Featured Image
 *
 */
$wp_customize->add_setting(
    'business_way_show_feature_image_single_option',
    array(
        'default'           => $default['business_way_show_feature_image_single_option'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'business_way_show_feature_image_single_option',
    array(
        'type'               => 'checkbox',
        'label'              => esc_html__('Hide Featured Image', 'business-way'),
        'description'        => esc_html__('Checked to show the featured image on all single page and single posts.', 'business-way'),
        'section'            => 'business_way_single_page_options',
        'priority'           => 20
    )
);