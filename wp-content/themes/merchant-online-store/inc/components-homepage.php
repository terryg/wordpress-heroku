<?php

/*--------------------------------------------------------------
## Home Featured Products
--------------------------------------------------------------*/

if ( ! function_exists( 'merchant_online_store_woocommerce_featured_products' ) ) {
function merchant_online_store_woocommerce_featured_products(){

	$background_image 		= esc_url(get_theme_mod('home_product_featured_back_image'));
	$background_color 		= get_theme_mod('home_product_featured_back_color');
	$box_color 				= get_theme_mod('home_product_featured_box_color');
	$section_title 			= get_theme_mod('home_product_featured_section_title');
	$section_description 	= get_theme_mod('home_product_featured_section_desc');

		$meta_query  = WC()->query->get_meta_query();
		$tax_query   = WC()->query->get_tax_query();
		$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
		);

		$args = array(
			'post_type' 			=> 'product',
			'post_status' 			=> 'publish',
			'ignore_sticky_posts' 	=> 1,
			'orderby'  				=> 'date',
			'order'    				=> 'desc',
			'meta_query'          	=> $meta_query,
			'tax_query'           	=> $tax_query,
			'no_found_rows' => true,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
		);

		$loop = new WP_Query( $args );
?>

<section class="home-section-wrapper home-featured-products">

		<div class="boot-container canvas-home">
		<div class="front-section__title boot-text-center">
			<h2 class="section-title heading-one"><?php echo esc_attr($section_title);?></h2>
			<p class="section-description desc-center"><?php echo esc_attr($section_description);?></p>
		</div>
		<div class="featured-product-canvas">
		<div class="boot-row">
			<?php if ( $loop->have_posts() ):?>
					<div class="fearured-product__slider boot-col-md-12">
					<div class="single-item">
						<?php while ( $loop->have_posts() ) : $loop->the_post();?>
						<div>
							<div class="boot-row">
							<div class="boot-col-md-7 featured-slider-image">
								<?php the_post_thumbnail('merchant-zigzag');?>
							</div>
							<div class="boot-col-md-5 featured-slider-info">
								<span class="home-latest-currency"><?php echo esc_attr(get_woocommerce_currency());?></span>
								<span class="home-latest-price"><?php woocommerce_template_single_price();?></span>
								<h2 class="entry-title heading-two">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</h2>
								<?php woocommerce_template_single_excerpt();?>
								<?php merchant_storefront_featured_woo_product_review();?>
							</div>
							</div>
						</div>
				<?php endwhile;?>
			<?php endif;?>
				</div>
				</div>
			<?php wp_reset_postdata();?>
		</div>
		</div>
		</div>

<style type="text/css">
.home-featured-products{
	background-color:<?php echo esc_attr($background_color);?>;
	background-image: url(<?php echo esc_url($background_image);?>);
}

.home-featured-product-two,.featured-slider-info{background-color:<?php echo esc_attr($box_color);?>;}
</style>
</section>

<?php
}
}



