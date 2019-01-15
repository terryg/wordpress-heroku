<?php
if (!class_exists( 'Business_Way_Our_mission_Widget' )) {
    class Business_Way_Our_mission_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'page_id'           => '',
                'button-text'       => esc_html__('Learn More','business-way'),
                'button-text-link'  => '#',
                'background-image'  => '',
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'business-way-our-mission-widget',
                 esc_html__('Business Way Our Misson Page', 'business-way'),
                 array('description' => esc_html__(' Business Way Our Mission Page', 'business-way'))
            );
        }

        public function widget($args, $instance)
        {

            if ( !empty($instance ) ) {
                $instance     = wp_parse_args((array)$instance, $this->defaults());
                $page_id      = absint($instance['page_id']);
                $button_text  = esc_html($instance['button-text']);
                $button_url   = esc_url($instance['button-text-link']);
                $bgimage      = esc_url($instance['background-image']);
                echo $args['before_widget'];
                $business_way_page_args = array(
                    'page_id'        => $page_id,
                    'posts_per_page' => 1,
                    'post_type'      => 'page',
                    'no_found_rows'  => true,
                    'post_status'    => 'publish'
                );
                $mission_query = new WP_Query($business_way_page_args);
                if ($mission_query->have_posts()):
                    while ($mission_query->have_posts()):$mission_query->the_post();
                        if (has_post_thumbnail()) {
                            $image_id   = get_post_thumbnail_id();
                            $image_url  = wp_get_attachment_image_src($image_id, 'full', true);
                            $image_path = $image_url[0];
                        }

                        if (empty($image_path)) {
                            $value = 12;
                        }
                        else
                        {
                            $value = 12;
                        }
                        ?>

                        <section  class="mission" style="background: url(<?php echo $bgimage; ?>) no-repeat fixed;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-<?php echo $value; ?>">
                                        <div class="mission-content text-center">
                                            <h2><?php the_title(); ?></h2>
                                            <p><?php the_excerpt();?></p>
                                            <?php
                                                if (!empty( $button_text ) && !empty($button_url) ) {
                                                    ?>
                                                    <a href="<?php echo $button_url; ?>
                                                    " class="btn btn-default">
                                                      <?php echo $button_text; ?> </a>
                                                <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance                     = $old_instance;
            $instance['page_id']          = absint($new_instance['page_id']);
            $instance['button-text']      = sanitize_text_field($new_instance['button-text']);
            $instance['button-text-link'] = esc_url_raw($new_instance['button-text-link']);
            $instance['background-image'] = esc_url_raw($new_instance['background-image']);
            return $instance;
        }

        public function form($instance)
        {
            $instance    = wp_parse_args((array)$instance, $this->defaults());
            $page_id     = absint($instance['page_id']);
            $button_text = esc_html($instance['button-text']);
            $button_url  = esc_url($instance['button-text-link']);
            $bgimage     = esc_url($instance['background-image']);
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('page_id')); ?>">
                    <?php esc_html_e( 'Select Page', 'business-way' ); ?>
                </label><br/>
                <?php
                /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
                $args = array(
                    'selected'         => $page_id,
                    'name'             => $this->get_field_name( 'page_id' ),
                    'id'               => $this->get_field_id( 'page_id' ),
                    'class'            => 'widefat',
                    'show_option_none' => esc_attr__( 'Select Page', 'business-way' )
                );

                wp_dropdown_pages($args);
                ?>
            </p>
            <hr>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('button-text')); ?>">
                    <?php esc_html_e('Button Text', 'business-way'); ?>
                </label><br/>
                <input id="<?php echo esc_attr( $this->get_field_id( 'button-text' )); ?>" type="text" name="<?php echo esc_attr( $this->get_field_name( 'button-text' ) ); ?>" class="widefat" value="<?php echo $button_text; ?>">
            </p>
            <hr>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('button-text-link')); ?>"><?php esc_html_e('Button Link', 'business-way'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('button-text-link') ); ?>" class="widefat"  id="<?php echo esc_attr( $this->get_field_id('button-text-link')); ?>"  value="<?php echo $button_url; ?>">
            </p>
            <hr>

            <p>
                <label for="<?php echo $this->get_field_id('background-image'); ?>">
                    <?php _e( 'Select Background Image', 'business-way' ); ?>:
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $bgimage ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo esc_url( $bgimage ); ?>" alt="<?php esc_attr_e( 'Image preview', 'business-way' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('background-image'); ?>" id="<?php echo $this->get_field_id('background-image'); ?>" value="<?php echo esc_url( $bgimage ); ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'business-way' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Background Image','business-way'); ?>" data-button="<?php esc_attr_e( 'Select Background Image','business-way'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'business-way' ); ?>" class="button media-image-remove" />
            </p>
            <?php
        }
    }
}

add_action( 'widgets_init', 'business_way_our_mission_widget' );

function business_way_our_mission_widget()
{
    register_widget( 'Business_Way_Our_mission_Widget' );

}















