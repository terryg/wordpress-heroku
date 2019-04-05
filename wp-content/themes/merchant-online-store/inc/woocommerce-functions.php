<?php

/*--------------------------------------------------------------
## WooCommerce Shop / Archive Page
--------------------------------------------------------------*/

  /**
   * woocommerce_before_shop_loop_item hook.
   *
   * @hooked woocommerce_template_loop_product_link_open - 10
   */

  /**
   * woocommerce_before_shop_loop_item_title hook.
   *
   * @hooked woocommerce_show_product_loop_sale_flash - 10
   * @hooked woocommerce_template_loop_product_thumbnail - 10
   */

  /**
   * woocommerce_shop_loop_item_title hook.
   *
   * @hooked woocommerce_template_loop_product_title - 10
   */

  /**
   * woocommerce_after_shop_loop_item_title hook.
   *
   * @hooked woocommerce_template_loop_rating - 5
   * @hooked woocommerce_template_loop_price - 10
   */

  /**
   * woocommerce_after_shop_loop_item hook.
   *
   * @hooked woocommerce_template_loop_product_link_close - 5
   * @hooked woocommerce_template_loop_add_to_cart - 10
   */

if ( ! function_exists( 'merchant_online_store_apply_shop_product_two' ) ) {
  function merchant_online_store_apply_shop_product_two(){
      remove_action( 'woocommerce_before_shop_loop_item',      'woocommerce_template_loop_product_link_open', 10 );
      remove_action( 'woocommerce_before_shop_loop',       'storefront_woocommerce_pagination',        30 );
      remove_action( 'woocommerce_after_shop_loop',        'woocommerce_catalog_ordering',             10 );
      remove_action( 'woocommerce_after_shop_loop',        'woocommerce_result_count',                 20 );
      remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );
      remove_action(  'woocommerce_shop_loop_item_title',      'woocommerce_template_loop_product_title',        10 );
      remove_action(  'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',           5 );
      remove_action(  'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',           10 );
      remove_action(  'woocommerce_after_shop_loop_item',       'woocommerce_template_loop_product_link_close',        5 );
      remove_action(  'woocommerce_after_shop_loop_item',       'woocommerce_template_loop_add_to_cart',        10 );
      add_action( 'woocommerce_before_shop_loop', 'merchant_results_bar_wrapper_before', 15 );
      add_action( 'woocommerce_before_shop_loop', 'merchant_results_bar_wrapper_after', 35 );
      add_action( 'woocommerce_before_shop_loop', 'merchant_catalog_order_wrapper_before', 9 );
      add_action( 'woocommerce_before_shop_loop', 'merchant_catalog_order_wrapper_after', 11 );
    	add_action( 	'woocommerce_before_shop_loop_item',      	'merchant_shop_product_container_two',    	1 );
    	add_action( 	'woocommerce_before_shop_loop_item_title',  'merchant_shop_product_image_two',      		5 );
      add_action(   'woocommerce_before_shop_loop_item_title',  'woocommerce_template_loop_product_link_open',          9 );
      add_action(   'woocommerce_before_shop_loop_item_title',  'woocommerce_template_loop_product_link_close',          11 );
      add_action(   'woocommerce_before_shop_loop_item_title',  'merchant_storefront_div_close',          12 );
    	add_action( 	'woocommerce_before_shop_loop_item_title',  'merchant_shop_product_info_two',    	15 );
  }
}

if ( ! function_exists( 'merchant_shop_product_container_two' ) ):
  function merchant_shop_product_container_two() {
?>
    <div class="shop-product shop-product-two" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-out-quad" data-aos-once="true">
    <?php
  }
endif;

if ( ! function_exists( 'merchant_shop_product_image_two' ) ):
  function merchant_shop_product_image_two() { ?>
    <div class="home-latest-product-image-two">
    <?php
  }
endif;

if ( ! function_exists( 'merchant_shop_product_info_two' ) ):

  function merchant_shop_product_info_two() { ?>
    <div class="shop-product-text-two">
      <h2 class="entry-title heading-two">
        <a href="<?php the_permalink();?>"><?php the_title();?></a>
      </h2>
      <div class="shop-price-info-two">
        <span class="shop-two-currency"><?php echo esc_attr(get_woocommerce_currency());?></span>
        <span class="shop-two-price"><?php woocommerce_template_single_price();?></span>
      </div>
    </div>
    <?php
  }
endif;


/*--------------------------------------------------------------
## Single Product Page
--------------------------------------------------------------*/

    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */

      /**
       * Hook: Woocommerce_single_product_summary.
       *
       * @hooked woocommerce_template_single_title - 5
       * @hooked woocommerce_template_single_rating - 10
       * @hooked woocommerce_template_single_price - 10
       * @hooked woocommerce_template_single_excerpt - 20
       * @hooked woocommerce_template_single_add_to_cart - 30
       * @hooked woocommerce_template_single_meta - 40
       * @hooked woocommerce_template_single_sharing - 50
       * @hooked WC_Structured_Data::generate_product_data() - 60
       */

    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */

