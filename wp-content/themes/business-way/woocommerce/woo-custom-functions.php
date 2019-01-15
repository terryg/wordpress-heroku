<?php 
/**
 * Change number or products per row to 3
*/
if (!function_exists('business_way_loop_columns')) {
	function business_way_loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'business_way_loop_columns');