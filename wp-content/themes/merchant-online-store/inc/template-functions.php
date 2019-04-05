<?php

if ( ! function_exists( 'merchant_online_store_header_layout' ) ) {
  function merchant_online_store_header_layout() {

      /**
       * Functions hooked into storefront_header action
       *
       * @hooked storefront_header_container                 - 0
       * @hooked storefront_skip_links                       - 5
       * @hooked storefront_social_icons                     - 10
       * @hooked storefront_site_branding                    - 20
       * @hooked storefront_secondary_navigation             - 30
       * @hooked storefront_product_search                   - 40
       * @hooked storefront_header_container_close           - 41
       * @hooked storefront_primary_navigation_wrapper       - 42
       * @hooked storefront_primary_navigation               - 50
       * @hooked storefront_header_cart                      - 60
       * @hooked storefront_primary_navigation_wrapper_close - 68
       */
    remove_action( 'storefront_header', 'storefront_header_container', 0 );
    remove_action( 'storefront_header', 'storefront_skip_links', 5 );
    remove_action( 'storefront_header', 'storefront_social_icons', 10 );
    remove_action( 'storefront_header', 'storefront_site_branding', 20 );
    remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
    remove_action( 'storefront_header', 'storefront_product_search', 40 );
    remove_action( 'storefront_header', 'storefront_header_container_close', 41 );
    remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
    remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
    remove_action( 'storefront_header', 'storefront_header_cart', 60 );
    remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );
    add_action( 'storefront_header', 'merchant_storefront_header_centered', 60 );
  }
}

if ( ! function_exists( 'merchant_storefront_header_centered' ) ) {
function merchant_storefront_header_centered(){
  ?>
<div class="boot-container canvas-header">
  <div class="boot-row">
    <div class="boot-col-md-4 boot-col-12 centered-menu-primary">
      <?php storefront_primary_navigation();?>
    </div>
    <div class="boot-col-md-4 boot-col-12 centered-logo">
      <?php storefront_site_branding();?>
    </div>
    <div class="boot-col-md-4 boot-col-12 centered-cart">
        <?php
        if ( merchant_online_store_is_woocommerce_activated() ) {
          storefront_product_search();
        }
        ?>

      <?php
        if ( merchant_online_store_is_woocommerce_activated() ) {
          if ( is_user_logged_in() ):?>
            <div class="merchant-account-link">
              <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_html_e('My Account','merchant-online-store'); ?>">
                <i class="fas fa-user"></i>
              </a>
            </div>

         <?php
         else: ?>
            <div class="merchant-account-link">
              <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_html_e('Login / Register','merchant-online-store'); ?>">
                <i class="fas fa-user"></i>
              </a>
            </div>
         <?php endif;
       }
       ?>

        <?php
        if ( merchant_online_store_is_woocommerce_activated() ) {
          merchant_woocommerce_cart_link_fragment();
        }
        ?>
    </div>
    <div class="boot-col-md-12 boot-col-12 centered-menu-second">
      <?php storefront_secondary_navigation();?>
    </div>
  </div>
</div>

  <?php
}
}


