<?php
/**
 * Functions for get_theme_mod()
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */

if ( !function_exists( 'business_way_get_option' ) ) :
    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function business_way_get_option( $key = '' )
    {
        if (empty( $key ) ) {
            return;
        }
        $business_way_default_options = business_way_get_default_theme_options();
        $default      = (isset($business_way_default_options[$key])) ? $business_way_default_options[$key] : '';
        $theme_option = get_theme_mod($key, $default);
        return $theme_option;
    }
endif;

/**
 * Header Image Options for archive page
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'business_way_header_image' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function business_way_header_image(){ 
        $header_image = get_header_image();
        if( $header_image )
        {
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
        }
        else
        {
            $header_style = '';
        } ?>
        <div class="page-header text-center" <?php echo $header_style; ?>>
            <h3><?php the_archive_title(); ?></h3>
            <div class="breadcrumb-wrap">
                <?php do_action('business_way_breadcrumb_hook'); ?>
            </div>
        </div>
<?php  }
endif; 


/**
 * Main Blog Page Header Image and title Options 
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'business_way_blog_header_section' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function business_way_blog_header_section(){ 
        $blog_page_title    = business_way_get_option('business_way_blog_title_option');
        $header_image = get_header_image();
        if( $header_image )
        {
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
        }
        else
        {
            $header_style = '';
        }
    ?>
        <div class="page-header text-center" <?php echo $header_style; ?>>
            <h3><?php echo esc_html($blog_page_title );?></h3>
            <div class="breadcrumb-wrap"><?php do_action('business_way_breadcrumb_hook'); ?></div>
        </div>
<?php  }
endif; 


/**
 * Header Image Options for single pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'business_way_header_image_single_page' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function business_way_header_image_single_page(){ 
        $header_image = get_header_image();
        if( $header_image )
        {
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
        }
        else
        {
            $header_style = '';
        } ?>
        <div class="page-header text-center" <?php echo $header_style; ?>>
            <h3><?php the_title(); ?></h3>
            <div class="breadcrumb-wrap">
                <?php do_action('business_way_breadcrumb_hook'); ?>
            </div>
        </div>
<?php  }
endif; 


/**
 * WooCommerce header page image 
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'business_way_woocommerce_header_image' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function business_way_woocommerce_header_image(){ 
        $header_image = get_header_image();
        if( $header_image )
        {
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
        }
        else
        {
            $header_style = '';
        } ?>
        <div class="page-header text-center" <?php echo $header_style; ?>>
             <h3><?php woocommerce_page_title(); ?></h3>
            <div class="breadcrumb-wrap">
                <?php do_action('business_way_breadcrumb_hook'); ?>
            </div>
        </div>
<?php  }
endif;


/**
 * Options for siderbar on pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'business_way_sidebar_condition_single_page' ) ) :
    /**
     * Sidebar Options condition
     */
    function business_way_sidebar_condition_single_page(){ 
         $business_way_designlayout = get_post_meta(get_the_ID(), 'business_way_sidebar_layout', true  );
        if ($business_way_designlayout == 'no-sidebar') {
            echo "12";
            } else {
                echo "8";
            } ?> col-sm-<?php if ($business_way_designlayout == 'no-sidebar') {
                echo "12";
            } else {
                echo "8";
            } 
    }
endif; 

/**
 * Options for siderbar on pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'business_way_sidebar_conditions_below' ) ) :
    /**
     * Sidebar Options condition
     */
    function business_way_sidebar_conditions_below(){ 
    $business_way_designlayout = get_post_meta(get_the_ID(), 'business_way_sidebar_layout', true  );
    if ($business_way_designlayout != 'no-sidebar') { ?>
            <div class="col-sm-4">
                <?php get_sidebar(); ?>
            </div>
        <?php }
    }
endif; 



/**
 * Options for siderbar on pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'business_way_page_sidebar_conditions_below' ) ) :
    /**
     * Sidebar Options condition
     */
    function business_way_page_sidebar_conditions_below(){ 
                $business_way_designlayout = business_way_get_option('business_way_sidebar_layout_option');
                 $nosidebar = 0;
                 $sidebardesignlayout   = esc_attr(business_way_get_option('business_way_sidebar_layout_options' ));

                if (($business_way_designlayout == 'default-sidebar'))
                {
                    $nosidebar = 1;
                }
                elseif( $sidebardesignlayout != 'no-sidebar'){
                    $nosidebar = 1;
                }

                if (($nosidebar == 1))
                {
                    ?>
                    <div class="col-sm-4">
                        <?php get_sidebar(); ?>
                    </div>
    <?php } 
}
endif;

