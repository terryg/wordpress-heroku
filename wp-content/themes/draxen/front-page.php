<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * Template Name: Business Layout
 *
 * @package draxen
 */

get_header();
?>

<?php if( 'page' == get_option( 'show_on_front' ) ): ?>

	<?php 
		
		if( 'one' == get_theme_mod( 'business_page_layout_type' ) ){
			get_template_part( 'template-parts/front-one' );
		}else{
			get_template_part( 'template-parts/front-two' );
		}

	?>

<?php else : ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main">
		
		

		<?php
		if ( have_posts() ) :

			echo '<div class="front-page-posts">';
			
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				?> 
				<div class="front-page-post">
				
					<div class="front-page-post-image">
					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						}						
					?>
					</div><!-- .front-page-post-image -->
					
					<a class="front-page-post-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
					
					<div class="front-page-post-description">
						<?php echo esc_html(the_excerpt()); ?>
					</div><!-- .front-page-post-description -->					
				
				</div><!-- .front-page-post -->
				<?php
				
			endwhile;

			echo '</div><!-- .front-page-posts -->';
			
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php endif; ?>

<?php
get_footer();
