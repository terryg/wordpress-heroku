<?php
/**
 * Dynamic css
 *
 * @package Canyon Themes
 * @subpackage Business Way
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('business_way_dynamic_css') ):
    function business_way_dynamic_css(){
    
    $business_way_primary_color           = esc_attr( business_way_get_option('business_way_primary_color') );
    
    $custom_css                  = '';
    /*====================Dynamic Css =====================*/

    $custom_css .= ".section-0-background,
     .btn-primary,#test-slide .owl-nav [class*=owl-],.mission-content .btn-default,
     hr,.scroll-top,.portfolioFilter a:hover, .portfolioFilter a.current,
     header .dropdown-menu > li > a:hover,
     .dropdown-menu > .active > a, 
     .dropdown-menu > .active > a:focus, 
     .dropdown-menu > .active > a:hover,
     button, 
     .comment-reply-link, 
     input[type='button'], 
     input[type='reset'], 
     input[type='submit'],
     .section-1-box-icon-background,
     #quote-carousel a.carousel-control,
     header .navbar-toggle,
     .section-10-background,
     .footer-top .submit-bgcolor,
     .section1 .border::before,
     .section1 .border::after,
     .portfolioFilter a.current,
     #section-12 .filter-box .lower-box a i,
     .section-2-box-left .border.left::before,
     .section-2-box-left .border::after,
     .comments-area .submit,
     .inner-title,.woocommerce span.onsale,
     .woocommerce nav.woocommerce-pagination ul li a:focus,
     .woocommerce nav.woocommerce-pagination ul li a:hover,
     .woocommerce nav.woocommerce-pagination ul li span.current,
     .woocommerce a.button, .woocommerce #respond input#submit.alt, 
     .search-toggle,
     .comments-area .comment-body .reply a,
     .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
     .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, 
     .btn-primary:active:focus, .btn-primary:active:hover, 
     .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus,
     .open>.dropdown-toggle.btn-primary:hover,.call-to-action
      {
       background-color: " . $business_way_primary_color . ";
      }
    ";

    $custom_css .= "
    .section-4-box-icon-cont i,
    header .navbar-menu .navbar-nav > li > a:active,
    header .navbar-menu .navbar-nav>.open>a,
    header .navbar-menu .navbar-nav>.open>a:focus,
    header .navbar-menu .navbar-nav>.open>a:hover,
    .menu-top-container ul li a:hover,
    .section-14-box h3 a:hover,
    .section-14-box .date span, 
    .section-14-box .author-post a,
    .widget ul li a:hover,
    .footer-top ul li a:hover,
    .section-0-btn-cont .btn:hover,
    .footer-top .widget_recent_entries ul li:hover:before,
    .footer-top .widget_nav_menu ul li:hover:before,
    .footer-top .widget_archive ul li:hover:before,
    .navbar-default .navbar-nav > .active > a, 
    .comments-area .comment-body .comment-metadata time,
    .navbar-default .navbar-nav > .active > a:focus, 
    .navbar-default .navbar-nav > .active > a:hover, .widget li a:before,
    .thin-icon a, ul#menu-main-menu li.current-menu-item a, .site-title a
    {
        color: " . $business_way_primary_color . ";}
    ";

    $custom_css .= ".section-14-box .underline,
   .item blockquote img,
   .widget .widget-title,
   .btn-primary,
   .portfolioFilter a,
   .btn-primary:hover,
   button, 
   .comment-reply-link, 
   input[type='button'], 
   input[type='reset'], 
   input[type='submit'],
   .testimonials .content .avatar,
   #quote-carousel .carousel-control.left, 
   #quote-carousel .carousel-control.right,
   header .navbar-menu .navbar-right .dropdown-menu,
   .woocommerce nav.woocommerce-pagination ul li a:focus,
   .woocommerce nav.woocommerce-pagination ul li a:hover,
   .woocommerce nav.woocommerce-pagination ul li span.current
   .woocommerce a.button, .woocommerce #respond input#submit.alt, 
   .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
   .widget .search-block button
   {
       border-color: " . $business_way_primary_color . ";}
    ";

   $custom_css .= ".widget .search-block button,.top-header,.slider-content .btn-default,.contact-form,.news-date,.services
   {
       background: " . $business_way_primary_color . ";
    }
    ";
    
    
    $custom_css .= ".btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover,
    .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover,
    .open>.dropdown-toggle.btn-primary.focus, 
    .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover
   {
       border-color: " . $business_way_primary_color . ";
    }
    ";
    
    
    
    
    /*------------------------------------------------------------------------------------------------- */
    /*custom css*/
    wp_add_inline_style('business-way-style', $custom_css);
}
endif;
add_action('wp_enqueue_scripts', 'business_way_dynamic_css', 99);