<?php
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
    'business_way_slider_section',
    array(
        'title'     => esc_html__('Slider Setting Option', 'business-way'),
        'panel'     => 'business_way_theme_options',
        'priority'  => 4,
    )
);
/**
 * Homepage Slider Section Show
 *
 */
$wp_customize->add_setting(
    'business_way_homepage_slider_option',
    array(
        'default'           => $default['business_way_homepage_slider_option'],
        'sanitize_callback' => 'business_way_sanitize_select',
    )
);
$hide_show_option = business_way_slider_option();
$wp_customize->add_control(
    'business_way_homepage_slider_option',
    array(
        'type'        => 'radio',
        'label'       => esc_html__('Slider Option', 'business-way'),
        'description' => esc_html__('Show/hide option for homepage Slider Section.', 'business-way'),
        'section'     => 'business_way_slider_section',
        'choices'     => $hide_show_option,
        'priority'    => 7
    )
);

/*callback functions slider section*/
if ( !function_exists('business_way_slider_active_callback') ) :
    function business_way_slider_active_callback(){
        $slider_options = esc_html(business_way_get_option('business_way_homepage_slider_option'));
        if( 'show' == $slider_options ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

//Condition to check third party slider available or not.
$third_slider = wp_kses_post(business_way_get_option('business_way_homepage_slider_thirdparty'));
if($third_slider == ''){
    /**
     * Homepage Slider Repeater Section
     *
     */
    $slider_pages = array();
    $slider_pages_obj = get_pages();
    $slider_pages[''] = esc_html__('Select Page For Slider','business-way');
    foreach ($slider_pages_obj as $page) {
        $slider_pages[$page->ID] = $page->post_title;
    }
    $wp_customize->add_setting( 
        'business_way_slider_option', 
        array(
        'sanitize_callback' => 'business_way_sanitize_slider_data',
        'default'           => $default['business_way_slider_option']
    ) );
    $wp_customize->add_control(
        new Business_Way_Repeater_Control(
            $wp_customize,
            'business_way_slider_option',
            array(
                'label'                      => __('Slider Page Selection Section','business-way'),
                'description'                => __('Select Page For Slider Having Featured Image. You can drag to reposition the slider items','business-way'),
                'section'                    => 'business_way_slider_section',
                'settings'                   => 'business_way_slider_option',
                'repeater_main_label'        => __('Select Page For Slider ','business-way'),
                'repeater_add_control_field' => __('Add New Slide','business-way'),
                'active_callback'            => 'business_way_slider_active_callback'

            ),
            array(
                'selectpage'                 => array(
                'type'                       => 'select',
                'label'                      => __( 'Select Page For Slide', 'business-way' ),
                'options'                    => $slider_pages
                ),
                'button_text'                => array(
                'type'                       => 'text',
                'label'                      => __( 'Button Text', 'business-way' ),
                ),
                'button_link'                => array(
                'type'                       => 'url',
                'label'                      => __( 'Button Link', 'business-way' ),
                ),
               
            )
        )
    );
    /**
     * Homepage Slider Previous and Next Options
     *
     */
    $wp_customize->add_setting(
        'business_way_homepage_slider_prev_next',
        array(
            'default'           => $default['business_way_homepage_slider_prev_next'],
            'sanitize_callback' => 'business_way_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'business_way_homepage_slider_prev_next',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Hide Prev and Next', 'business-way'),
            'description' => __('Hide Previous and Next From the slider. ','business-way'),
            'section'     => 'business_way_slider_section',
            'priority'    => 10,
            'active_callback'=> 'business_way_slider_active_callback'
        )
    );
    /**
     * Homepage Slider auto slide
     *
     */
    $wp_customize->add_setting(
        'business_way_homepage_slider_auto_slide',
        array(
            'default'           => $default['business_way_homepage_slider_auto_slide'],
            'sanitize_callback' => 'business_way_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'business_way_homepage_slider_auto_slide',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Disable auto Slide', 'business-way'),
            'description' => __('Disable auto slider slider. ','business-way'),
            'section'     => 'business_way_slider_section',
            'priority'    => 10,
            'active_callback'=> 'business_way_slider_active_callback'
        )
    );

    /**
     * Homepage Slider Remove Pagination
     *
     */
    $wp_customize->add_setting(
        'business_way_homepage_slider_pagination',
        array(
            'default'           => $default['business_way_homepage_slider_pagination'],
            'sanitize_callback' => 'business_way_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'business_way_homepage_slider_pagination',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Disable Slide Pagination', 'business-way'),
            'description' => __('Pagination on the slider section will be removed. ','business-way'),
            'section'     => 'business_way_slider_section',
            'priority'    => 10,
            'active_callback'=> 'business_way_slider_active_callback'
        )
    );
} 
//end of third party slider condition 
