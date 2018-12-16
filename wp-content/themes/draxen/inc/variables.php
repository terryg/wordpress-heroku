<?php

$draxenPostsPagesArray = array(
	'select' => __('Select a post/page', 'draxen'),
);

$draxenPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$draxenPostsPagesQuery = new WP_Query( $draxenPostsPagesArgs );
	
if ( $draxenPostsPagesQuery->have_posts() ) :
							
	while ( $draxenPostsPagesQuery->have_posts() ) : $draxenPostsPagesQuery->the_post();
			
		$draxenPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$draxenPostsPagesTitle = get_the_title();
		}else{
				$draxenPostsPagesTitle = get_the_ID();
		}
		$draxenPostsPagesArray[$draxenPostsPagesId] = $draxenPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$draxenYesNo = array(
	'select' => __('Select', 'draxen'),
	'yes' => __('Yes', 'draxen'),
	'no' => __('No', 'draxen'),
);

$draxenSliderType = array(
	'select' => __('Select', 'draxen'),
	'header' => __('WP Custom Header', 'draxen'),
	'slider' => __('draxen Header', 'draxen'),
);

$draxenServiceLayouts = array(
	'select' => __('Select', 'draxen'),
	'one' => __('One', 'draxen'),
	'two' => __('Two', 'draxen'),
);

$draxenAvailableCats = array( 'select' => __('Select', 'draxen') );

$draxen_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $draxen_categories_raw as $category ){
	
	$draxenAvailableCats[$category->term_id] = $category->name;
	
}

$draxenBusinessLayoutType = array( 'select' => __('Select', 'draxen'), 'one' => __('One', 'draxen'), 'two' => __('Two', 'draxen') );
