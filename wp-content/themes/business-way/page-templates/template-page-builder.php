<?php
/**
 * Template Name: Page Builder 
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
get_header();
?>
<div class="container">
	<?php

	while ( have_posts() ) : the_post();
	    the_content();

	endwhile; // End of the loop.
	?>
</div>
<?php
    get_footer();
?>