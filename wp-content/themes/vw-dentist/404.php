<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Dentist
 */

get_header(); ?>

<div id="content-vw">
	<div class="container">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','vw-dentist' ), esc_html__( 'Not Found', 'vw-dentist' ) ) ?></h1>	
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'vw-dentist' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-dentist' ); ?></p>
		<div class="error-btn">
    		<a class="view-more" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Return to the home page', 'vw-dentist' ); ?><i class="fa fa-angle-right"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php get_footer(); ?>