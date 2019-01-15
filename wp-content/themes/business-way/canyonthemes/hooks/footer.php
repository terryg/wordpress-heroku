<?php 
/*
* Footer Section footer widget section 
* @since 1.0.0
* @package Business Way
*/ 
if ( ! function_exists( 'business_way_site_footer_widget_action' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function business_way_site_footer_widget_action() { 
		if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4'))
            {     
	    $count = 0;
	        for ( $i = 1; $i <= 4; $i++ )
	            {
	              if ( is_active_sidebar( 'footer-' . $i ) )
	                    {
	                        $count++;
	                    }
	            }
	        $column=3;
	        if( $count == 4 ) 
	        {
	            $column = 3;  
	       
	        }
	        elseif( $count == 3)
	        {
	                $column=4;
	        }
	        elseif( $count == 2) 
	        {
	                $column = 6;
	        }
	       elseif( $count == 1) 
	        {
	                $column = 12;
	        }
	    ?>               
		<!-- Footer Top Start -->
        <div id="footer" class="footer-top">
            <div class="container">
                <div class="row">
                    <?php
                for ( $i = 1; $i <= 4 ; $i++ )
                {
                    if ( is_active_sidebar( 'footer-' . $i ) )
                    { 
                ?>

                    <div class="col-md-<?php echo  absint( $column ); ?>">
                        <div class="footer-widget">
                            <?php dynamic_sidebar('footer-' . $i); ?>
                        </div>
                    </div>
                    <?php }

                }
                ?>  
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- Footer Top End -->    
	<?php            
      }
   }
endif;
add_action( 'business_way_site_footer_widget', 'business_way_site_footer_widget_action', 10 );



/*
* Footer Section footer widget section 
* @since 1.0.0
* @package Business Way
*/ 
if ( ! function_exists( 'business_way_site_footer_button_action' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function business_way_site_footer_button_action() {
	$copyright = wp_kses_post(business_way_get_option('business_way_copyright'));
	$to_top    = absint(business_way_get_option('business_way_footer_go_to_top'));
	$powered   = wp_kses_post(business_way_get_option('business_way_footer_powered_text'));
    	?>
		<!-- Footer Bottom Start -->
	        <div id="footer-bottom" class="footer-bottom">
	            <div class="footer-text text-center">
	                <?php if( $to_top == 1 ) { ?>
		                <div class="scroll-to-top">
		                    <div class="scroll-top">
		                        <a href="#" id="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
		                    </div>
		                </div>
	                <?php } ?>
	                <p><?php echo $copyright; ?></p>
	                <div class="powered-text">
	                	<?php
	                		/* translators: %s: CMS name, i.e. WordPress. */
	                		printf( esc_html__( 'Proudly powered by %s', 'business-way' ), 'WordPress' );
	                	?>
	                	<span class="sep"> | </span>
	                	<?php
	                		/* translators: 1: Theme name, 2: Theme author. */
	                		printf( esc_html__( 'Theme: %1$s by %2$s.', 'business-way' ), 'Business Way', '<a href="http://www.canyonthemes.com/">Canyon Themes</a>' );
	                	?>
	                </div>
	            </div>
	        </div>
	    <!-- Footer Bottom End -->
<?php }
endif;
add_action( 'business_way_site_footer_button', 'business_way_site_footer_button_action', 10 );
