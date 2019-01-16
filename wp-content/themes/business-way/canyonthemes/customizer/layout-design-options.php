<?php

/*-------------------------------------------------------------------------------------------*/
/**
 * Sidebar Option
 *
 */
$wp_customize->add_section(
    'business_way_default_sidebar_layout_option',
    array(
        'title'    => esc_html__('Default Sidebar Layout Option', 'business-way'),
        'panel'    => 'business_way_theme_options',
        'priority' => 5,
    )
);

/**
 * Sidebar Option
 */
$wp_customize->add_setting(
    'business_way_sidebar_layout_option',
    array(
        'default'           => $default['business_way_sidebar_layout_option'],
        'sanitize_callback' => 'business_way_sanitize_select',
    )
);


$layout = business_way_sidebar_layout();
$wp_customize->add_control('business_way_sidebar_layout_option',
    array(
        'label'       => esc_html__('Default Sidebar Layout', 'business-way'),
        'description' => esc_html__('Home/front page does not have sidebar. Inner pages like blog, archive single page/post Sidebar Layout. However single page/post sidebar can be overridden.', 'business-way'),
        'section'     => 'business_way_default_sidebar_layout_option',
        'type'        => 'select',
        'choices'     => $layout,
        'priority'    => 10
    )
);


/*-------------------------------------------------------------------------------------------*/

/**
 * Blog/Archive Layout Option
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_way_blog_archive_layout_option',
    array(
        'title'    => esc_html__('Blog/Archive Layout Option', 'business-way'),
        'panel'    => 'business_way_theme_options',
        'priority' => 6,
    )
);


/**
 * Blog Page Title
 */
$wp_customize->add_setting(
    'business_way_blog_title_option',
    array(
        'default'           => $default['business_way_blog_title_option'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('business_way_blog_title_option',
    array(
        'label'    => esc_html__('Blog Page Title', 'business-way'),
        'section'  => 'business_way_blog_archive_layout_option',
        'type'     => 'text',
        'priority' => 11
    )
);

/**
 * Blog/Archive excerpt option
 */
$wp_customize->add_setting(
    'business_way_blog_excerpt_option',
    array(
        'default'           => $default['business_way_blog_excerpt_option'],
        'sanitize_callback' => 'business_way_sanitize_select',
    )
);
$blogexcerpt = business_way_blog_excerpt();
$wp_customize->add_control('business_way_blog_excerpt_option',
    array(
        'choices'   => $blogexcerpt,
        'label'     => esc_html__('Show Description From', 'business-way'),
        'section'   => 'business_way_blog_archive_layout_option',
        'type'      => 'select',
        'priority'  => 8
    )
);

/**
 * Description Length In Words
 */
$wp_customize->add_setting(
    'business_way_description_length_option',
    array(
        'default'           => $default['business_way_description_length_option'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('business_way_description_length_option',
    array(
        'label'    => esc_html__('Description Length In Words', 'business-way'),
        'section'  => 'business_way_blog_archive_layout_option',
        'type'     => 'number',
        'priority' => 12
    )
);

/**
 * Exclude Categories In Blog/Archive Pages
 */
$wp_customize->add_setting(
    'business_way_exclude_cat_blog_archive_option',
    array(
        'default'           => $default['business_way_exclude_cat_blog_archive_option'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('business_way_exclude_cat_blog_archive_option',
    array(
        'label'        => esc_html__('Exclude Categories In Blog Page', 'business-way'),
        'description'  => esc_html__('Enter categories ids with comma separated eg: 2,7,14,47. For including all categories left blank', 'business-way'),
        'section'      => 'business_way_blog_archive_layout_option',
        'type'         => 'text',
        'priority'     => 13
    )
);

/**
 * Hide featured image
 */
$wp_customize->add_setting(
    'business_way_post_thumbnail_image',
    array(
        'default'           => $default['business_way_post_thumbnail_image'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',
    )
);
$wp_customize->add_control('business_way_post_thumbnail_image',
    array(
        'label'    => esc_html__('Hide Featured Image', 'business-way'),
        'section'  => 'business_way_blog_archive_layout_option',
        'type'     => 'checkbox',
        'priority' => 14
    )
);


/**
 * Hide Author in blog page
 */
$wp_customize->add_setting(
    'business_way_blog_page_author',
    array(
        'default'           => $default['business_way_blog_page_author'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',
    )
);
$wp_customize->add_control('business_way_blog_page_author',
    array(
        'label'    => esc_html__('Hide Author', 'business-way'),
        'section'  => 'business_way_blog_archive_layout_option',
        'type'     => 'checkbox',
        'priority' => 14
    )
);
/**
 * Hide Date in blog page
 */
$wp_customize->add_setting(
    'business_way_blog_page_date',
    array(
        'default'           => $default['business_way_blog_page_date'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',
    )
);
$wp_customize->add_control('business_way_blog_page_date',
    array(
        'label'    => esc_html__('Hide Date', 'business-way'),
        'section'  => 'business_way_blog_archive_layout_option',
        'type'     => 'checkbox',
        'priority' => 14
    )
);
/**
 * Hide comments in blog page
 */
$wp_customize->add_setting(
    'business_way_blog_page_comments',
    array(
        'default'           => $default['business_way_blog_page_comments'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',
    )
);
$wp_customize->add_control('business_way_blog_page_comments',
    array(
        'label'    => esc_html__('Hide comments', 'business-way'),
        'section'  => 'business_way_blog_archive_layout_option',
        'type'     => 'checkbox',
        'priority' => 14
    )
);


/**
 * Pagination Options
 */
$wp_customize->add_setting(
    'business_way_blog_pagination_types',
    array(
        'default'           => $default['business_way_blog_pagination_types'],
        'sanitize_callback' => 'business_way_sanitize_select',
    )
);
$pagination = business_way_blog_pagination();
$wp_customize->add_control('business_way_blog_pagination_types',
    array(
        'label'    => esc_html__('Pagination Options', 'business-way'),
        'section'  => 'business_way_blog_archive_layout_option',
        'type'     => 'select',
        'priority' => 14,
        'choices'  => $pagination,
    )
);

	