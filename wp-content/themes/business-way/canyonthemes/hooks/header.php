<?php
/**
 * Hooks to load header file 
 *
 * @link https://codex.wordpress.org/Plugin_API/Hooks
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
/* ------------------------------
* Doctype hook of the theme
* @since 1.0.0
* @package Business Way
------------------------------ */
if ( ! function_exists( 'business_way_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function business_way_doctype_action() {
    ?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
    <?php
    }
endif;
add_action( 'business_way_doctype', 'business_way_doctype_action', 10 );

/* ------------------------------
* head hook of the theme
* @since 1.0.0
* @package Business Way
------------------------------ */
if ( ! function_exists( 'business_way_head_action' ) ) :
    /**
     * Head declaration of the theme.
     *
     * @since 1.0.0
     */
    function business_way_head_action() {
    ?>
		<meta charset="<?php bloginfo('charset'); ?>">
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    }
endif;
add_action( 'business_way_head', 'business_way_head_action', 10 );

/* ------------------------------
* Header Image and title Section 
* @since 1.0.0
* @package Business Way
------------------------------ */
if ( ! function_exists( 'business_way_title_action' ) ) :
    /**
     * Title declaration of the theme.
     *
     * @since 1.0.0
     */
    function business_way_title_action() {
    ?>
		<a class="skip-link screen-reader-text"
        href="#content"><?php esc_html_e('Skip to content', 'business-way'); ?></a>
        <?php
	        // Custom image.
	        global $header_image, $header_style;
	        $header_image = get_header_image();
		        if( $header_image )
		        {
		            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
		        }
	        else
		        {
		            $header_style = '';
		        }
        ?>
    <?php
    }
endif;
add_action( 'business_way_title', 'business_way_title_action', 10 );

/* ------------------------------
* Top Header Section including menu and logo on top 
* @since 1.0.0
* @package Business Way
------------------------------ */
if ( ! function_exists( 'business_way_top_header_action' ) ) :
    /**
     * Top header section
     *
     * @since 1.0.0
     */
    function business_way_top_header_action() {
 		get_template_part('canyonthemes/home-section/section', 'top-header'); 
 }
endif;
add_action( 'business_way_top_header', 'business_way_top_header_action', 10 );

/* ------------------------------
* Logo Section 
* @since 1.0.0
* @package Business Way
------------------------------ */
if ( ! function_exists( 'business_way_main_logo_box_action' ) ) :

	/**
     * Logo Section
     *
     * @since 1.0.0
    */
    function business_way_main_logo_box_action() { ?>

	<div class="logo-box">
	<div class="logo">
	    <?php
	        if (has_custom_logo())
	            { ?>
	                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" alt="Images" />
	                    <?php the_custom_logo(); ?>
	                </a>
	                <?php } else

	                {
	                    if (is_front_page() && is_home()) : ?>
	                    <h1 class="site-title">
	                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
	                    </h1>
	                <?php else : ?>

	                    <p class="site-title">
	                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
	                    </p>

	                    <?php

	                endif;

	                $description = get_bloginfo('description', 'display');

	                if ($description || is_customize_preview()) : ?>
	                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
	                <?php
	            endif;
	        }
	        ?>
	</div>
	</div>
<?php  }
endif;
add_action( 'business_way_main_logo_box', 'business_way_main_logo_box_action', 10 );

/* ------------------------------
* Main Navigation 
* @since 1.0.0
* @package Business Way
------------------------------ */
if ( ! function_exists( 'business_way_main_navigation_hook' ) ) :

	/**
     * Main naviagtion declaration
     *
     * @since 1.0.0
    */
    function business_way_main_navigation_hook() { ?>

 <!-- Main Menu -->
    <nav class="main-menu">
        <div class="navbar-header">
            <!-- Toggle Button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse clearfix">
           <?php
                if (has_nav_menu('primary'))
                {
                     wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'depth'           => 4,
                            'container' => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-right'
                        )
                    );
                    }
            ?>
        </div>
    </nav><!-- Main Menu End-->
<?php  }
endif;
add_action( 'business_way_main_navigation', 'business_way_main_navigation_hook', 10 );