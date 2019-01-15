<?php
if (!class_exists('Business_Way_Recent_Post_Widget')) {
    class Business_Way_Recent_Post_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults       = array(
                'cat_id'    => -1,
                'title'     => esc_html__('Recent Posts','business-way'),
                'sub_title' => esc_html__('Read Our Recent Updates','business-way'),
                'read_more' => esc_html__('Read More','business-way'),
            );

            return $defaults;
        }

     public function __construct()
        {
            parent::__construct(
                'business-way-recent-post-widget',
                esc_html__( 'Business Way Recent Post Widget', 'business-way' ),
                array( 'description' => esc_html__( 'Business Way Recent Post Section', 'business-way' ) )
            );
        }

        public function widget( $args, $instance )
        {

            if ( !empty( $instance ) ) {
                $instance = wp_parse_args( (array ) $instance, $this->defaults() );
                echo $args['before_widget'];
                $catid        = absint( $instance['cat_id'] );
                $title        = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
                $subtitle     =  esc_html( $instance['sub_title'] );
                $read_more    =  esc_html( $instance['read_more'] );

                ?>
                <!-- News Start -->
        <section class="news">
            <div class="container">
                <div class="sec-title text-center">
                     <?php
                        if ( !empty ( $title ) ) {
                            ?>
                            <h3><?php echo $args['before_title'] . $title . $args['after_title']; ?></h3>
                        <?php } ?>
                    <span class="double-border"></span>
                    <?php
                        if ( !empty( $subtitle ) )
                         {
                            ?>
                            <p><?php echo $subtitle; ?></p>
                        <?php } ?>
                </div>
                <div class="news-area">
                    <div class="row">
                        <?php
                            $i = 0;
                            $sticky = get_option( 'sticky_posts' );
                            if ($catid != -1) {
                                $home_recent_post_section = array(
                                    'ignore_sticky_posts' => true,
                                    'post__not_in'        => $sticky,
                                    'cat'                 => $catid,
                                    'posts_per_page'      => 3,
                                    'order'               => 'DESC'
                                );
                            } else {
                                $home_recent_post_section = array(
                                    'ignore_sticky_posts' => true,
                                    'post__not_in'        => $sticky,
                                    'post_type'           => 'post',
                                    'posts_per_page'      => 3,
                                    'order'               => 'DESC'
                                );
                            }

                            $home_recent_post_section_query = new WP_Query($home_recent_post_section);

                            if ( $home_recent_post_section_query->have_posts() ) :
                                while ($home_recent_post_section_query->have_posts()) :
                                    $home_recent_post_section_query->the_post();
                                    ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="news-block">
                                <div class="news-img" <?php if ( !has_post_thumbnail() ) { echo "no-image"; } ?> >
                                      <?php
                                            if (has_post_thumbnail()) {
                                                $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id, 'full', true);
                                                ?>
                                                <img src="<?php echo esc_url($image_url[0]); ?>" class="img-responsive">
                                            <?php }
                                            ?>
                                    <div class="news-date text-center">
                                        <?php echo esc_html( get_the_date('M d') ); ?> <br />
                                        <?php echo esc_html( get_the_date('Y') ); ?> <br />
                                        <hr />
                                        <i class="fa fa-comments-o"></i><br />
                                        <?php echo get_comments_number(); ?> <br />
                                    </div>
                                </div>

                                <div class="news-text">
                                    <a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>
                                    <?php the_excerpt();?> <a href="<?php the_permalink();?>">[...]</a>
                                </div>
                            </div>
                        </div>

                        <?php
                                    $i++;
                            endwhile; wp_reset_postdata(); endif;
                            ?>
                    </div><!-- /.row -->
                </div><!-- /.l-news -->
            </div><!-- /.container -->
        </section>
        <!-- l-news End -->

                <?php
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance              = $old_instance;
            $instance['cat_id']    = (isset( $new_instance['cat_id'] ) ) ? absint($new_instance['cat_id']) : '';
            $instance['title']     = sanitize_text_field( $new_instance['title'] );
            $instance['sub_title'] = sanitize_text_field( $new_instance['sub_title'] );
            $instance['read_more'] = sanitize_text_field( $new_instance['read_more'] );

            return $instance;

        }

        public function form( $instance )
        {
            $instance  = wp_parse_args( (array ) $instance, $this->defaults() );
            $catid     = absint( $instance['cat_id'] );
            $title     = esc_attr( $instance['title'] );
            $subtitle  = esc_attr( $instance['sub_title'] );
            $read_more = esc_attr( $instance['read_more'] );

            ?>

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
                <label for="<?php echo esc_attr( $this->get_field_id('cat_id') ); ?>">
                    <?php esc_html_e('Select Category', 'business-way'); ?>
                </label><br/>
                <?php
                $business_way_con_dropown_cat = array(
                    'show_option_none' => esc_html__('From Recent Posts', 'business-way'),
                    'orderby'          => 'name',
                    'order'            => 'asc',
                    'show_count'       => 1,
                    'hide_empty'       => 1,
                    'echo'             => 1,
                    'selected'         => $catid,
                    'hierarchical'     => 1,
                    'name'             => esc_attr( $this->get_field_name('cat_id') ),
                    'id'               => esc_attr( $this->get_field_name('cat_id') ),
                    'class'            => 'widefat',
                    'taxonomy'         => 'category',
                    'hide_if_empty'    => false,
                );

                wp_dropdown_categories( $business_way_con_dropown_cat );
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('read_more') ); ?>">
                    <?php esc_html_e( 'Read More Text', 'business-way'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('read_more')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more')); ?>" value="<?php echo $read_more; ?>">
            </p>

            <?php
        }
    }
}

add_action('widgets_init', 'business_way_recent_post_widget');

function business_way_recent_post_widget()

{
    register_widget('Business_Way_Recent_Post_Widget');

}