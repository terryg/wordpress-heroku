<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Dentist
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
	  <meta charset="<?php bloginfo( 'charset' ); ?>">
	  <meta name="viewport" content="width=device-width">
	  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-dentist' ) ); ?>">
	  <?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="home-page-header">			
			<div class="row m-0">
				<div class="col-lg-3 col-md-12">
					<?php get_template_part('template-parts/header/middle-header'); ?>
				</div>
				<div class="col-lg-9 col-md-12 p-0">
					<?php get_template_part('template-parts/header/top-header'); ?>
      				<?php get_template_part( 'template-parts/header/navigation' ); ?>
				</div>				
			</div>
		</div>