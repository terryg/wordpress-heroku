<?php
/**
 * Home page hooks
 * It inclides slider and files of home page. 
 * Check front-page.php file where hook loaded
 * @since Business Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( ! function_exists( 'business_way_home_page_section_hook' ) ):
      function business_way_home_page_section_hook() {
        
            get_template_part( 'canyonthemes/home-section/section', 'slider');
     }
   endif;
add_action( 'business_way_home_page_section', 'business_way_home_page_section_hook', 10 );


/**
 * Business Way Header Types
 * @since Business Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('business_way_header_types_hooks') ) :
  function business_way_header_types_hooks() { 
    get_template_part( 'template-parts/header/default', 'header' );
} 
endif;
add_action( 'business_way_header_types_home', 'business_way_header_types_hooks', 10 );


/**
 * Business Way Breadcrumb
 * @since Business Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('business_way_breadcrumb') ) :
  function business_way_breadcrumb() { 
		business_way_breadcrumb_trail();
} 
endif;
add_action( 'business_way_breadcrumb_hook', 'business_way_breadcrumb', 10 );


/**
 * define size of logo.
 */
if (!function_exists('business_way_custom_logo_setup')) :
    function business_way_custom_logo_setup()
    {
        add_theme_support('custom-logo', array(
            'height'      => 35,
            'width'       => 190,
            'flex-height' => true,
            'flex-width'  => true,
        ));
    }
add_action('after_setup_theme', 'business_way_custom_logo_setup');
endif;

/**
 * enqueue Script for admin dashboard.
 */

if (!function_exists('business_way_widgets_backend_enqueue')) :
    function business_way_widgets_backend_enqueue($hook)
    {
        
      if ('widgets.php' != $hook) {
            return;
        }

        wp_register_script('business-way-custom-widgets', get_template_directory_uri() . '/assets/js/widgets.js', array('jquery'), true);
        wp_enqueue_media();
        wp_enqueue_script('business-way-custom-widgets');

        wp_enqueue_style('business-way-pt-admin', get_template_directory_uri() . '/assets/css/pt-admin-css.css', array(), '2.0.0');  
    }

    add_action('admin_enqueue_scripts', 'business_way_widgets_backend_enqueue');
endif;

/**
 * enqueue Admins style for admin dashboard.
 */

if ( !function_exists( 'business_way_admin_css_enqueue' ) ) :
    
    function business_way_admin_css_enqueue($hook)
    
    {
        if ( 'post.php' != $hook ) {
            return;
        }
        wp_enqueue_style('business-way-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
        wp_enqueue_style('business-way-pt-admin', get_template_directory_uri() . '/assets/css/pt-admin-css.css', array(), '2.0.0');  

        wp_register_script('business-way-page-builder-widgets', get_template_directory_uri() . '/assets/js/page-builder-widgets.js', array('jquery'), true);
        wp_enqueue_media();
        wp_enqueue_script('business-way-page-builder-widgets');

      
         }
    add_action('admin_enqueue_scripts', 'business_way_admin_css_enqueue');
endif;


/**
 * enqueue Admins style for admin dashboard.
 */
if ( !function_exists( 'business_way_admin_css_enqueue_new_post')) :
    
    function business_way_admin_css_enqueue_new_post( $hook )
    
    {
        if ( 'post-new.php' != $hook ) {
            return;
        }

        wp_enqueue_style('business-way-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');

        wp_enqueue_style('business-way-pt-admin', get_template_directory_uri() . '/assets/css/pt-admin-css.css', array(), '2.0.0');  


        wp_register_script('business-way-page-builder-widget', get_template_directory_uri() . '/assets/js/page-builder-widgets.js', array('jquery'), true);

        wp_enqueue_media();

        wp_enqueue_script('business-way-page-builder-widget');
    }
    add_action( 'admin_enqueue_scripts', 'business_way_admin_css_enqueue_new_post' );
endif;

/**
 * remove [..] from excerpt
 * =====================================
 */
if ( !function_exists( 'business_way_excerpt_more')) :
function business_way_excerpt_more( $more ) {
    if( !is_admin() ){
     return '';
    }
}
add_filter('excerpt_more', 'business_way_excerpt_more');
endif;
/**
 * Goto Top functions
 *
 * @since Business Way 1.0.0
 *
 */
if (!function_exists('business_way_go_to_top' )) :
    function business_way_go_to_top()
    {
         $business_way_to_top = business_way_get_option('business_way_footer_go_to_top');                
         if( $business_way_to_top == 1 )
         {
            ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'business-way'); ?>">
                    <i class="fa fa-angle-double-up"></i>
            </a>
        <?php
        }
    }
