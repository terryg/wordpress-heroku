<?php
if (!class_exists('Business_Way_Quote_Widget')) {
    class Business_Way_Quote_Widget extends WP_Widget
    {
        private function defaults(){
           $defaults = array(
            'title' => '',
            'button-text' => esc_html__('Quote','business-way'),
            'button-text-link' => '#',
           );
           return $defaults;
        }
        public function __construct()
        {
            parent::__construct(
                'business-way-quote-widget',
                esc_html__('Business Way Quote Widget', 'business-way'),
                array('description' => esc_html__('Business Way Quote Section', 'business-way'))
            );
        }

        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args( (array ) $instance, $this->defaults() );
                $title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '', $instance, $this->id_base);
                $button_text = esc_html( $instance['button-text'] );
                $button_text_link = esc_url( $instance['button-text-link'] );
                echo $args['before_widget'];
                ?>
                <section class="call-to-action">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="text"><?php echo $title; ?></div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <?php
                                if(!empty( $button_text_link) )
                                {
                                ?>
                                <a href="<?php echo $button_text_link; ?>" class="theme-btn btn-style-six">
                                    <?php echo $button_text; ?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>

                <?php
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance                     = $old_instance;
            $instance['title']            = sanitize_text_field($new_instance['title']);
            $instance['button-text']      = sanitize_text_field( $new_instance['button-text']);
            $instance['button-text-link'] = esc_url_raw( $new_instance['button-text-link']);
            return $instance;
        }

        public function form($instance)
        {
            $instance         = wp_parse_args( (array ) $instance, $this->defaults() );
            $title            = sanitize_text_field( $instance['title']  );
            $button_text      = sanitize_text_field( $instance['button-text'] );
            $button_text_link = esc_url( $instance['button-text-link'] );

            ?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'business-way'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?php echo $title?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'button-text' ) ); ?>"><?php esc_html_e('Button Text', 'business-way'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('button-text')); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('button-text')); ?>" value="<?php echo $button_text; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'button-text-link' ) ); ?>">
                    <?php esc_html_e('Button Link', 'business-way'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('button-text-link')); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('button-text-link')); ?>" value="<?php echo $button_text_link; ?>">
            </p>
            <?php
        }
    }
}
add_action('widgets_init', 'business_way_quote_widget');
function business_way_quote_widget()
{
    register_widget('Business_Way_Quote_Widget');

}















