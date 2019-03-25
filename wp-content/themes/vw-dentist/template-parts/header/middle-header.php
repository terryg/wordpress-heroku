<?php
/**
 * The template part for header
 *
 * @package VW Dentist 
 * @subpackage vw_dentist
 * @since VW Dentist 1.0
 */
?>

<div class="logo">
  <?php if( has_custom_logo() ){ vw_dentist_the_custom_logo();
    }else{ ?>
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <?php $description = get_bloginfo( 'description', 'display' );
      if ( $description || is_customize_preview() ) : ?>
      <p class="site-description"><?php echo esc_html($description); ?></p>            
  <?php endif; } ?>
</div>