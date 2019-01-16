<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-md-12">
		<div class="blog-block">
			<?php the_title( sprintf( '<a href="%s" rel="bookmark"> <h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3></a>' ); ?>
			<p>By <a href="#"><?php the_author(); ?></a> <span>|</span> <?php echo get_the_date( 'M/ j/ Y' );?> <span>|</span> <i class="fa fa-comments-o"></i> <?php echo absint(get_comments_number($post->ID)); ?></p>
			<p class="blog-text"> <?php the_excerpt(); ?></p>
	    </div>
    </div>

</article><!-- #post-## -->


