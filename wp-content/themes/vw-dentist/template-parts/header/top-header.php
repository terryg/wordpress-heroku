<?php
/**
 * The template part for top header
 *
 * @package VW Dentist 
 * @subpackage vw_dentist
 * @since VW Dentist 1.0
 */
?>

<div id="topbar">
  <div class="row m-0">
    <div class="col-lg-8 col-md-8">
      <?php if( get_theme_mod( 'vw_dentist_header_call') != '') { ?>
        <span><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('vw_dentist_header_call',''));?></span>
      <?php }?>
      <?php if( get_theme_mod( 'vw_dentist_header_email') != '') { ?>
        <span><i class="fas fa-envelope"></i><?php echo esc_html(get_theme_mod('vw_dentist_header_email',''));?></span>
      <?php }?>
      <?php if( get_theme_mod( 'vw_dentist_header_address') != '') { ?>
        <span><i class="fas fa-hospital"></i><?php echo esc_html(get_theme_mod('vw_dentist_header_address',''));?></span>
      <?php }?>
    </div>
    <div class="col-lg-4 col-md-4">
      <?php dynamic_sidebar('social-links'); ?>
    </div>
  </div>
</div>