if ( ! function_exists( 'merchant_online_store_customizer_head_styles' ) ) {
function merchant_online_store_customizer_head_styles() {
?>
<style type="text/css">
  body,button,input,select,textarea{font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_body_font_size', 'Abril Fatface')); ?> ;}
  h1,.heading-one{ font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_heading_one_size'));?>;}
  h2,.heading-two{ font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_heading_two_size')); ?> ;}
  h3,.heading-three{ font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_heading_three_size'));?>;}
  h4,.heading-four{ font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_heading_four_size'));?>;}
  h5,.heading-five{ font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_heading_five_size')); ?>;}
  h6,.heading-six{ font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_heading_six_size')); ?>;}

  ul.products li.product h2,
  .woocommerce-tabs .panel h2:first-of-type,
  .storefront-full-width-content .related.products>h2:first-child,
  .storefront-full-width-content .up-sells>h2:first-child{
    font-size:<?php echo sanitize_text_field(get_theme_mod('minimal_typography_heading_two_size')); ?>;
  }

</style>
<?php }
}

if ( ! function_exists( 'merchant_online_store_remove_default_home' ) ) {
  function merchant_online_store_remove_default_home(){
    remove_action( 'homepage', 'storefront_homepage_content',    10 );
    remove_action( 'homepage', 'storefront_product_categories',    20 );
    remove_action( 'homepage', 'storefront_recent_products',       30 );
    remove_action( 'homepage', 'storefront_featured_products',     40 );
    remove_action( 'homepage', 'storefront_popular_products',      50 );
    remove_action( 'homepage', 'storefront_on_sale_products',      60 );
    remove_action( 'homepage', 'storefront_best_selling_products', 70 );
  }
}

if ( ! function_exists( 'merchant_online_store_theme_setup' ) ){
    function merchant_online_store_theme_setup() {
      add_image_size( 'merchant-article', 600, 455, array( 'center', 'center' ) );
      add_image_size( 'merchant-zigzag', 700, 600, array( 'center', 'center' ) );
      add_image_size( 'merchant-latest', 250, 375, array( 'center', 'center' ) );
      add_image_size( 'merchant-latest-tall', 100, 150, array( 'center', 'center' ) );
    }
}



if ( ! function_exists( 'merchant_online_store_scripts' ) ){
    function merchant_online_store_scripts() {
      wp_enqueue_script('merchant-main-js', get_stylesheet_directory_uri() . '/inc/merchant-app.js', array('jquery'), '20180108', true );
      wp_enqueue_style( 'merchant-bootstrap', get_stylesheet_directory_uri(). '/inc/bootstrap.min.css' );
    }
}

if ( ! function_exists( 'merchant_online_store_body_classes' ) ) {
  function merchant_online_store_body_classes( $classes ) {
  if ( merchant_online_store_is_woocommerce_activated() ) {
          // Single Product Layout 1 Selected
          if ( absint(get_theme_mod('woocommerce_product_single_layout')) === 1 && is_product() ){
              $classes[] = 'woo-single--one';
          }

          // Single Product Layout 1 Selected
          if ( absint(get_theme_mod('woocommerce_product_single_layout')) === 2 && is_product() ){
              $classes[] = 'woo-single--two';
          }
  }

      return $classes;
  }
}



if ( ! function_exists( 'merchant_online_store_archive_column_classes' ) ) {
  function merchant_online_store_archive_column_classes( $classes ) {
    if ( merchant_online_store_is_woocommerce_activated() ) {
          // Woo Single Layout 1
          if ( absint(get_theme_mod('woocommerce_product_single_layout'))  === 1 && is_archive() && is_woocommerce() ){
              $classes[] = 'woo-pd--one';
          }

          // Woo Single Layout 1
          if ( absint(get_theme_mod('woocommerce_product_single_layout'))  === 1 && is_archive() && is_woocommerce() ){
                $classes[] = 'woo-pd--two';
          }
    }
    return $classes;
  }
}



if ( ! function_exists( 'merchant_online_store_defaults' ) ) {
  function merchant_online_store_defaults() {
        return apply_filters( 'deli_default_settings', $args = array(
            'home_product_featured_layout'                  => 1,
            'home_product_featured_box_color'               => '#ffffff',
            'home_product_featured_section_title'           => esc_html__( 'Staff picks of the week', 'merchant-online-store' ),
            'home_product_featured_section_desc'            => esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
            'home_product_featured_back_color'              => '#f0f8ff',
            'home_product_latest_layout'                    => 2,
            'home_product_latest_product_per_section'       => 3,
            'home_product_latest_section_title'             => esc_html__( 'Latest Release', 'merchant-online-store' ),
            'home_product_latest_section_desc'              => esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
            'home_product_all_product_per_section'          => 6,
            'home_product_all_section_title'                => esc_html__( 'Best Selling', 'merchant-online-store' ),
            'home_product_all_section_desc'                 => esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
            'home_product_cat_layout'                       => 2,
            'home_product_cat_section_title'                => esc_html__( 'Shop Collection', 'merchant-online-store' ),
            'home_product_category_section_desc'            => esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
            'home_product_cat_back_color'                   => '#efefef',
            'home_product_cat_box_color'                    => '#ffffff',
            'home_reviews_section_title'                    => esc_html__('Loved by Customers', 'merchant-online-store'),
            'home_reviews_section_desc'                     => esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
            'home_reviews_back_color'                       => '#FFF176',
            'home_articles_section_title'                   => esc_html__( 'Note from Editors', 'merchant-online-store' ),
            'home_articles_section_desc'                    => esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
            'home_articles_per_section'                     => 3,
            'home_articles_layout'                          => 1,
            'home_articles_box_color'                       => '#f0f8ff',
            'minimal_typography_heading_one_size'           => '50px',
            'minimal_typography_heading_two_size'           => '33px',
            'minimal_typography_heading_three_size'         => '22px',
            'minimal_typography_heading_four_size'          => '15px',
            'minimal_typography_heading_five_size'          => '15px',
            'minimal_typography_heading_six_size'           => '15px',
            'minimal_typography_body_font_size'             => '15px',
            'bellini_static_slider_title'                   => esc_html__('Beautifully Designed Pieces by Talented Designers', 'merchant-online-store'),
            'bellini_static_slider_content'                 => esc_html__( 'We really love converse, and these are the videos we really, really love. All of these videos have been hand picked by the real humans who work here. We hope you enjoy them!', 'merchant-online-store' ),
            'bellini_static_slider_image'                   => get_theme_file_uri( '/images/Merchant-Slider.jpg' ),
            'bellini_front_slider_type'                     => 1,
            'bellini_static_slider_button_text-1'           => esc_html__('Go to Shop', 'merchant-online-store'),
            'home_hero_image_content_color'                 => '#051a3c',
            'home_hero_image_button_color'                  => '#03A9F4',
            'home_hero_image_button_text_color'             => '#ffffff',
            'woocommerce_product_catalog_layout'            => 2,
            'woocommerce_product_single_layout'             => 2,
            'merchant_header_layout_type'                    => 2,
            'home_product_latest_box_color'                 => '#ffffff',
            'home_product_latest_back_color'                => '#ffffff',
            'home_product_all_back_color'                   => '#ffffff',
            'background_color'                              => 'ffffff',
            'storefront_header_background_color'            => '#ffffff',
            'storefront_heading_color'                      => '#2b2b2b',
            'storefront_footer_heading_color'               => '#333333',
            'storefront_footer_background_color'            => '#ffffff',
            'storefront_header_link_color'                  => '#333333',
            'storefront_header_text_color'                  => '#000000',
            'storefront_button_background_color'            => '#03A9F4',
            'storefront_button_text_color'                  => '#ffffff',
            'storefront_button_alt_background_color'        => '#b64902',
            'storefront_button_alt_text_color'              => '#ffffff',
            'storefront_footer_link_color'                  => '#333333',
            'storefront_text_color'                         => '#615d59',
            'storefront_footer_text_color'                  => '#333333',
            'storefront_accent_color'                       => '#03A9F4',
        ) );
    }
}


/**
 * Check if Bellini Hero Image is active
 */
if ( ! function_exists( 'is_active_slider_type_hero' ) ) {
 function is_active_slider_type_hero(){
     // Check for the slider plugin class
     if( absint(get_theme_mod('bellini_front_slider_type')) === 1 ){
         return true;
     } else {
         return false;
     }
 }
}

/**
 * Check if Bellini Hero Image is active
 */
if ( ! function_exists( 'is_active_slider_type_third_party' ) ) {
 function is_active_slider_type_third_party(){
     // Check for the slider plugin class
     if( absint(get_theme_mod('bellini_front_slider_type')) === 2 ){
         return true;
     } else {
         return false;
     }
 }
}


if ( ! function_exists( 'merchant_online_store_apply_footer_copyright' ) ) {
  function merchant_online_store_apply_footer_copyright(){
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer',  'merchant_custom_storefront_credit',20 );
  }
}

if ( ! function_exists( 'merchant_custom_storefront_credit' ) ) {
function merchant_custom_storefront_credit() {

    $new_footer_text = get_theme_mod( 'merchant_footer_text' );

    ?>
    <div class="site-info">
      <?php echo do_shortcode( $new_footer_text ); ?>
      <span class="footer_copyright_text"><?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?></span>
    </div><!-- .site-info -->
    <?php
}
}