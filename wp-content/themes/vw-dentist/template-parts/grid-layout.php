<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Dentist
 * @subpackage vw-dentist
 * @since VW Dentist 1.0
 */
?>

<div class="col-lg-4 col-md-4">
	<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box grid-option">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h3 class="section-title"><?php the_title();?></h3>
	        <div class="new-text">
	        	<p><?php the_excerpt();?></p>
	        </div>
	        <div class="content-bttn">
        		<a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'vw-dentist' ); ?><i class="fa fa-angle-right"></i></a>
      		</div>
	    </div>
	    <div class="clearfix"></div>
  	</div>
</div>