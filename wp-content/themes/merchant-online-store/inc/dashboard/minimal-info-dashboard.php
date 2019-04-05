<?php

/**
 * Redirect to Getting Started page on theme activation
 */
add_action( 'admin_menu', 'minimal_getting_started_menu' );
add_action( 'admin_init', 'bellini_redirect_on_activation' );
add_action( 'admin_enqueue_scripts', 'bellini_start_load_admin_scripts' );

if ( ! function_exists( 'bellini_redirect_on_activation' ) ) {
	function bellini_redirect_on_activation() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			wp_redirect( admin_url( "themes.php?page=minimal-getting-started" ) );
		}
	}
}

if ( ! function_exists( 'bellini_start_load_admin_scripts' ) ) {
	function bellini_start_load_admin_scripts() {
		// Load styles only on our page
		global $pagenow;
		if( 'themes.php' != $pagenow )
			return;

		wp_register_style( 'minimal-getting-started', get_stylesheet_directory_uri() . '/inc/dashboard/minimal-info-dashboard.css', false, '1.0.0' );
		wp_enqueue_style( 'minimal-getting-started' );
	}
}


/* Hook a menu under Appearance */
if ( ! function_exists( 'minimal_getting_started_menu' ) ) {
	function minimal_getting_started_menu() {
		add_theme_page(
			esc_attr__( 'Get Started', 'merchant-online-store' ),
			esc_attr__( 'Get Started', 'merchant-online-store' ),
			'manage_options',
			'minimal-getting-started',
			'minimal_getting_started'
		);
	}
}


/**
 * Theme Info Page
 */
if ( ! function_exists( 'minimal_getting_started' ) ) {
function minimal_getting_started() {

	// Theme info
	$theme = wp_get_theme( 'merchant-online-store' );
?>

		<div class="wrap getting-started">
		<div class="getting-started__header">

			<div class="intro">
				<h2 class="theme-names"><?php esc_html_e( 'Welcome to ', 'merchant-online-store' ); ?>
					<span class="name-bold"><?php esc_html_e( 'Merchant Online Store ', 'merchant-online-store' ); ?></span>
				</h2>
				<span class="theme-ver"><?php echo esc_attr($theme['Version']);?></span>
				<p class="theme-sub-msg">
					Congratulations! You are about to use the most easy to use and felxible WordPress theme built for launching an online store.
				</p>
			</div>

			<div class="cards">
				<h3 class="theme-f-h"><?php esc_html_e( 'Feel like stepping up ? ', 'merchant-online-store' ); ?></h3>

					<div class="club-discount">
					<p><strong><?php esc_html_e( 'Exclusive 20% Discount! Now at only $17.6', 'merchant-online-store' ); ?></strong></p>
					<p>
						<?php esc_html_e('Use the code ', 'merchant-online-store' );?>
						<code><strong><?php esc_html_e('SELLWITHWP', 'merchant-online-store' );?></strong></code>
						<?php esc_html_e('to get 20&#37; off when you purchase Merchant Storefront Pro!. For limited period only.', 'merchant-online-store' );?>
					</p>
				</div>
					<div class="text-block no-bottom-margin">
					<div class="col-100 dashboard-upgrade-center">
						<span class="dashboard-upgrade-button">Upgrade</span>
						<h2 class="dashboard-upgrade-title">Exclusive Layouts</h2>
					</div>

					<div class="col-100 dashboard-upgrade-left">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/layout.jpg';?>" alt="<?php esc_html_e( 'Unique Layouts', 'merchant-online-store' ); ?>">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/reviews.jpg';?>" alt="<?php esc_html_e( 'Unique Layouts', 'merchant-online-store' ); ?>">
					</div>
				</div>

				<div class="text-block no-bottom-margin">
					<div class="col-50 dashboard-upgrade-right">
						<span class="dashboard-upgrade-button">Upgrade</span>
						<h2 class="dashboard-upgrade-title">Out of the Box SEO Integration</h2>
						<p>Developed following WooCommerce guideline.</p>
						<div class="dashboard-upgrade-benefit">
						<ul>
							<li>100% compatible with WooCommerce</li>
							<li>Lots of layout for Shop and Product pages.</li>
							<li>Optimized for higher conversion.</li>
						</ul>

						</div>
					</div>

					<div class="col-50 dashboard-upgrade-right">
						<span class="dashboard-upgrade-button">Upgrade</span>
						<h2 class="dashboard-upgrade-title">650+ Google Fonts</h2>
						<p>Developed following WooCommerce guideline.</p>
						<div class="dashboard-upgrade-benefit">
						<ul>
							<li>100% compatible with WooCommerce</li>
							<li>Lots of layout for Shop and Product pages.</li>
							<li>Optimized for higher conversion.</li>
						</ul>

						</div>
					</div>

				</div>
				</div>

			<div class="cards bellini__upgrade-info-box no-top-margin">
			<div class="dashboard-cta flexify--center">

				<div class="col-60 dashboard-cta-left">
					<h2>Get the most out of Storefront</h2>
					<p>Live customization is the beginning of what Merchant Storefront can do to help you design your website. Upgrade now.</p>
				</div>

				<div class="col-40 dashboard-cta-right">
					<a class="theme__cta--download--pro" href="<?php echo esc_url('https://atlantisthemes.com/merchant-storefront-child/'); ?>">Upgrade Now</a>
				</div>
			</div>
			</div>

		<div class="cards dashboard__blocks">

			<div class="col-50">
				<h3>Getting Started</h3>
				<ol>
					<li>Start <a href="<?php echo esc_url( admin_url('customize.php') ); ?>">Customizing</a> your website.</li>
					<li>Install <a href="<?php echo esc_url('https://wordpress.org/plugins/homepage-control/'); ?>">Homepage Control</a> to re-order Frontpage sections.</li>
					<li>Upgrade to Pro to unlock all features.</li>
				</ol>
			</div>

			<div class="col-50">
				<h3>Get Support</h3>
				<ol>
					<li>WordPress.org <a href="<?php echo esc_url('https://wordpress.org/support/theme/merchant-online-store'); ?>">Support Forum</a></li>
					<li><a href="<?php echo esc_url('https://atlantisthemes.com/contact/'); ?>">Email Support</a> (Pro Users)</li>
				</ol>
			</div>
		</div>

		</div>
		</div><!-- .getting-started -->

	<?php
}
}