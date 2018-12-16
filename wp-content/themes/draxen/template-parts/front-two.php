<div class="frontTwoContainer">

	<div class="frontTwoWelcomeContainer">
		
			<?php
			
				$draxenWelcomePostTitle = '';
				$draxenWelcomePostDesc = '';

				if( '' != get_theme_mod('draxen_two_welcome_post') && 'select' != get_theme_mod('draxen_two_welcome_post') ){

					$draxenWelcomePostId = get_theme_mod('draxen_two_welcome_post');

					if( ctype_alnum($draxenWelcomePostId) ){

						$draxenWelcomePost = get_post( $draxenWelcomePostId );

						$draxenWelcomePostTitle = $draxenWelcomePost->post_title;
						$draxenWelcomePostDesc = $draxenWelcomePost->post_excerpt;
						$draxenWelcomePostContent = $draxenWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($draxenWelcomePostTitle); ?></h1>
			<div class="frontTwoWelcomeContent">
				<p>
					<?php 
					
						if( '' != $draxenWelcomePostDesc ){
							
							echo esc_html($draxenWelcomePostDesc);
							
						}else{
							
							echo esc_html($draxenWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontTwoWelcomeContent -->	
		
	</div><!-- .frontTwoWelcomeContainer -->
	
	<div class="frontPageTwoProductsContainer">
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				$draxenProductOneTitle = '';
				$draxenProductOneDesc = '';

				if( '' != get_theme_mod('draxen_two_product_post_one') && 'select' != get_theme_mod('draxen_two_product_post_one') ){

					$draxenProductOneId = get_theme_mod('draxen_two_product_post_one');

					if( ctype_alnum($draxenProductOneId) ){

						$draxenProductOne = get_post( $draxenProductOneId );

						$draxenProductOneTitle = $draxenProductOne->post_title;
						$draxenProductOneDesc = $draxenProductOne->post_excerpt;
						$draxenProductOneContent = draxenlimitedstring($draxenProductOne->post_content, 150);
						$draxenProductOneLink = get_permalink($draxenProductOneId);
						
						if( has_post_thumbnail( $draxenProductOneId ) ){
							
							$draxenProductOneImage = get_the_post_thumbnail( $draxenProductOneId, 'producttwo' );
							
						}else{
							
							$draxenProductOneImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}

					}

				}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($draxenProductOneImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($draxenProductOneLink); ?>"><?php echo esc_html($draxenProductOneTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $draxenProductOneDesc ){
							
							echo esc_html($draxenProductOneDesc);
							
						}else{
							
							echo esc_html($draxenProductOneContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			
		</div><!-- .frontPageTwoProductContainer -->
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				$draxenProductTwoTitle = '';
				$draxenProductTwoDesc = '';

				if( '' != get_theme_mod('draxen_two_product_post_two') && 'select' != get_theme_mod('draxen_two_product_post_two') ){

					$draxenProductTwoId = get_theme_mod('draxen_two_product_post_two');

					if( ctype_alnum($draxenProductTwoId) ){

						$draxenProductTwo = get_post( $draxenProductTwoId );

						$draxenProductTwoTitle = $draxenProductTwo->post_title;
						$draxenProductTwoDesc = $draxenProductTwo->post_excerpt;
						$draxenProductTwoContent = draxenlimitedstring($draxenProductTwo->post_content, 150);
						$draxenProductTwoLink = get_permalink($draxenProductTwoId);
						
						if( has_post_thumbnail( $draxenProductTwoId ) ){
							
							$draxenProductTwoImage = get_the_post_thumbnail( $draxenProductTwoId, 'producttwo' );
							
						}else{
							
							$draxenProductTwoImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}

					}

				}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($draxenProductTwoImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($draxenProductTwoLink); ?>"><?php echo esc_html($draxenProductTwoTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $draxenProductTwoDesc ){
							
							echo esc_html($draxenProductTwoDesc);
							
						}else{
							
							echo esc_html($draxenProductTwoContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			
		</div><!-- .frontPageTwoProductContainer -->
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				$draxenProductThreeTitle = '';
				$draxenProductThreeDesc = '';

				if( '' != get_theme_mod('draxen_two_product_post_three') && 'select' != get_theme_mod('draxen_two_product_post_three') ){

					$draxenProductThreeId = get_theme_mod('draxen_two_product_post_three');

					if( ctype_alnum($draxenProductThreeId) ){

						$draxenProductThree = get_post( $draxenProductThreeId );

						$draxenProductThreeTitle = $draxenProductThree->post_title;
						$draxenProductThreeDesc = $draxenProductThree->post_excerpt;
						$draxenProductThreeContent = draxenlimitedstring($draxenProductThree->post_content, 150);
						$draxenProductThreeLink = get_permalink($draxenProductThreeId);
						
						if( has_post_thumbnail( $draxenProductThreeId ) ){
							
							$draxenProductThreeImage = get_the_post_thumbnail_url( $draxenProductThreeId, 'producttwo' );
							//echo $draxenProductThreeImage;
							
						}else{
							
							$draxenProductThreeImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}

					}

				}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($draxenProductThreeImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($draxenProductThreeLink); ?>"><?php echo esc_html($draxenProductThreeTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $draxenProductThreeDesc ){
							
							echo esc_html($draxenProductThreeDesc);
							
						}else{
							
							echo esc_html($draxenProductThreeContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			
		</div><!-- .frontPageTwoProductContainer -->		
		
	</div><!-- .frontPageTwoProductsContainer -->
	
</div><!-- .frontPageTwoContainer -->