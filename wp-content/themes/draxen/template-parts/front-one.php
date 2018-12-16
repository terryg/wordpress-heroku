<div class="frontPageContainer">
	
	<div class="frontPageServices">
		
		<div class="frontPageWelcome">
		
			<?php
			
				$draxenWelcomePostTitle = '';
				$draxenWelcomePostDesc = '';

				if( '' != get_theme_mod('draxen_welcome_post') && 'select' != get_theme_mod('draxen_welcome_post') ){

					$draxenWelcomePostId = get_theme_mod('draxen_welcome_post');

					if( ctype_alnum($draxenWelcomePostId) ){

						$draxenWelcomePost = get_post( $draxenWelcomePostId );

						$draxenWelcomePostTitle = $draxenWelcomePost->post_title;
						$draxenWelcomePostDesc = $draxenWelcomePost->post_excerpt;
						$draxenWelcomePostContent = $draxenWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($draxenWelcomePostTitle); ?></h1>
			<div class="frontWelcomeContent">
				<p>
					<?php 
					
						if( '' != $draxenWelcomePostDesc ){
							
							echo esc_html($draxenWelcomePostDesc);
							
						}else{
							
							echo esc_html($draxenWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontWelcomeContent -->			
			
		</div><!-- .frontPageWelcome -->
		
		<div class="frontPageServiceItems">
			
			<?php

				$draxen_left_cat = '';

				if(get_theme_mod('draxen_services_cat')){
					$draxen_left_cat = get_theme_mod('draxen_services_cat');
					$draxen_left_cat_num = -1;
				}else{
					$draxen_left_cat = 0;
					$draxen_left_cat_num = 5;
				}		

				$draxen_left_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $draxen_left_cat_num,
				   'cat' => $draxen_left_cat
				);

				$draxen_left = new WP_Query($draxen_left_args);		

				if ( $draxen_left->have_posts() ) : while ( $draxen_left->have_posts() ) : $draxen_left->the_post();
   			?> 			
			<div class="frontPageServiceItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontitemimage.png" />';
						}						
				?>
				<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(draxenlimitedstring(get_the_content(), 50));
						}
					
					?>
				</p>				
				
			</div><!-- .frontPageServiceItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPageServiceItems -->
		
	</div><!-- .frontPageServices -->
	
	<div class="frontPagePortfolio">
		
		<h1><?php _e('Portfolio', 'draxen'); ?></h1>
		
		<div class="frontPagePortfolioItems">
			
			<?php

				$draxen_portfolio_cat = '';

				if(get_theme_mod('draxen_portfolio_cat')){
					$draxen_portfolio_cat = get_theme_mod('draxen_portfolio_cat');
					$draxen_portfolio_cat_num = -1;
				}else{
					$draxen_portfolio_cat = 0;
					$draxen_portfolio_cat_num = 5;
				}		

				$draxen_portfolio_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $draxen_portfolio_cat_num,
				   'cat' => $draxen_portfolio_cat
				);

				$draxen_portfolio = new WP_Query($draxen_portfolio_args);		

				if ( $draxen_portfolio->have_posts() ) : while ( $draxen_portfolio->have_posts() ) : $draxen_portfolio->the_post();
   			?>			
			<div class="frontPagePortfolioItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						}						
				?>
				<?php the_title( '<h3>', '</h3>' ); ?>				
				
			</div><!-- .frontPagePortfolioItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPagePortfolioItems -->
		
	</div><!-- .frontPagePortfolio -->
	
	<div class="frontPageNews">
		
			<h1><?php _e('News', 'draxen'); ?></h1>
			
			<?php

				$draxen_right_cat = '';

				if(get_theme_mod('draxen_news_cat')){
					$draxen_right_cat = get_theme_mod('draxen_news_cat');
				}else{
					$draxen_right_cat = 0;
				}		

				$draxen_right_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 4,
				   'cat' => $draxen_right_cat
				);

				$draxen_right = new WP_Query($draxen_right_args);		

				if ( $draxen_right->have_posts() ) : while ( $draxen_right->have_posts() ) : $draxen_right->the_post();
   			?> 			
			<div class="frontNewsItem">
				
				<?php the_title( '<h3>', '</h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(draxenlimitedstring(get_the_content(), 100));
						}
					
					?>				
				</p>
				<p class="readmore"><a href="<?php echo esc_url(get_the_permalink()); ?>">Read More</a></p>
				
			</div><!-- .frontNewsItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>			
		
	</div><!-- .frontPageNews -->	
	
</div><!-- .frontPageContainer -->	