/*--------------------------------------------------------------
## Home Latest Products
--------------------------------------------------------------*/
if ( ! function_exists( 'merchant_online_store_woocommerce_latest_products' ) ) {
function merchant_online_store_woocommerce_latest_products(){

	$section_description 	= get_theme_mod('home_product_latest_section_desc');
	$background_image 		= esc_url(get_theme_mod('home_product_latest_back_image'));
	$background_color 		= get_theme_mod('home_product_latest_back_color');
	$box_color 				= get_theme_mod('home_product_latest_box_color');
	$section_title 			= get_theme_mod('home_product_latest_section_title');
	$recent_layout 			= get_theme_mod('home_product_latest_layout');
	$no_product 			= absint(get_theme_mod('home_product_latest_product_per_section'));

?>

<section class="home-section-wrapper home-latest-products">
<div class="boot-container canvas-home">

<div class="boot-row">
<div class="boot-col-md-3">
<div class="front-section__title side-title">
	<h2 class="section-title heading-one"><?php echo esc_attr($section_title);?></h2>
	<p class="section-description"><?php echo esc_attr($section_description);?></p>
</div>
</div>
<div class="boot-col-md-9">
<div class="boot-row">
	<?php

		$args = array(
			'post_type' 				=> 'product',
			'post_status' 				=> 'publish',
			'ignore_sticky_posts' 		=> 1,
			'posts_per_page' 			=> $no_product,
			'orderby'  					=> 'date',
			'order'    					=> 'desc',
			'no_found_rows' 			=> true,
			'update_post_term_cache' 	=> false,
			'update_post_meta_cache' 	=> false,
		);

		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();?>

			<?php if( $recent_layout === 1):?>

				<div class="home-latest-product boot-col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-out-quad" data-aos-once="true">
				<div class="boot-row">
					<div class="boot-col-4 home-latest-product-image">
						<div class="home-latest-product-image-inner">
							<?php the_post_thumbnail('merchant-latest-tall');?>
						</div>
					</div>
					<div class="boot-col-8 home-latest-product-text">
						<div class="home-latest-price-info">
							<span class="home-latest-currency"><?php echo esc_attr(get_woocommerce_currency());?></span>
							<span class="home-latest-price"><?php woocommerce_template_single_price();?></span>
						</div>
						<h3 class="entry-title heading-three">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</h3>
					</div>
				</div>
				</div>

			<?php else:?>

				<div class="boot-col-md-4">
				<div class="home-latest-product-two" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-out-quad" data-aos-once="true">
					<div class="home-latest-product-image-two">
						<?php the_post_thumbnail('merchant-latest');?>
					</div>
					<div class="home-latest-product-text-two">
						<div class="home-latest-price-info">
							<span class="home-latest-currency"><?php echo esc_attr(get_woocommerce_currency());?></span>
							<span class="home-latest-price"><?php woocommerce_template_single_price();?></span>
						</div>
						<h3 class="entry-title heading-three">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</h3>
					</div>
				</div>
				</div>
			<?php endif;?>
		<?php
			endwhile;
		}
		wp_reset_postdata();?>
</div>
<style type="text/css">
.home-latest-products{
	background-color:<?php echo esc_attr($background_color);?>;
	background-image: url(<?php echo esc_url($background_image);?>);
}
.home-latest-product,
.home-latest-product-two{
	background-color:<?php echo esc_attr($box_color);?>;
}
</style>
</div>
</div>
</div>
</section>

<?php
}
}




/*--------------------------------------------------------------
## Home Product Category
--------------------------------------------------------------*/

if ( ! function_exists( 'merchant_online_store_product_categories' ) ) {
function merchant_online_store_product_categories(){
	$section_title 			= get_theme_mod('home_product_cat_section_title');
	$section_description 	= get_theme_mod('home_product_category_section_desc');
	$background_image 		= esc_url(get_theme_mod('home_product_cat_back_image'));
	$background_color 		= get_theme_mod('home_product_cat_back_color');
	$box_color 				= get_theme_mod('home_product_cat_box_color');
?>

<section class="home-section-wrapper home-product-categories">
<div class="boot-container canvas-home">


<div class="front-section__title boot-text-center">
	<h2 class="section-title heading-one"><?php echo esc_attr($section_title);?></h2>
	<p class="section-description desc-center"><?php echo esc_attr($section_description);?></p>
</div>
<div class="boot-row">


<?php
		$prod_categories = array(
				'taxonomy'		=> 'product_cat',
			    'orderby'		=> 'title',
			    'order' 		=> 'ASC',
			    'hide_empty' 	=> true,
				'fields'        => 'all',
				'pad_counts'    => false,
		);

	$prod_categories_query = new WP_Term_Query( $prod_categories );
	foreach( $prod_categories_query->terms as $prod_cat ) :
	    if ( $prod_cat->parent != 0 )
	        continue;
	    $cat_thumb_id 	= get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
	    $cat_thumb_url 	= wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
	    $term_link 		= get_term_link( $prod_cat, 'product_cat' );
	    ?>

			<div class="home-product-category boot-col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-out-quad" data-aos-once="true">
			<div class="home-product-category-inner">
			<a href="<?php echo esc_url($term_link);?>" class="home-cat-link">
				<div class="boot-row">
					<div class="boot-col-5 home-product-category-image">
						<img src="<?php echo esc_url($cat_thumb_url[0]); ?>" class="img-responsive" alt="<?php echo esc_attr($prod_cat->name); ?>"/>
					</div>
					<div class="boot-col-7 home-product-category-text">
						<h3 class="category-title heading-three"><?php echo esc_attr($prod_cat->name);?></h3>
					</div>
				</div>
			</a>
			</div>
			</div>

<?php endforeach;
wp_reset_query();?>

</div>
</div>
<style type="text/css">
	.home-product-category-inner{
		background-color:<?php echo esc_attr($box_color);?>;
	}

	.home-product-categories{
		background-color:<?php echo esc_attr($background_color);?>;
		background-image: url(<?php echo esc_url($background_image);?>);
	}
</style>
</section>

<?php
}
}

/*--------------------------------------------------------------
## Homepage Articles
--------------------------------------------------------------*/

