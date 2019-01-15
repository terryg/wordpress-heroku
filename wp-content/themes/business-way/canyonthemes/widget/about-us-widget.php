<?php
/**
 * Class for adding Our About Section Widget
 *
 * @package Canyon Themes
 * @subpackage Business Way
 * @since 1.0.0
 */
if( !class_exists( 'Business_Way_About_Widget' ) ){

  class Business_Way_About_Widget extends WP_Widget

  {
    private function defaults()
    {
      /*defaults values for fields*/
      $defaults    = array(
        'title'               => esc_html__('Our About','business-way'),
        'sub_title'           => esc_html__('Check Our All About','business-way'),
        'features'            => ''
      );
      return $defaults;
    }

    public function __construct()

    {
      parent::__construct(
        /*Base ID of your widget*/
        'business_way_about_widget',
        /*Widget name will appear in UI*/
        esc_html__( 'Business Way About', 'business-way' ),
        /*Widget description*/
        array( 'description' => esc_html__( 'Business Way About Section', 'business-way' ) )
      );
    }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         *
         * @return void
         *
         */
        public function widget( $args, $instance )
        {
          if (!empty( $instance ) ) 
          {
            $instance = wp_parse_args( (array ) $instance, $this->defaults ());
            $title        = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
            $subtitle     =  esc_html( $instance['sub_title'] );
            $features = ( ! empty( $instance['features'] ) ) ? $instance['features'] : array();
            echo $args['before_widget'];
            ?>
            <!-- About Start -->
            <section  class="why-chose">
             <?php if (isset($features) && !empty($features['main'])) : ?>  

              <div class="container">
                <div class="sec-title text-center">
                  <?php if ( !empty ( $title ) ) { ?>
                  <h3><?php echo $args['before_title'] . $title . $args['after_title']; ?></h3>
                  <?php } ?>
                  <span class="double-border"></span>
                  <?php if ( !empty( $subtitle ) ) { ?>
                  <p><?php echo $subtitle; ?></p>
                  <?php } ?>
                </div>
                <div class="why-chose-area">
                  <div class="row">

                    <?php
                    $post_in = array();
                    if  (count($features) > 0 && is_array($features) )
                    {
                      $post_in[0] = $features['main'];                                         
                      foreach ( $features as $our_services )
                      {
                        if( isset( $our_services['page_ids'] ) && !empty( $our_services['page_ids'] ) )
                        {
                         $post_in[] = $our_services['page_ids'];
                       }
                     }
                   }
                   if( !empty( $post_in )) :
                    $services_page_args = array(
                      'post__in'         => $post_in,
                      'orderby'             => 'post__in',
                      'posts_per_page'      => count( $post_in ),
                      'post_type'           => 'page',
                      'no_found_rows'       => true,
                      'post_status'         => 'publish'
                    );
                    $services_query = new WP_Query( $services_page_args );

                    /*The Loop*/
                    if ( $services_query->have_posts() ):
                      $i = 1;
                      while ( $services_query->have_posts() ):$services_query->the_post();
                        $icon = get_post_meta( get_the_ID(), 'business_way_icon', true );
                        ?>

                        <div class="col-md-4 col-sm-4">
                          <div class="chose-block wow fadeInUp" data-wow-delay=".<?php echo esc_attr($i); ?>s">
                            <?php
                            if(!empty($icon))
                            {
                              ?>
                              <div class="claw-icon">
                                <i class="fa <?php echo esc_attr($icon); ?>"></i>
                              </div>
                              <?php } ?>
                              <div class="chose-text">
                                <a href="<?php the_permalink();?>"><h5><?php the_title(); ?></h5></a>
                                <p><?php the_excerpt(); ?></p>
                              </div>
                            </div>
                          </div>
                        <?php endwhile; endif; wp_reset_postdata(); endif; ?>
                      </div>
                    </div><!-- /.c-lawyer -->
                  </div><!-- /.container -->
                <?php endif; ?>
              </section>
              <!-- About End -->
              <?php
              echo $args['after_widget'];
            }
          }
        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         *
         * @return array
         *
         */
        public function update($new_instance, $old_instance)
        {
          $instance              = $old_instance;
          $instance['main']      = absint($new_instance['main']);
          $instance['title']     = ( isset( $new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
          $instance['sub_title'] = ( isset( $new_instance['sub_title'])) ? sanitize_text_field($new_instance['sub_title']) : '';
          if (isset($new_instance['features']))
          {
            foreach($new_instance['features'] as $feature)
            {
              $feature['page_ids'] = absint($feature['page_ids']);
            }
            $instance['features']  = $new_instance['features'];
          }
          return $instance;
        }

        public function form($instance)
        {
          $instance   = wp_parse_args( (array ) $instance, $this->defaults() );
          $title      = esc_attr( $instance['title'] );
          $subtitle   = esc_attr( $instance['sub_title'] );
          $features   = ( ! empty( $instance['features'] ) ) ? $instance['features'] : array(); 
          ?>
          <span class="pt-business-way-additional services">
            <p>
              <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Title', 'business-way'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" value="<?php echo $title; ?>">
            </p>
            <p>
              <label for="<?php echo esc_attr( $this->get_field_id('sub_title') ); ?>">
                <?php esc_html_e( 'Sub Title', 'business-way'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr($this->get_field_name('sub_title')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" value="<?php echo $subtitle; ?>">
            </p>
            <hr>
            <!--updated code-->
            <label><?php _e( 'Select Pages', 'business-way' ); ?>:</label>
            <br/>
            <small><?php _e( 'Add Page and Remove. Please do not forget to add Icon and Excerpt  on selected pages.', 'business-way' ); ?></small>
            <?php
            if  ( count( $features ) >=  1 && is_array( $features ) )
            {
              $selected = $features['main'];
            }
            else
            {
              $selected = "";
            }
            $repeater_id   = $this->get_field_id( 'features' ).'-main';
            $repeater_name = $this->get_field_name( 'features'). '[main]';
            $args = array(
              'selected'          => $selected,
              'name'              => $repeater_name,
              'id'                => $repeater_id,
              'class'             => 'widefat pt-select',
              'show_option_none'  => __( 'Select Page', 'business-way'),
                    'option_none_value' => 0 // string
                  );
            wp_dropdown_pages( $args );
            $counter = 0;
            if ( count( $features ) > 0 ) 
            {
              foreach( $features as $feature ) 
              {
                if ( isset( $feature['page_ids'] ) ) 
                  { ?>
                    <div class="pt-business-way-sec">
                      <?php
                      $repeater_id     = $this->get_field_id( 'features' ) .'-'. $counter.'-page_ids';
                      $repeater_name   = $this->get_field_name( 'features' ) . '['.$counter.'][page_ids]';
                      $args = array(
                        'selected'          => $feature['page_ids'],
                        'name'              => $repeater_name,
                        'id'                => $repeater_id,
                        'class'             => 'widefat pt-select',
                        'show_option_none'  => __( 'Select Page', 'business-way'),
                                    'option_none_value' => 0 // string
                                  );
                      wp_dropdown_pages( $args );
                      ?>
                      <a class="pt-business-way-remove delete"><?php esc_html_e('Remove Section','business-way') ?></a>
                    </div>
                    <?php
                    $counter++;
                  }
                }
              }
              ?>
            </span>
            <a class="pt-business-way-add button" data-id="business_way_about_widget" id="<?php echo $repeater_id; ?>"><?php _e('Add New Section', 'business-way'); ?></a> 
            <?php
          }
        }
      }
      add_action( 'widgets_init', 'business_way_about_widget' );
      function business_way_about_widget() {
        register_widget( 'Business_Way_About_Widget' );
      }