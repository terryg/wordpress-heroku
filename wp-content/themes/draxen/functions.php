<?php
/**
 * draxen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package draxen
 */

if ( ! function_exists( 'draxen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function draxen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on draxen, use a find and replace
		 * to change 'draxen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'draxen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'home-posts', 70, 70 );
		add_image_size( 'producttwo', 600, 400 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'draxen' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'draxen_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		add_post_type_support( 'page', 'excerpt' );
		
	}
endif;
add_action( 'after_setup_theme', 'draxen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function draxen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'draxen_content_width', 640 );
}
add_action( 'after_setup_theme', 'draxen_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function draxen_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'draxen' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'draxen' ),
		'before_widget' => '<section id="%1$s" class="widget widgetContainer %2$s"><div class="widgetContainerInner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left Widget Area', 'draxen' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'draxen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle Widget Area', 'draxen' ),
		'id'            => 'footer-middle',
		'description'   => esc_html__( 'Add widgets here.', 'draxen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right Widget Area', 'draxen' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'draxen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
}
add_action( 'widgets_init', 'draxen_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function draxen_scripts() {
	
	wp_enqueue_style( 'draxen-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700' );
	
	if( get_stylesheet_directory() != get_template_directory() ){
		wp_enqueue_style( 'draxen-parent', get_template_directory_uri() . '/style.css' );
	}
	
	wp_enqueue_style( 'draxen-style', get_stylesheet_uri() );

	wp_enqueue_script( 'draxen-general', get_template_directory_uri() . '/assets/js/general.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'draxen-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'draxen_scripts' );

function draxen_header_output(){
	

	
}
add_action( 'wp_head', 'draxen_header_output' );

require get_template_directory() . '/inc/variables.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function draxenlimitedstring($output, $max_char=100){
	
	$output = str_replace(']]>', ']]&gt;', $output);
    $output = strip_tags($output);
    $output = strip_shortcodes($output);

  	if ((strlen($output)>$max_char)){
        $output = substr($output, 0, $max_char);
		return $output;
   	}else{
      	return $output;
   	}
	
}

function draxen_upgrade(){
	
	wp_enqueue_style('draxen_upgrade', get_template_directory_uri().'/assets/css/upgrade.css' );
	
}

add_action('customize_controls_print_scripts', 'draxen_upgrade');