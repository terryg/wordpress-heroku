<?php
if (!class_exists('Business_Way_Contact_Widget')) {
    class Business_Way_Contact_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults       = array(
                'title'               => esc_html__('Book Appointment','business-way'),
                'sub_title'           => esc_html__('Fill the below form to contact us','business-way'),
                'cf7_shortcode'       => wp_kses_post('','business-way'),
                'longitude'           => '',
                'latitude'            => '',
              
            );
            return $defaults;
        }

     public function __construct()
        {
            parent::__construct(
                'business-way-contact-widget',
                esc_html__( 'Business Way Contact Widget', 'business-way' ),
                array( 'description' => esc_html__( 'Business Way Contact Section', 'business-way' ) )
            );
        }

        public function widget( $args, $instance )
        {

            if ( !empty( $instance ) ) {
                $instance = wp_parse_args( (array ) $instance, $this->defaults() );
                $title        = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
                $subtitle     =  esc_html( $instance['sub_title'] );
                $cf7_shortcode     =  wp_kses_post( $instance['cf7_shortcode'] );
                $longitude         =  sanitize_text_field( $instance['longitude'] );
                $latitude          =  sanitize_text_field( $instance['latitude'] );
                echo $args['before_widget'];
                ?>
                <!-- Contact Start -->
        <div class="contact-section">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- map Start-->
                    <div id="map" class="ev-map-display">
                         <input type="hidden" id="lan" name="latitude" value="<?php echo  esc_html($longitude); ?>">
                    <input type="hidden" id="lng" name="longitude" value="<?php echo  esc_html($latitude); ?>">
                    </div>
                    <!-- map End-->
                    <div class="contact-form-area">
                        <div class="contact-form">
                            <?php if ( !empty ( $title ) ) { ?>
                              <h2><?php echo $args['before_title'] . $title . $args['after_title']; ?></h2>
                              <?php } ?>
                            <?php if ( !empty( $subtitle ) ) { ?>
                              <p><?php echo $subtitle; ?></p>
                              <?php } ?>
                            <form class="appoint wow fadeInUp">
                               <?php echo do_shortcode($cf7_shortcode); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
        <!-- Contact End -->

                <?php
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance              = $old_instance;
            $instance['title']     = ( isset( $new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
            $instance['sub_title'] = ( isset( $new_instance['sub_title'])) ? sanitize_text_field($new_instance['sub_title']) : '';
            $instance['cf7_shortcode'] = ( isset( $new_instance['cf7_shortcode'])) ? sanitize_text_field($new_instance['cf7_shortcode']) : '';
            $instance['longitude'] = ( isset( $new_instance['longitude'])) ? sanitize_text_field($new_instance['longitude']) : '';
            $instance['latitude'] = ( isset( $new_instance['latitude'])) ? sanitize_text_field($new_instance['latitude']) : '';
            return $instance;

        }

        public function form( $instance )
        {
            $instance  = wp_parse_args( (array ) $instance, $this->defaults() );
            $title      = esc_attr( $instance['title'] );
            $subtitle   = esc_attr( $instance['sub_title'] );
            $cf7_shortcode   = esc_attr( $instance['cf7_shortcode'] );
            $longitude   = esc_attr( $instance['longitude'] );
            $latitude   = esc_attr( $instance['latitude'] );
            
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

             <p>
              <label for="<?php echo esc_attr( $this->get_field_id('cf7_shortcode') ); ?>">
                <?php esc_html_e( 'Contact Form & Shortcode', 'business-way'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr($this->get_field_name('cf7_shortcode')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('cf7_shortcode')); ?>" value="<?php echo $cf7_shortcode; ?>">
            </p>
            <p>
              <label for="<?php echo esc_attr( $this->get_field_id('longitude') ); ?>">
                <?php esc_html_e( 'Longitude', 'business-way'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr($this->get_field_name('longitude')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('longitude')); ?>" value="<?php echo $longitude; ?>">
            </p>
            <p>
              <label for="<?php echo esc_attr( $this->get_field_id('latitude') ); ?>">
                <?php esc_html_e( 'Latitude', 'business-way'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr($this->get_field_name('latitude')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('latitude')); ?>" value="<?php echo $latitude; ?>">
            </p>
            
        </span>
            <?php
        }
    }
}

add_action('widgets_init', 'business_way_contact_widget');

function business_way_contact_widget()

{
    register_widget('Business_Way_Contact_Widget');

}
