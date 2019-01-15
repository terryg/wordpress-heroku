<?php
/**
 * Custom Search Form
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
global  $business_way_placeholder_option;
?>
<div class="search-block">
    <form action="<?php echo esc_url( home_url() )?>" class="searchform search-form" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            $business_way_placeholder_text     = '';
            $business_way_placeholder_option   = business_way_get_option( 'business_way_post_search_placeholder_option');
            if ( !empty( $business_way_placeholder_option) ):
                $business_way_placeholder_text = 'placeholder="'.esc_attr ( $business_way_placeholder_option ). '"';
            endif; ?>
            <input type="text" <?php echo $business_way_placeholder_text ;?> class="blog-search-field" id="menu-search" name="s" value="<?php echo get_search_query();?>">
            <button class="searchsubmit fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>