if ( ! function_exists( 'merchant_online_store_apply_woo_single_new' ) ) {
  function merchant_online_store_apply_woo_single_new(){
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash',  10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating',    10 );
    remove_action( 'Woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',    20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );
    add_action( 'woocommerce_after_single_product_summary', 'merchant_storefront_get_woo_product_review',             12 );
    add_action( 'woocommerce_after_single_product_summary', 'merchant_storefront_column_twelve',             13 );
    add_action( 'woocommerce_after_single_product_summary', 'merchant_storefront_div_close',             22 );
    add_action( 'woocommerce_single_product_summary', 'merchant_woocommerce_single_product_category',    4 );
    add_action( 'woocommerce_before_single_product_summary', 'merchant_storefront_single_product_left',     5 );
    add_action( 'woocommerce_before_single_product_summary', 'merchant_storefront_div_close',           25 );
    add_action( 'woocommerce_before_single_product_summary', 'merchant_storefront_single_product_right',    30 );
    add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash',     32 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating',     15 );
    add_action( 'woocommerce_single_product_summary', 'merchant_storefront_div_close',              60 );
  }
}

if ( ! function_exists( 'merchant_storefront_single_product_left' ) ) {
  function merchant_storefront_single_product_left(){
    echo '<div class="boot-row">';
    echo '<div class="boot-col-sm-7 product__single--l1">';
  }
}

if ( ! function_exists( 'merchant_storefront_div_close' ) ) :
  function merchant_storefront_div_close() { ?>
    </div>
    <?php
  }
endif;

if ( ! function_exists( 'merchant_storefront_single_product_right' ) ) {
  function merchant_storefront_single_product_right(){
    echo '<div class="boot-col-sm-5 product__single--l1 product-single-info">';
  }
}

if ( ! function_exists( 'merchant_storefront_column_twelve' ) ) {
  function merchant_storefront_column_twelve(){
    echo '<div class="boot-col-sm-12">';
  }
}

/*--------------------------------------------------------------
## Single Product Tabs
--------------------------------------------------------------*/

if ( ! function_exists( 'merchant_online_store_data_tabs_open' ) ) {
  function merchant_online_store_data_tabs_open(){
    echo '<div class="boot-col-md-12 data-tabs--merchant">';
  }
}

if ( ! function_exists( 'merchant_online_store_close_div' ) ) {
  function merchant_online_store_close_div(){
    echo '</div>';
  }
}

if ( ! function_exists( 'merchant_online_store_remove_reviews_tab' ) ) {
  function merchant_online_store_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    return $tabs;
  }
}

if ( ! function_exists( 'merchant_storefront_get_woo_product_review' ) ) {
function merchant_storefront_get_woo_product_review(){
  global $product, $woocommerce_loop;
      $args = array (
        'post_type'       => 'product',
        'post_id'         => method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id,
        'number'          => 2,
        'no_found_rows'   => true,
        'status'          => 'approve'
      );

    $comments = get_comments($args); ?>

  <div id="comments" class="boot-col-md-12">
    <h2 class="woocommerce-Reviews-title boot-text-center">
      <?php
        if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
              esc_html_e( 'Reviews', 'merchant-online-store' );
        }
      ?>
    </h2>

    <div class="boot-row">

    <?php foreach($comments as $comment) :?>
       <div class="boot-col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-out-quad" data-aos-once="true">
        <div class="home-product-review">
            <span class="featured__review__rating">
              <a href="<?php the_permalink(); ?>#reviews">
              <?php

                if ( version_compare( WC_VERSION, '2.7', '<' ) ) {
                    // Older than 2.7
                    echo wp_kses_post($product->get_rating_html());
                } else {
                    // 2.7+
                    echo wp_kses_post(wc_get_rating_html( $product->get_average_rating() ));
                }
              ?>
              </a>
            </span>
            <?php echo wp_kses_post($comment->comment_content);?>
            <?php echo wp_kses_post(get_avatar( $comment, 60 )); ?>
            <h6 class="home-product-review-title"><?php echo esc_attr($comment->comment_author);?></h6>
        </div>
        </div>
    <?php endforeach; ?>
    </div>

  <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

    <div id="review_form_wrapper" class="merchant-review">
      <div id="review_form" class="merchant-review-form">
        <?php
          $commenter = wp_get_current_commenter();

          $comment_form = array(
            'title_reply'          => have_comments() ? __( 'Add a review', 'merchant-online-store' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'merchant-online-store' ), get_the_title() ),
            'title_reply_to'       => __( 'Leave a Reply to %s', 'merchant-online-store' ),
            'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
            'title_reply_after'    => '</span>',
            'comment_notes_after'  => '',
            'fields'               => array(
              'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'merchant-online-store' ) . ' <span class="required">*</span></label> ' .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>',
              'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'merchant-online-store' ) . ' <span class="required">*</span></label> ' .
                    '<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>',
            ),
            'label_submit'  => __( 'Submit', 'merchant-online-store' ),
            'logged_in_as'  => '',
            'comment_field' => '',
          );

          if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
            $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'merchant-online-store' ), esc_url( $account_page_url ) ) . '</p>';
          }

          if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
            $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'merchant-online-store' ) . '</label><select name="rating" id="rating" aria-required="true" required>
              <option value="">' . esc_html__( 'Rate&hellip;', 'merchant-online-store' ) . '</option>
              <option value="5">' . esc_html__( 'Perfect', 'merchant-online-store' ) . '</option>
              <option value="4">' . esc_html__( 'Good', 'merchant-online-store' ) . '</option>
              <option value="3">' . esc_html__( 'Average', 'merchant-online-store' ) . '</option>
              <option value="2">' . esc_html__( 'Not that bad', 'merchant-online-store' ) . '</option>
              <option value="1">' . esc_html__( 'Very poor', 'merchant-online-store' ) . '</option>
            </select></div>';
          }

          $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'merchant-online-store' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

          comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
        ?>
      </div>
    </div>

  <?php else : ?>

    <p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'merchant-online-store' ); ?></p>

  <?php endif; ?>
  </div>


    <?php
}
}


