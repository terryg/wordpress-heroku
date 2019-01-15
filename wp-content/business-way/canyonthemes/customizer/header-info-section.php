<?php
/**
 * Business Way Header Info Section
 *
 */
$wp_customize->add_section(
    'business_way_top_header_info_section',
    array(
        'priority'   => 1,
        'capability' => 'edit_theme_options',
        'panel'      => 'business_way_theme_options',
        'title'      => esc_html__('Top Header Info', 'business-way'),
    )
);

        /*callback functions header section*/
        if ( !function_exists('business_way_top_header_active_callback') ) :
            function business_way_top_header_active_callback(){
                $top_header = esc_html(business_way_get_option('business_way_top_header_section'));
                if( 'show' == $top_header ){
                    return true;
                }
                else{
                    return false;
                }
            }
        endif;


$wp_customize->add_setting(
    'business_way_top_header_section',
    array(
        'default'           => $default['business_way_top_header_section'],
        'sanitize_callback' => 'business_way_sanitize_select',
    )
);

$hide_show_top_header_option = business_way_slider_option();
$wp_customize->add_control(
    'business_way_top_header_section',
    array(
        'type'               => 'radio',
        'label'              => esc_html__('Top Header Info Option', 'business-way'),
        'description'        => esc_html__('Show/hide Option for Top Header Info Section.', 'business-way'),
        'section'            => 'business_way_top_header_info_section',
        'choices'            => $hide_show_top_header_option,
        'priority'           => 5
    )
);

/**
 * Field for Fonsome Icon
 *
 */
$wp_customize->add_setting(
    'business_way_email_icon',
    array(
        'default'           => $default['business_way_email_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'business_way_email_icon',
    array(
        'type'        => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'business-way'),
        'section'     => 'business_way_top_header_info_section',
        'priority'    => 8,
        'active_callback'=> 'business_way_top_header_active_callback'
    )
);

/**
 * Field for Top Header Email Address
 *
 */
$wp_customize->add_setting(
    'business_way_top_header_email',
    array(
        'default'           => $default['business_way_top_header_email'],
        'sanitize_callback' => 'sanitize_email',
    )
);
$wp_customize->add_control(
    'business_way_top_header_email',
    array(
        'type'      => 'email',
        'label'     => esc_html__('Email Address', 'business-way'),
        'section'   => 'business_way_top_header_info_section',
        'priority'  => 8,
        'active_callback'=> 'business_way_top_header_active_callback'
    )
);


/**
 *   Show/Hide Social Link
 */
$wp_customize->add_setting(
    'business_way_social_link_hide_option',
    array(
        'default'           => $default['business_way_social_link_hide_option'],
        'sanitize_callback' => 'business_way_sanitize_checkbox',
    )
);
$wp_customize->add_control('business_way_social_link_hide_option',
    array(
        'label'     => esc_html__('Show Social Menu', 'business-way'),
        'section'   => 'business_way_top_header_info_section',
        'type'      => 'checkbox',
        'priority'  => 10,
        'active_callback'=> 'business_way_top_header_active_callback'
    )
);

/**
 *   Text for login register
 */
$wp_customize->add_setting(
    'business_way_login_register_text',
    array(
        'default'           => $default['business_way_login_register_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('business_way_login_register_text',
    array(
        'label'     => esc_html__('Login Register Text', 'business-way'),
        'description'=> esc_html__('Leave this field empty if you want to remove it.', 'business-way'),
        'section'   => 'business_way_top_header_info_section',
        'type'      => 'text',
        'priority'  => 10,
        'active_callback'=> 'business_way_top_header_active_callback'
    )
);

/**
 *   Link for the login register button
 */
$wp_customize->add_setting(
    'business_way_login_register_link',
    array(
        'default'           => $default['business_way_login_register_link'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('business_way_login_register_link',
    array(
        'label'     => esc_html__('Link for Register Button', 'business-way'),
        'description'=> esc_html__('Add your custom link if you want to add different link than WooCommerce Login Register Page. Otherwise, Default link will enabled.', 'business-way'),
        'section'   => 'business_way_top_header_info_section',
        'type'      => 'url',
        'priority'  => 10,
        'active_callback'=> 'business_way_top_header_active_callback'
    )
);