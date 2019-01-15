<?php
if (!class_exists( 'Business_Way_Welcome_Msg_Widget' ) ) {
    class Business_Way_Welcome_Msg_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults             = array(
                'page_id'         => 0,
                'character_limit' => 25,
                'sub_title'       => esc_html__('About Business Way', 'business-way'),
                'read_more'       => esc_html__('Read More', 'business-way')
            );

            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'business-way-welcome-msg-widget',
                esc_html__( 'Business Way Welcome Message', 'business-way' ),
                array( 'description' => esc_html__( 'Business Way Welcome Message', 'business-way' ) )
            );
        }

        public function widget( $args, $instance )
        {

            if ( !empty( $instance ) ) {
                $instance        = wp_parse_args( (array )$instance, $this->defaults() );
                $page_id         = absint($instance['page_id']);
                $limit_character = absint( $instance['character_limit'] );
                $sub_title = esc_html( $instance['sub_title'] );
                $read_more = esc_html( $instance['read_more'] );
                echo $args['before_widget'];
                if ( !empty( $page_id ) ) {
                    $business_way_page_args     = array(
                        'page_id'        => $page_id,
                        'posts_per_page' => 1,
                        'post_type'      => 'page',
                        'no_found_rows'  => true,
                        'post_status'    => 'publish'
                    );

                  $welcome_query = new WP_Query( $business_way_page_args );
                    if ($welcome_query->have_posts()):
                        while ($welcome_query->have_posts()):$welcome_query->the_post(); ?>
                            <section class="welcome">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-7">
                                            <div class="welcome-img">
                                                <?php echo get_the_post_thumbnail(get_the_ID(), 'large' ); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-md-5">
                                            <div class="welcome-content">
                                                <div class="title">
                                                    <h2><?php the_title(); ?></h2>
                                                </div>
                                                <p><?php echo esc_html( wp_trim_words(get_the_content(), $limit_character)); ?></p>
                                                <?php if(!empty($read_more)){ ?>
                                                <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary"><?php echo esc_html($read_more); ?>
                                                </a>
                                                <?php } ?>
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
        }

        public function update( $new_instance, $old_instance )
        {
            $instance                    = $old_instance;
            $instance['page_id']         = absint($new_instance['page_id']);
            $instance['character_limit'] = absint( $new_instance['character_limit'] );
            $instance['sub_title'] = sanitize_text_field( $new_instance['sub_title'] );
            $instance['read_more'] = sanitize_text_field( $new_instance['read_more'] );

            return $instance;
        }

        public function form( $instance )
        {
            $instance        = wp_parse_args((array )$instance, $this->defaults() );
            $page_id         = absint($instance['page_id']);
            $limit_character = absint( $instance['character_limit'] );
            $sub_title = esc_attr( $instance['sub_title'] );
            $read_more = esc_attr( $instance['read_more'] );

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('sub_title')); ?>"><?php esc_html_e('Subtitle', 'business-way'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('sub_title')); ?>" class="business-way-cons" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" value="<?php echo $sub_title ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('page_id')); ?>"><?php esc_html_e('Select Page', 'business-way'); ?></label><br/>

                <?php
                /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
                $args = array(
                    'selected'         => $page_id,
                    'name'             => esc_attr( $this->get_field_name('page_id') ),
                    'id'               => esc_attr( $this->get_field_id('page_id') ),
                    'class'            => 'widefat',
                    'show_option_none' => esc_html__( 'Select Page', 'business-way' ),
                );
                wp_dropdown_pages($args);
                ?>
            </p>
            <hr>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('character_limit')); ?>"><?php esc_html_e('Character Limit', 'business-way'); ?></label><br/>
                <input type="number" name="<?php echo esc_attr( $this->get_field_name('character_limit')); ?>" class="business-way-cons" id="<?php echo esc_attr($this->get_field_id('character_limit')); ?>" value="<?php echo $limit_character ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('read_more')); ?>"><?php esc_html_e('Read More', 'business-way'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('read_more')); ?>" class="business-way-cons" id="<?php echo esc_attr($this->get_field_id('read_more')); ?>" value="<?php echo $read_more ?>">
            </p>
            <?php
        }
    }

}

add_action( 'widgets_init', 'business_way_welcome_msg_widget' );

function business_way_welcome_msg_widget()
{
    register_widget( 'Business_Way_Welcome_Msg_Widget' );

}