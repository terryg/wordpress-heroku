	<?php if(has_header_image()): ?>
	<div class="header-container">
	
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	
	</div><!-- .header-container -->
	<?php endif; ?>