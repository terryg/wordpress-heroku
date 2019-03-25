<?php
/**
 * The template part for header
 *
 * @package VW Dentist 
 * @subpackage vw_dentist
 * @since VW Dentist 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-dentist'); ?></a></div>
<div id="header" class="menubar">
	<div class="row m-0">
		<div class="col-lg-11 col-md-11">
			<div class="nav">
				<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
			</div>
		</div>
		<div class="col-lg-1 col-md-1">
		    <?php if( get_theme_mod( 'vw_dentist_header_search') != '') { ?>
				<div class="search-box">
			    	<span><i class="fas fa-search"></i></span>
			  	</div>
		    <?php }?>
		</div>
	</div>
	<div class="serach_outer">
	    <div class="closepop"><i class="far fa-window-close"></i></div>
	    <div class="serach_inner">
	    	<?php get_search_form(); ?>
	    </div>
	</div>
</div>