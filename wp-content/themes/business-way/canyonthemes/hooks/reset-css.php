<?php

//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'business_way_reset_colors' ) ) :

    function business_way_reset_colors($data) {

         set_theme_mod('business_way_top_header_background_color','#ec5538');

         set_theme_mod('business_way_top_footer_background_color','#1A1E21');

         set_theme_mod('business_way_bottom_footer_background_color','#111315');

         set_theme_mod('business_way_primary_color','#ec5538');

         set_theme_mod('business_way_color_reset_option','do-not-reset');
    }

endif;
add_action( 'business_way_colors_reset','business_way_reset_colors', 10 );


