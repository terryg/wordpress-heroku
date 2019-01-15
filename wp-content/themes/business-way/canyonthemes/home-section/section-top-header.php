<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
// retrieving Customizer Value
$section_option = business_way_get_option('business_way_top_header_section');
if ($section_option =='show') {
    $email_icon   = esc_attr(business_way_get_option('business_way_email_icon'));
    $email_value  = wp_kses_post(business_way_get_option('business_way_top_header_email'));
    $social_menu  = absint(business_way_get_option('business_way_social_link_hide_option'));
    $register_text  = esc_html(business_way_get_option('business_way_login_register_text'));
    $register_link  = esc_url(business_way_get_option('business_way_login_register_link'));
    ?>

        <!-- Header Start -->
        <div class="top-header">
            <div class="container">
                <?php if( has_nav_menu('social') && 1 == $social_menu ){ ?>
                    <div class="header-left social-links navbar-left">
                       
                            <?php wp_nav_menu(array( 'theme_location' => 'social') ); ?>
                     
                    </div>
                <?php } ?>
                <div class="header-right navbar-right">
                    <ul>
                        <?php if(!empty($email_value)) { ?>
                            <li><i class="fa <?php echo esc_attr($email_icon);?>"></i><?php echo $email_value; ?>
                            </li>
                        <?php } ?>
                        <?php if(!empty($register_text)){ ?>    
                            <li>
                                <?php 
                                $register_woo_link = esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));
                                    $links = ( empty($register_link) ? $register_woo_link : $register_link ); ?>
                                    <a href="<?php echo esc_url($links); ?>">
                                        <?php echo $register_text;?>
                                    </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Header End -->

<?php } ?>