add_action('business_way_go_to_top_hook', 'business_way_go_to_top', 20 );
endif;

/**
 * Cart Icon In header
 *
 * @since Business Way 1.0.0
 *
 */
if ( !function_exists('business_way_woo_cart') ) :
    function business_way_woo_cart() {        
      
        if ( class_exists( 'WooCommerce' ) ) { ?>
            <div class="dropdown">
            <div class="cart-btn">
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="badge"><?php 
                     	echo WC()->cart->get_cart_contents_count(); ?>
	                </span>
                </a>
                    <ul class="dropdown-menu cart-list">                         
                        <?php if( !is_cart () ) { ?>
	                            <li>
	                                <?php the_widget( 'WC_Widget_Cart', '' ); ?>
	                            </li>
	                            <?php } ?>		                        
                    </ul>
                </div>
            </li>
        <?php } 
    }
add_action( 'business_way_woo_cart_hook', 'business_way_woo_cart' );
endif;

/**
 * Search Icons
 * =====================================
 */
if ( !function_exists('business_way_header_search_icon') ) :
    function business_way_header_search_icon() { 
       ?>
                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown"><span class="fa fa-search"></span></button>
                    <ul class="dropdown-menu pull-right search-panel">
                        <li class="panel-outer">
                            <div class="form-container">
                                    <div class="form-group">
                                        <?php get_search_form(); ?>
                                    </div>
                            </div>
                        </li>
                    </ul>
        <?php }
 
add_action( 'header_search_icon', 'business_way_header_search_icon' );
endif;

/**
 * Exclude category in blog page
 * @since Business Way 1.0.0
 * @param null
 * @return int
 */
if (!function_exists('business_way_exclude_category_in_blog_page')) :
    function business_way_exclude_category_in_blog_page($query)
    {
     if ($query->is_home && $query->is_main_query())
        {
            $catid = business_way_get_option('business_way_exclude_cat_blog_archive_option');
            $exclude_categories = $catid;
            if (!empty($exclude_categories))
            {
                $cats = explode(',', $exclude_categories);
                $cats = array_filter($cats, 'is_numeric');
                $string_exclude = '';
                echo $string_exclude;
                if (!empty($cats))
                {
                   $string_exclude = '-' . implode(',-', $cats);
                   $query->set('cat', $string_exclude);
                }
            }
        }
        return $query;
    }
endif;
add_filter('pre_get_posts', 'business_way_exclude_category_in_blog_page');


/**
 * Run ajax request.
*/
if ( ! function_exists('business_way_wp_pages_plucker') ) :
    /**
    * Sending pages with ids
    */
    function business_way_wp_pages_plucker()
    {
        $pages = get_pages(
            array (
                'parent'  => 0, // replaces 'depth' => 1,
            )
        );
        $ids = wp_list_pluck( $pages, 'post_title', 'ID' );
        return wp_send_json($ids);
    }
endif;
add_action( 'wp_ajax_business_way_wp_pages_plucker', 'business_way_wp_pages_plucker' );
add_action( 'wp_ajax_nopriv_business_way_wp_pages_plucker', 'business_way_wp_pages_plucker' );

/**
 * Post Navigation Function
 *
 * @since Business Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('business_way_posts_navigation')) :
    function business_way_posts_navigation()
    {
        $pagination_types = business_way_get_option( 'business_way_blog_pagination_types' );

        if ('default' == $pagination_types) {
            the_posts_navigation();
        }elseif('numeric' == $pagination_types){
            echo"<ul class='pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'business-way'),
                'next_text' => __('Next &raquo;', 'business-way'),
            ));
            echo"</ul>";
        }else{
            return false;
        }
    }
endif;
add_action('business_way_action_navigation', 'business_way_posts_navigation', 10);

/**
 * Recommended plugins
 *
 * @package Business Way
 */
if ( ! function_exists( 'business_way_recommended_plugins' ) ) :
    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function business_way_recommended_plugins() {
        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'business-way' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Contact Us', 'business-way' ),
                'slug'     => 'contact-form-7',
                'required' => false,
            ),

            array(
                'name'     => esc_html__( 'WooCommerce', 'business-way' ),
                'slug'     => 'woocommerce',
                'required' => false,
            ),

           
        );
        tgmpa( $plugins );
    }
endif;
add_action( 'tgmpa_register', 'business_way_recommended_plugins' );
