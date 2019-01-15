<?php
/**
 * Demo Data support.
 *
 * @package Business Way
 */

/*Disable PT branding.*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Demo Data files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */
function business_way_import_files() {
    return array(
        array(
            'import_file_name'             =>  esc_html__( 'Theme Demo Content', 'business-way' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'canyonthemes/dummy-data/dummy-data-files/business-way.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'canyonthemes/dummy-data/dummy-data-files/business-way.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'canyonthemes/dummy-data/dummy-data-files/business-way.dat',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'business_way_import_files' );

/**
 * Demo Data after import.
 *
 * @since 1.0.0
 */

function business_way_after_import_setup() {
    // Assign front page and posts page (blog page).
    $front_page_id = null;
    $blog_page_id  = null;

    $front_page = get_page_by_title( 'Home Page' );

    if ( $front_page ) {
        if ( is_array( $front_page ) ) {
            $first_page = array_shift( $front_page );
            $front_page_id = $first_page->ID;
        } else {
            $front_page_id = $front_page->ID;
        }
    }

    $blog_page = get_page_by_title( 'Blog Page' );

    if ( $blog_page ) {
        if ( is_array( $blog_page ) ) {
            $first_page = array_shift( $blog_page );
            $blog_page_id = $first_page->ID;
        } else {
            $blog_page_id = $blog_page->ID;
        }
    }
    

    if ( $front_page_id && $blog_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
        update_option( 'page_for_posts', $blog_page_id );
    }

    // Assign navigation menu locations.
    $menu_location_details = array(
        'primary'      => 'Primary',
        'social'       => 'social',

    );

    if ( ! empty( $menu_location_details ) ) {
        $navigation_settings = array();
        $current_navigation_menus = wp_get_nav_menus();

        if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
            foreach ( $current_navigation_menus as $menu ) {
                foreach ( $menu_location_details as $location => $menu_slug ) {
                    if ( $menu->slug === $menu_slug ) {
                        $navigation_settings[ $location ] = $menu->term_id;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations',$navigation_settings );
        
       }
    }
add_action( 'pt-ocdi/after_import', 'business_way_after_import_setup' );