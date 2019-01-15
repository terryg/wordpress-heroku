<?php
/**
 * Business Way functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
if ( !function_exists( 'business_way_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function business_way_setup()
    {
        /*
         * Make theme available for translation.
        */
        load_theme_textdomain( 'business-way' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        //Add Excerpt field in page
        add_post_type_support( 'page', 'excerpt' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(

            'primary'     => esc_html__('Primary', 'business-way'),
            'social'      => esc_html__('Social Icons', 'business-way'),
        ));

        /*
        * Enable support for custom logo.
        *
        */
        add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 290,
            'flex-height' => true,
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('business_way_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
        //Add theme support for WooCommerce
        add_theme_support('woocommerce');

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'business_way_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_way_content_width()
{
    $GLOBALS['content_width'] = apply_filters('business_way_content_width', 640);
}
add_action('after_setup_theme', 'business_way_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_way_widgets_init()
{
    register_sidebar(array(
        'name'         => esc_html__('Sidebar', 'business-way'),
        'id'           => 'sidebar-1',
        'description'  => esc_html__('Add widgets here.', 'business-way'),
        'before_title' => '<h2 class="widget-title">',
        'after_title'  => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Home Page Widget Area', 'business-way'),
        'id'            => 'business-way-home-page',
        'description'   => esc_html__('Add widgets here to appear in Home Page. First Select Front Page and Blog Page From Appearance > Homepage Settings', 'business-way'),
        'before_widget' => '',
        'after_widget'  => '',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'business-way'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'business-way'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',

    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'business-way'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'business-way'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'business-way'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'business-way'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 4', 'business-way'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here.', 'business-way'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'business_way_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function business_way_scripts()
{
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.5.0');

    /*google font  */
    wp_enqueue_style('business-way-googleapis', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Source+Sans+Pro:300,400,600', array(), null);

     /* Animation CSS Enqueue */
    $animation_options = business_way_get_option('business_way_animation_option');
  
    if( $animation_options != 1){
        wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.5.0');
    }

    wp_enqueue_style('pe-icon-7-stroke', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '4.5.0');

    /* lightcase CSS */
    wp_enqueue_style('lightcase', get_template_directory_uri() . '/assets/css/lightcase.css', array(), '4.5.0');

    wp_enqueue_style('video', get_template_directory_uri() . '/assets/css/video-js.css', array(), '4.5.0');

    /*Bootstrap*/
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.5.1');


    //wp_enqueue_style('bootsnav', get_template_directory_uri() . '/assets/css/bootsnav.css', array(), '4.5.0');

    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '4.5.0');

  /* swiper.min CSS */
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), '4.5.0');

    wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '4.5.0');

    wp_enqueue_style('business-way-style', get_stylesheet_uri());

    wp_enqueue_style('business-way-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '4.5.0');

    wp_enqueue_style('masterslider', get_template_directory_uri() . '/assets/css/masterslider.main.css', array(), '4.5.0');

    wp_enqueue_style('ms-staff-style', get_template_directory_uri() . '/assets/css/ms-staff-style.css', array(), '4.5.0');

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true);

    
    wp_enqueue_script('lightcase', get_template_directory_uri() . '/assets/js/lightcase.js', array('jquery'), '20151215', true);

    wp_enqueue_script('gmaps', get_template_directory_uri() . '/assets/js/gmaps.js', array('jquery'), '20151215', true);

    wp_enqueue_script('business-way-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('video', get_template_directory_uri() . '/assets/js/video.js', array('jquery'), '20151215', true);

    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('jquery-nav', get_template_directory_uri() . '/assets/js/jquery.nav.js', array('jquery'), '20151215', true);

    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('masterslider', get_template_directory_uri() . '/assets/js/masterslider.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('masterslider-staff', get_template_directory_uri() . '/assets/js/masterslider.staff.carousel.js', array('jquery'), '20151215', true);

    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/parallax.js', array('jquery'), '20151215', true);

   wp_enqueue_script( 'business-way-google-api-key',"https://maps.google.com/maps/api/js?key=".business_way_get_option('business_way_api_key_option'), array('jquery'), '20151215', true );

   wp_enqueue_script('respond', get_template_directory_uri() . '/assets/js/respond.min.js', array('jquery'), '20151215', true);

   wp_enqueue_script('isotop', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('business-way-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '201512169', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'business_way_scripts');

/**
 * Load custom files load files php file
 */
require get_template_directory() . '/canyonthemes/core/load-files.php';