if ( ! function_exists( 'merchant_online_store_homepage_articles' ) ) {
function merchant_online_store_homepage_articles(){
	$background_image 		= esc_url(get_theme_mod('home_articles_back_image'));
	$background_color 		= get_theme_mod('home_articles_back_color');
	$section_title 			= get_theme_mod('home_articles_section_title');
	$section_description 	= get_theme_mod('home_articles_section_desc');
	$no_article 			= absint(get_theme_mod('home_product_all_product_per_section'));
	$article_sort 			= absint(get_theme_mod('home_articles_sort'));

	$box_color 				= get_theme_mod('home_articles_box_color');
	$box_text_color			= get_theme_mod('home_articles_box_text_color');



	if ( $article_sort === 1 ){
		$args = array(
				'post_type' 				=> 'post',
				'post_status' 				=> 'publish',
				'posts_per_page' 			=> $no_article,
				'orderby' 					=> 'title',
				'order' 					=> 'ASC',
				'no_found_rows' 			=> true,
				'update_post_term_cache' 	=> false,
				'update_post_meta_cache' 	=> false,
		);
	}elseif( $article_sort === 2 ){
		$args = array(
				'post_type' 				=> 'post',
				'post_status' 				=> 'publish',
				'posts_per_page' 			=> $no_article,
				'orderby' 					=> 'title',
				'order' 					=> 'DESC',
				'no_found_rows' 			=> true,
				'update_post_term_cache' 	=> false,
				'update_post_meta_cache' 	=> false,
		);
	}elseif( $article_sort === 3 ){
		$args = array(
				'post_type' 				=> 'post',
				'post_status' 				=> 'publish',
				'posts_per_page' 			=> $no_article,
				'orderby' 					=> 'date',
				'order' 					=> 'DESC',
				'no_found_rows' 			=> true,
				'update_post_term_cache' 	=> false,
				'update_post_meta_cache' 	=> false,
		);
	}elseif( $article_sort === 4 ){
		$args = array(
				'post_type' 				=> 'post',
				'post_status' 				=> 'publish',
				'posts_per_page' 			=> $no_article,
				'orderby' 					=> 'date',
				'order' 					=> 'ASC',
				'no_found_rows' 			=> true,
				'update_post_term_cache' 	=> false,
				'update_post_meta_cache' 	=> false,
		);
	}else{
		$args = array(
				'post_type' 				=> 'post',
				'post_status' 				=> 'publish',
				'posts_per_page' 			=> $no_article,
				'orderby' 					=> 'comment_count',
				'order' 					=> 'DESC',
		);
	}

	$loop = new WP_Query( $args );
?>

<section class="home-section-wrapper home-articles">
<div class="boot-container canvas-home">

<div class="front-section__title boot-text-center">
	<h2 class="section-title heading-one"><?php echo esc_attr($section_title);?></h2>
	<p class="section-description desc-center"><?php echo esc_attr($section_description);?></p>
</div>

<div class="boot-row">
	<?php


		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<article class="boot-col-md-12 golden-home-post" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-out-quad" data-aos-once="true">
			<div class="boot-row">

				<div class="boot-col-md-7 layout-golden--one__left">
					<?php the_post_thumbnail('merchant-article');?>
			    </div>

			    <div class="boot-col-md-5 layout-golden--one__right">
				    <div class="blog__post__right slider-tilt">
					    <header class="entry-header">
					    	<h3 class="entry-title heading-two">
					    		<a href="<?php the_permalink();?>"><?php the_title();?></a>
					    	</h3>
						</header>
					    <div class="blog__post__excerpt">
					       <?php the_excerpt();?>
					    </div>
				    </div>
			    </div>
			</div>
			</article>

			<?php endwhile;
		}

		wp_reset_postdata();
	?>
</div>
</div>
<style type="text/css">
.home-articles{
	background-color:<?php echo esc_attr($background_color);?>;
	background-image: url(<?php echo esc_url($background_image);?>);
}
.home-article-two-text,
.layout-golden--one__right{
	background-color:<?php echo esc_attr($box_color);?>;
	color:<?php echo esc_attr($box_text_color);?>;
}
</style>
</section>

<?php

}
}


/*--------------------------------------------------------------
## Merchant Storefront Hero Image
--------------------------------------------------------------*/

