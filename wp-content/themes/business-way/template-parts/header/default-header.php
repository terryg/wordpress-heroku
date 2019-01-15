<?php 
/**
 * The template for displaying Default Header.
 *
 * This is the template that displays Default Header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Business Way
 */
?>
    <header id="header" class="head" role="banner">
        <?php do_action('business_way_top_header'); ?>
        <!-- Header Lower -->
        <div class="header-lower">
            <div class="container clearfix">
                <div class="row">
                    <!--Logo Box-->
                    <?php do_action('business_way_main_logo_box'); ?>
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!--main nav hook-->
                        <?php do_action('business_way_main_navigation'); ?>
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <?php
                            //load cart action
                            do_action('business_way_woo_cart_hook');
                            //load search icon in header.
                            do_action('header_search_icon');
                            ?>
                        </div>

                    </div><!--Nav Outer End-->
                </div>
            </div>
        </div>
        </header><!-- #masthead -->