if ( ! function_exists( 'merchant_storefront_featured_woo_product_review' ) ) {
  function merchant_storefront_featured_woo_product_review(){
    global $product, $woocommerce_loop;
        $args = array (
          'post_type'       => 'product',
          'post_id'         => method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id,
          'number'          => 1,
          'no_found_rows'   => true,
          'status'          => 'approve'
        );

      $comments = get_comments($args); ?>

      <?php foreach($comments as $comment) :?>
         <div class="featured-review-indi">


              <span class="featured__review__rating">
                <a href="<?php the_permalink(); ?>#reviews">
                <?php

                  if ( version_compare( WC_VERSION, '2.7', '<' ) ) {
                      // Older than 2.7
                      echo wp_kses_post($product->get_rating_html());
                  } else {
                      // 2.7+
                      echo wp_kses_post(wc_get_rating_html( $product->get_average_rating() ));
                  }
                ?>
                </a>
              </span>
              <?php echo wp_kses_post($comment->comment_content);?>

              <?php echo wp_kses_post(get_avatar( $comment, 60 )); ?>
              <h6 class="home-product-review-title"><?php echo esc_attr($comment->comment_author);?></h6>

          </div>
      <?php endforeach; ?>
      <?php
  }
}


/**
 * Modify the WoCommerce pagination $args array to use Previous / Next instead of arrows
 *
 * @param type $array
 * @return type
 */
if ( ! function_exists( 'merchant_online_store_filter_woocommerce_pagination_args' ) ) {
  function merchant_online_store_filter_woocommerce_pagination_args( $array ) {

      $array['prev_text'] = __( 'Previous', 'merchant-online-store' );
      $array['next_text'] = __( 'Next', 'merchant-online-store' );

      return $array;
  }
}



if ( ! function_exists( 'merchant_storefront_woocommerce_product_loop_category' ) ) {
        function merchant_storefront_woocommerce_product_loop_category() {

            $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

            if ( $product_cats && ! is_wp_error ( $product_cats ) ) {

                $single_cat = array_shift( $product_cats ); ?>

                <h4 class="product_category_title">
                    <?php echo esc_html( $single_cat->name ); ?>
                </h4>

            <?php

            }
        }
}

if ( ! function_exists( 'merchant_woocommerce_cart_link_fragment' ) ) :
  function merchant_woocommerce_cart_link_fragment() { ?>

    <div class="cart-section">
        <a href="<?php echo esc_url( wc_get_cart_url() );?>" class="cart-icon-link">
            <span class="cart-icon"><i class="fas fa-shopping-bag"></i>
            <span class="cart-amount"><?php echo absint( WC()->cart->get_cart_contents_count() );?></span>
        </a>
    </div>

    <?php
  }
endif;


if ( ! function_exists( 'merchant_woocommerce_single_product_category' ) ) {
    function merchant_woocommerce_single_product_category() { ?>

        <?php global $product; ?>
        <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in product-cat">', '</span>' ); ?>
    <?php

    }

}

if ( ! function_exists( 'merchant_results_bar_wrapper_before' ) ) {

    function merchant_results_bar_wrapper_before() { ?>
        <div class="results-bar-wrap">
    <?php }
}

if ( !function_exists( 'merchant_results_bar_wrapper_after' ) ) {
    function merchant_results_bar_wrapper_after() { ?>
        </div>
    <?php }

}


if ( !function_exists( 'merchant_catalog_order_wrapper_before' ) ) {
    function merchant_catalog_order_wrapper_before() { ?>
        <div class="catalog-order-wrap">
    <?php }
}

if ( !function_exists( 'merchant_catalog_order_wrapper_after' ) ) {
    function merchant_catalog_order_wrapper_after() { ?>
        </div>
    <?php }

}

if ( ! function_exists( 'sv_remove_product_page_skus' ) ) {
  function sv_remove_product_page_skus( $enabled ) {
      if ( ! is_admin() && is_product() ) {
          return false;
      }

      return $enabled;
  }
}