if ( ! function_exists( 'merchant_online_store_homepage_hero_image' ) ) {
function merchant_online_store_homepage_hero_image() {

	$slider_type 		= absint(get_theme_mod( 'bellini_front_slider_type' ));
	$slider_image 		= esc_url(get_theme_mod('bellini_static_slider_image'));
	$slider_title 		= wp_kses_post(get_theme_mod('bellini_static_slider_title'));
	$slider_content 	= wp_kses_post(get_theme_mod('bellini_static_slider_content'));
	$cta_text_one 		= esc_html(get_theme_mod('bellini_static_slider_button_text-1'));
	$cta_link_one 		= esc_url(get_theme_mod('bellini_static_slider_button_url-1'));

	$content_color 		= get_theme_mod('home_hero_image_content_color');
	$button_color 		= get_theme_mod('home_hero_image_button_color');
	$button_text_color 	= get_theme_mod('home_hero_image_button_text_color');

	if (absint($slider_type) === 1): ?>

	<section class="home-section-wrapper home-hero">
    <div class="boot-container canvas-home">
    <div class="slider-content">

    	<?php if(!empty( $slider_title )):?>
    		<h2 class="element-title heading-one slider-content__title animate-pop-in">
    			<?php echo do_shortcode(wp_kses_post($slider_title) );?>
    		</h2>
    	<?php endif;?>

    	<?php if(!empty( $slider_content )):?>
    		<p class="slider-content__text animate-pop-in">
				<?php echo do_shortcode(wp_kses_post($slider_content));?>
			</p>
	    <?php endif;?>

		<?php if(!empty( $cta_text_one ) || !empty( $cta_text_two )):?>
			<div class="front__slider__cta">

		<?php if(!empty( $cta_text_one )):?>
		    <a class="button slider__cta animate-pop-up" href="<?php echo esc_url($cta_link_one);?>">
				<?php echo esc_attr($cta_text_one);?>
			</a>
	    <?php endif;?>

		</div>
	    <?php endif;?>
	</div>
    </div>

<style type="text/css">
.home-hero{background-image: url(<?php echo esc_url($slider_image);?>);}
.button.slider__cta {background-color: <?php echo esc_attr($button_color);?>;color: <?php echo esc_attr($button_text_color);?>;}
.slider-content{color:<?php echo esc_attr($content_color);?>;}
</style>

</section>

<?php endif;

if ( absint($slider_type)  === 2 ) : ?>

	<section class="front__slider__static">
		<?php
			if (get_theme_mod('bellini_slider_third_party_field')){
				echo do_shortcode( wp_kses_post(get_theme_mod('bellini_slider_third_party_field')));
			}else{
				esc_html_e( 'No Slider Shortcode Found!', 'merchant-online-store' );
			}
		endif; ?>
	</section>
<?php

}
}


/*--------------------------------------------------------------
## Home Latest Products
--------------------------------------------------------------*/

if ( ! function_exists( 'merchant_online_store_woocommerce_products' ) ) {
function merchant_online_store_woocommerce_products(){

	$section_title 			= get_theme_mod('home_product_all_section_title');
	$section_description 	= get_theme_mod('home_product_all_section_desc');
	$background_image 		= esc_url(get_theme_mod('home_product_all_back_image'));
	$background_color 		= get_theme_mod('home_product_all_back_color');
	$box_color 				= get_theme_mod('home_product_all_box_color');
	$no_product 			= absint(get_theme_mod('home_product_all_product_per_section'));

		// Best Selling
		$args = array(
			'post_type' 			=> 'product',
			'post_status' 			=> 'publish',
			'ignore_sticky_posts' 	=> 1,
			'posts_per_page' 		=> $no_product,
			'no_found_rows' 		=> true,
		    'meta_key' 				=> 'total_sales',
		    'orderby' 				=> 'meta_value_num',
		    'order' 				=> 'DESC',
		);
?>

<section class="home-section-wrapper home-all-products">
<div class="boot-container canvas-home product-all-canvas">
<div class="front-section__title boot-text-center">
	<h2 class="section-title heading-one"><?php echo esc_attr($section_title);?></h2>
	<p class="section-description desc-center"><?php echo esc_attr($section_description);?></p>
</div>
<div class="boot-row">
	<?php

		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();?>

				<div class="boot-col-md-4" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-easing="ease-out-quad" data-aos-once="true">
				<div class="home-all-product">
					<div class="home-all-product-image">
						<?php the_post_thumbnail('merchant-latest');?>
					</div>
					<div class="home-all-product-info">

						<h3 class="entry-title heading-three">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</h3>

						<div class="home-all-price-info">
							<span class="home-latest-currency"><?php echo esc_attr(get_woocommerce_currency());?></span>
							<span class="home-latest-price"><?php woocommerce_template_single_price();?></span>
						</div>
					</div>
				</div>
				</div>
		<?php
			endwhile;
		}
		wp_reset_postdata();?>
</div>
<style type="text/css">
	.home-all-products{background-color:<?php echo esc_attr($background_color);?>;background-image: url(<?php echo esc_url($background_image);?>);}
	.home-all-product{background-color:<?php echo esc_attr($box_color);?>;}
</style>
</div>
</section>

<?php
}
}