/**
 * Options for thumbnail on pages
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'business_way_post_thumbnail' ) ) :

    /**
     * Post thumbnail.
     *
     * @since 1.0.0
     */
    function business_way_post_thumbnail() { 
        $hide_show_feature_image = business_way_get_option( 'business_way_post_thumbnail_image' );
    ?>        
        <div class="blog-img" <?php if(!has_post_thumbnail() || $hide_show_feature_image== 0 ) { echo'no-image'; }?> >
                    <?php
                        if( has_post_thumbnail() && $hide_show_feature_image== 0 ) {
                        ?>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' ); ?></a>

                        <?php } ?>

        </div>
<?php   }
endif;

/**
 * Options for single thumbnail on pages
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'business_way_single_post_thumbnail' ) ) :

    /**
     * Post thumbnail.
     *
     * @since 1.0.0
     */
    function business_way_single_post_thumbnail() { 
        $hide_show_feature_image = business_way_get_option( 'business_way_show_feature_image_single_option' );
    ?>        
        <div class="blog-img" <?php if(!has_post_thumbnail() || $hide_show_feature_image== 0 ) { echo'no-image'; }?> >
                    <?php
                        if( has_post_thumbnail() && $hide_show_feature_image== 0 ) {
                        ?>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' ); ?></a>

                        <?php } ?>

        </div>
<?php   }
endif;

/**
 * Tag Section on content page
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'business_way_content_tags' ) ) :

    /**
     * Tags on Post content
     *
     * @since 1.0.0
     */
    function business_way_content_tags(){
    if(has_tag () ) { ?>
        <div class="tags">
            <div class="tag">
                <i class="fa fa-tag" aria-hidden="true"></i>
                <span>
                    <a href="#"><?php the_tags(); ?></a>
                </span>
            </div>
            <hr>
        </div>
    <?php } 
    }
endif;


/**
 * Excerpt Length
 *
 * @since 1.0.0
 */
if ( !function_exists('business_way_excerpt_length') ) :
    function business_way_excerpt_length( $length ) {
    if (is_admin()) {
            return $length;
    }
    $excerpt_length = absint(business_way_get_option('business_way_description_length_option'));
        return $excerpt_length;
    }
add_filter( 'excerpt_length', 'business_way_excerpt_length', 999 );
endif;


/**
 * Archive meta options.
 *
 * @since 1.0.0
 */
if ( !function_exists('business_way_page_top_meta') ) :
    function business_way_page_top_meta() { 
        $page_author = absint(business_way_get_option('business_way_blog_page_author'));
        $page_date = absint(business_way_get_option('business_way_blog_page_date'));
        $page_comments = absint(business_way_get_option('business_way_blog_page_comments'));
        ?>
<p>
    <?php if($page_author == 0 ){ esc_html__('By', 'business-way'); ?> 
        <?php the_author_link(); ?>
    <span>|</span>
    <?php } ?>  
    <?php if($page_date == 0 ){ echo get_the_date( 'M/ j/ Y' );?> <span>|</span><?php } ?> 
    <?php if($page_comments == 0 ){ ?>
        <i class="fa fa-comments-o"></i> 
        <?php echo get_comments_number(); 
     }
    ?>
</p> 
<?php }
endif; 


/**
 * Single Page Meta Options.
 *
 * @since 1.0.0
 */
if ( !function_exists('business_way_single_page_top_meta') ) :
    function business_way_single_page_top_meta() { 
        ?>
<p>
    <?php esc_html__('By', 'business-way'); ?> 
    <a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID')) ); ?> "><?php the_author(); ?></a> 
    <?php echo get_the_date( 'M/ j/ Y' );?> <span>|</span>
        <i class="fa fa-comments-o"></i> 
        <?php echo get_comments_number(); 
    ?>
</p> 
<?php }
endif;