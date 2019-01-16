<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
?> 
<?php
    /**
     * Hook - business_way_doctype.
     *
     * @hooked business_way_doctype_action - 10
     */
    do_action( 'business_way_doctype' );
    ?>

    <head>

        <?php
    /**
     * Hook - business_way_head.
     *
     * @hooked business_way_head_action - 10
     */
    do_action( 'business_way_head' );
    ?>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    /**
     * Hook - business_way_title.
     *
     * @hooked business_way_title_action - 10
     */        
    do_action('business_way_title');

    
    /**
     * Hook - business_way_header_types.
     *
     * @hooked business_way_header_types_action - 10
     */  
    do_action('business_way_header_types_home');
    ?>