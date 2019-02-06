<?php
/*
 * Cookie Consent admin class
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin admin class
 **/
if ( ! class_exists ( 'CTCC_Admin' ) ) {

	class CTCC_Admin {

		public function __construct() {
			//
		}

		/*
		 * Initialize the class and start calling our hooks and filters
		 * @since 2.0.0
		 */
		public function init() {

			add_action ( 'admin_menu', array ( $this, 'add_admin_menu' ) );
			add_action ( 'admin_init', array ( $this, 'register_options_init' ) );
			add_action ( 'admin_init', array ( $this, 'register_content_init' ) );
			add_action ( 'admin_init', array ( $this, 'register_styles_init' ) );
			add_action ( 'admin_enqueue_scripts', array ( $this, 'enqueue_scripts' ) );
			add_action ( 'admin_footer', array ( $this, 'add_js' ) );

			add_action( 'admin_init', array( $this, 'save_registered_setting' ) );

		}

		/**
		 * We save this artificially to let the tracker know that we're allowed to export this option's data
		 */
		public function save_registered_setting() {
			$options = get_option( 'ctcc_options_settings' );
			$options['wisdom_registered_setting'] = 1;
			update_option( 'ctcc_options_settings', $options );
		}

		public function enqueue_scripts() {
			wp_enqueue_style ( 'wp-color-picker' );
			wp_enqueue_script ( 'wp-color-picker', false, array ( 'jquery' ) );
			wp_enqueue_style ( 'ctcc-admin-style', CTCC_PLUGIN_URL . 'assets/css/admin-style.css' );
		}

		public function add_js() {
			$screen = get_current_screen();
			if ( $screen -> id == 'settings_page_ctcc' ) {
			?>
				<script>
					jQuery(document).ready(function($){
						$('.cctc-color-field').wpColorPicker();
					});
				</script>
			<?php			}
		}

		// Add the menu item
		public function add_admin_menu(  ) {
			add_options_page ( __('Cookie Consent', 'uk-cookie-consent'), __('Cookie Consent', 'uk-cookie-consent'), 'manage_options', 'ctcc', array ( $this, 'options_page' ) );
		}

		public function register_options_init(  ) {

			register_setting ( 'ctcc_options', 'ctcc_options_settings' );

			add_settings_section (
				'ctcc_options_section',
				__( 'General settings', 'uk-cookie-consent' ),
				array ( $this, 'settings_section_callback' ),
				'ctcc_options'
			);

			add_settings_field (
				'closure',
				__( 'Close', 'uk-cookie-consent' ),
				array ( $this, 'closure_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'first_page',
				__( 'First Page Only', 'uk-cookie-consent' ),
				array ( $this, 'first_page_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'enable_metafield',
				__( 'Selectively Exclude Pages', 'uk-cookie-consent' ),
				array ( $this, 'enable_metafield_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'exclude_zones',
				__( 'Exclude Zones', 'uk-cookie-consent' ),
				array ( $this, 'exclude_zones_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'duration',
				__( 'Notification Duration', 'uk-cookie-consent' ),
				array ( $this, 'duration_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'scroll_height',
				__( 'Scroll Height', 'uk-cookie-consent' ),
				array ( $this, 'scroll_height_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'cookie_expiry',
				__( 'Cookie Expiry', 'uk-cookie-consent' ),
				array ( $this, 'cookie_expiry_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'cookie_version',
				__( 'Cookie Version', 'uk-cookie-consent' ),
				array ( $this, 'cookie_version_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			add_settings_field (
				'wisdom_opt_out',
				__( 'Opt out of tracking', 'uk-cookie-consent' ),
				array ( $this, 'opt_out_render' ),
				'ctcc_options',
				'ctcc_options_section'
			);

			// Set default options
			$options = get_option ( 'ctcc_options_settings' );
			if ( false === $options ) {
				// Get defaults
				$defaults = $this -> get_default_options_settings();
				update_option ( 'ctcc_options_settings', $defaults );
			}

		}

		public function sanitize_content( $input ){
			$output = array();
			foreach( $input as $key=>$value ) {
				if( isset($input[$key] ) ) {
					if( $key == 'notification_text' ) {
						$output[$key] = esc_attr( $input[$key] );
					} else if( $key == 'more_info_url' ) {
						$output[$key] = esc_url( $input[$key] );
					} else {
						$output[$key] = sanitize_text_field( $input[$key] );
					}
				}
			}
			return $output;
		}

		public function register_content_init() {

			register_setting ( 'ctcc_content', 'ctcc_content_settings', array( $this, 'sanitize_content') );

			add_settings_section (
				'ctcc_content_section',
				__( 'Content settings', 'uk-cookie-consent' ),
				array ( $this, 'content_settings_section_callback' ),
				'ctcc_content'
			);

			add_settings_field (
				'heading_text',
				__( 'Heading Text', 'uk-cookie-consent' ),
				array ( $this, 'heading_text_render' ),
				'ctcc_content',
				'ctcc_content_section'
			);

			add_settings_field (
				'notification_text',
				__( 'Notification Text', 'uk-cookie-consent' ),
				array ( $this, 'notification_text_render' ),
				'ctcc_content',
				'ctcc_content_section'
			);

			add_settings_field (
				'more_info_text',
				__( 'More Info Text', 'uk-cookie-consent' ),
				array ( $this, 'more_info_text_render' ),
				'ctcc_content',
				'ctcc_content_section'
			);

			add_settings_field (
				'more_info_page',
				__( 'More Info Page', 'uk-cookie-consent' ),
				array ( $this, 'more_info_page_render' ),
				'ctcc_content',
				'ctcc_content_section'
			);

			add_settings_field (
				'more_info_url',
				__( 'More Info URL', 'uk-cookie-consent' ),
				array ( $this, 'more_info_url_render' ),
				'ctcc_content',
				'ctcc_content_section'
			);

			add_settings_field (
				'more_info_target',
				__( 'More Info Target', 'uk-cookie-consent' ),
				array ( $this, 'more_info_target_render' ),
				'ctcc_content',
				'ctcc_content_section'
			);

			add_settings_field (
				'accept_text',
				__( 'Accept Text', 'uk-cookie-consent' ),
				array ( $this, 'accept_text_render' ),
				'ctcc_content',
				'ctcc_content_section'
			);

			// Set default options
			$options = get_option ( 'ctcc_content_settings' );
			if ( false === $options ) {
				// Get defaults
				$defaults = $this -> get_default_content_settings();
				update_option ( 'ctcc_content_settings', $defaults );
			}

		}

		public function register_styles_init(  ) {

			register_setting ( 'ctcc_styles', 'ctcc_styles_settings' );

			add_settings_section (
				'ctcc_styles_section',
				__( 'Styles settings', 'uk-cookie-consent' ),
				array ( $this, 'styles_settings_section_callback' ),
				'ctcc_styles'
			);

			add_settings_field (
				'position',
				__( 'Position', 'uk-cookie-consent' ),
				array ( $this, 'position_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'container_class',
				__( 'Container Class', 'uk-cookie-consent' ),
				array ( $this, 'container_class_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'enqueue_styles',
				__( 'Include Stylesheet', 'uk-cookie-consent' ),
				array ( $this, 'enqueue_styles_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'rounded_corners',
				__( 'Rounded Corners', 'uk-cookie-consent' ),
				array ( $this, 'rounded_corners_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'drop_shadow',
				__( 'Drop Shadow', 'uk-cookie-consent' ),
				array ( $this, 'drop_shadow_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'display_accept_with_text',
				__( 'Display Button With Text', 'uk-cookie-consent' ),
				array ( $this, 'display_accept_with_text_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'x_close',
				__( 'Use X Close', 'uk-cookie-consent' ),
				array ( $this, 'x_close_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'text_color',
				__( 'Text Color', 'uk-cookie-consent' ),
				array ( $this, 'text_color_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'bg_color',
				__( 'Background Color', 'uk-cookie-consent' ),
				array ( $this, 'bg_color_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'link_color',
				__( 'Link Color', 'uk-cookie-consent' ),
				array ( $this, 'link_color_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'button_color',
				__( 'Button Color', 'uk-cookie-consent' ),
				array ( $this, 'button_color_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'button_bg_color',
				__( 'Button Background', 'uk-cookie-consent' ),
				array ( $this, 'button_bg_color_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'bg_color',
				__( 'Background Color', 'uk-cookie-consent' ),
				array ( $this, 'bg_color_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			add_settings_field (
				'flat_button',
				__( 'Flat Button', 'uk-cookie-consent' ),
				array ( $this, 'flat_button_render' ),
				'ctcc_styles',
				'ctcc_styles_section'
			);

			// Set default options
			$options = get_option ( 'ctcc_styles_settings' );
			if ( false === $options ) {
				// Get defaults
				$defaults = $this -> get_default_styles_settings();
				update_option ( 'ctcc_styles_settings', $defaults );
			}

		}

		public function get_default_options_settings() {
			$defaults = array (
				'closure'						=>	'click',
				'scroll_height'					=> 200,
				'first_page'					=>	0,
				'enable_metafield'				=>	0,
				'zones_only'					=> '',
				'duration'						=>	60,
				'cookie_expiry'					=>	30,
				'cookie_version'				=>	1
			);
			return $defaults;
		}

		public function get_default_content_settings() {

			$previous_settings = get_option ( 'catapult_cookie_options' );
			// Check for settings from previous version
			if ( ! empty ( $previous_settings ) ) {
				$defaults = array (
					'heading_text'					=>	__( 'Cookies', 'uk-cookie-consent' ),
					'notification_text'				=>	$previous_settings['catapult_cookie_text_settings'],
					'accept_text'					=>	$previous_settings['catapult_cookie_accept_settings'],
					'more_info_text'				=>	$previous_settings['catapult_cookie_more_settings'],
					'more_info_page'				=>	'',
					'more_info_url'					=>	site_url ( $previous_settings['catapult_cookie_link_settings'] ),
					'more_info_target'				=>	'_blank',
				);
			} else {
				$defaults = array (
					'heading_text'					=>	__( 'Cookies', 'uk-cookie-consent' ),
					'notification_text'				=>	__( 'This site uses cookies: ', 'uk-cookie-consent' ),
					'accept_text'					=>	__( 'Okay, thanks', 'uk-cookie-consent' ),
					'more_info_text'				=>	__( 'Find out more.', 'uk-cookie-consent' ),
					'more_info_page'				=>	get_option( 'ctcc_more_info_page', '' ),
					'more_info_url'					=>	'',
					'more_info_target'				=>	'_blank',
				);
			}
			return $defaults;

		}

		public function get_default_styles_settings() {
			$previous_settings = get_option ( 'catapult_cookie_options' );
			$defaults = array (
				'position'						=>	'top-bar',
				'container_class'				=>	'',
				'enqueue_styles'				=>	1,
				'rounded_corners'				=>	1,
				'drop_shadow'					=>	1,
				'display_accept_with_text'		=>	1,
				'x_close'						=>	0,
				'text_color'					=>	'#ddd',
				'bg_color'						=>	'#464646',
				'link_color'					=>	'#fff',
				'button_color'					=>	'',
				'button_bg_color'				=>	'',
				'flat_button'					=>	1,
			);
			// Check for settings from previous version

			if ( ! empty ( $previous_settings['catapult_cookie_bar_position_settings'] ) ) {
				$defaults['position'] = $previous_settings['catapult_cookie_bar_position_settings'] . '-bar';
			}

			if ( ! empty ( $previous_settings['catapult_cookie_text_colour_settings'] ) ) {
				$defaults['text_color'] = $previous_settings['catapult_cookie_text_colour_settings'];
			}

			if ( ! empty ( $previous_settings['catapult_cookie_bg_colour_settings'] ) ) {
				$defaults['bg_color'] = $previous_settings['catapult_cookie_bg_colour_settings'];
			}

			if ( ! empty ( $previous_settings['catapult_cookie_link_colour_settings'] ) ) {
				$defaults['link_color'] = $previous_settings['catapult_cookie_link_colour_settings'];
			}

			if ( ! empty ( $previous_settings['catapult_cookie_link_colour_settings'] ) ) {
				$defaults['link_color'] = $previous_settings['catapult_cookie_link_colour_settings'];
			}

			if ( ! empty ( $previous_settings['catapult_cookie_button_colour_settings'] ) ) {
				$defaults['button_bg_color'] = $previous_settings['catapult_cookie_button_colour_settings'];
			}

			return $defaults;

		}

		public function closure_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<select name='ctcc_options_settings[closure]'>
				<option value='click' <?php selected( $options['closure'], 'click' ); ?>><?php _e( 'On Click', 'uk-cookie-consent' ); ?></option>
				<option value='scroll' <?php selected( $options['closure'], 'scroll' ); ?>><?php _e( 'On Scroll', 'uk-cookie-consent' ); ?></option>
				<option value='timed' <?php selected( $options['closure'], 'timed' ); ?>><?php _e( 'Timed', 'uk-cookie-consent' ); ?></option>

			</select>
			<p class="description"><?php _e( 'How you want the user to close the notification', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function first_page_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<input type='checkbox' name='ctcc_options_settings[first_page]' <?php checked ( ! empty ( $options['first_page'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Select this to show the notification only on the first page the user visits', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function exclude_zones_render() {
			$options = get_option( 'ctcc_options_settings' );
			$zones = array();
			if( isset( $options['exclude_zones'] ) ) {
				$zones = $options['exclude_zones'];
			} ?>
			<select multiple name='ctcc_options_settings[exclude_zones][]'>
				<option value='AF' <?php selected( in_array( 'AF', $zones ) ); ?>><?php _e( 'Africa', 'uk-cookie-consent' ); ?></option>
				<option value='AN' <?php selected( in_array( 'AN', $zones ) ); ?>><?php _e( 'Antarctica', 'uk-cookie-consent' ); ?></option>
				<option value='AS' <?php selected( in_array( 'AS', $zones ) ); ?>><?php _e( 'Asia', 'uk-cookie-consent' ); ?></option>
				<option value='EU' <?php selected( in_array( 'EU', $zones ) ); ?>><?php _e( 'Europe', 'uk-cookie-consent' ); ?></option>
				<option value='NA' <?php selected( in_array( 'NA', $zones ) ); ?>><?php _e( 'North America', 'uk-cookie-consent' ); ?></option>
				<option value='OC' <?php selected( in_array( 'OC', $zones ) ); ?>><?php _e( 'Oceania', 'uk-cookie-consent' ); ?></option>
				<option value='SA' <?php selected( in_array( 'SA', $zones ) ); ?>><?php _e( 'South America', 'uk-cookie-consent' ); ?></option>
			</select>
			<p class="description"><?php _e( 'If you have the <a href="https://wordpress.org/plugins/geoip-detect/" target="_blank">GeoIP Detect</a> plugin activated, you can specify which areas of the world to exclude from displaying the notification.', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function scroll_height_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<input type="number" min="1" name="ctcc_options_settings[scroll_height]" value="<?php echo esc_attr( $options['scroll_height'] ); ?>">
			<p class="description"><?php _e( 'If you chose Scroll as the close method, enter the distance in pixels the user should scroll before the notification closes', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function duration_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<input type="number" min="1" name="ctcc_options_settings[duration]" value="<?php echo esc_attr( $options['duration'] ); ?>">
			<p class="description"><?php _e( 'If you chose Timer as the close method, enter how many seconds the notification should display for', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function cookie_expiry_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<input type="number" min="1" name="ctcc_options_settings[cookie_expiry]" value="<?php echo esc_attr( $options['cookie_expiry'] ); ?>">
			<p class="description"><?php _e( 'The number of days that the cookie is set for', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function cookie_version_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<input type="text" name="ctcc_options_settings[cookie_version]" value="<?php echo esc_attr( $options['cookie_version'] ); ?>">
			<p class="description"><?php _e( 'A version number for the cookie - update this to invalidate the cookie and force all users to view the notification again', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function opt_out_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<input type='checkbox' name='ctcc_options_settings[wisdom_opt_out]' <?php checked ( ! empty ( $options['wisdom_opt_out'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'If you previously opted into allowing this plugin to track non-sensitive data, you can opt out here', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		/*
		 * Content renders
		 */

		public function heading_text_render() {
			$ctcc_content_settings = get_option( 'ctcc_content_settings' ); ?>
			<input type="text" name="ctcc_content_settings[heading_text]" value="<?php echo esc_attr( $ctcc_content_settings['heading_text'] ); ?>">
			<p class="description"><?php _e( 'The heading text - only applies if you are not using a top or bottom bar', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function notification_text_render() {
			$ctcc_content_settings = get_option( 'ctcc_content_settings' ); ?>
			<input class="widefat" type="text" name="ctcc_content_settings[notification_text]" value="<?php echo esc_attr( $ctcc_content_settings['notification_text'] ); ?>">
			<p class="description"><?php _e( 'The default text to indicate that your site uses cookies', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function accept_text_render() {
			$ctcc_content_settings = get_option( 'ctcc_content_settings' ); ?>
			<input type="text" name="ctcc_content_settings[accept_text]" value="<?php echo esc_attr( $ctcc_content_settings['accept_text'] ); ?>">
			<p class="description"><?php _e( 'The default text to dismiss the notification', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function more_info_text_render() {
			$ctcc_content_settings = get_option( 'ctcc_content_settings' ); ?>
			<input type="text" name="ctcc_content_settings[more_info_text]" value="<?php echo esc_attr( $ctcc_content_settings['more_info_text'] ); ?>">
			<p class="description"><?php _e( 'The default text to use to link to a page providing further information', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function more_info_page_render() {
			$ctcc_content_settings = get_option( 'ctcc_content_settings' );
			// Get all pages
			$pages = get_pages();
			?>
			<?php if ( $pages ) { ?>
				<select name='ctcc_content_settings[more_info_page]'>
					<option></option>
					<?php foreach ( $pages as $page ) { ?>
						<option value='<?php echo esc_attr( $page->ID ); ?>' <?php selected( $ctcc_content_settings['more_info_page'], $page -> ID ); ?>><?php echo esc_html( $page -> post_title ); ?></option>
					<?php } ?>
				</select>
				<p class="description"><?php _e( 'The page containing further information about your cookie policy', 'uk-cookie-consent' ); ?></p>
			<?php }
		}

		public function more_info_url_render() {
			$ctcc_content_settings = get_option( 'ctcc_content_settings' ); ?>
			<input type="url" name="ctcc_content_settings[more_info_url]" value="<?php echo esc_url( $ctcc_content_settings['more_info_url'] ); ?>">
			<p class="description"><?php _e( 'You can add an absolute URL here to override the More Info Page setting above. Use this to link to an external website for further information about cookies.', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function more_info_target_render() {
			$ctcc_content_settings = get_option( 'ctcc_content_settings' ); ?>
			<select name='ctcc_content_settings[more_info_target]'>
				<option value='_blank' <?php selected( $ctcc_content_settings['more_info_target'], '_blank' ); ?>><?php _e( 'New Tab', 'uk-cookie-consent' ); ?></option>
				<option value='_self' <?php selected( $ctcc_content_settings['more_info_target'], '_self' ); ?>><?php _e( 'Same Tab', 'uk-cookie-consent' ); ?></option>
			</select>
			<p class="description"><?php _e( 'Open the More Information page in the same or new tab.', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		/*
		 * Styles functions
		 */

		public function position_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<select name='ctcc_styles_settings[position]'>
				<option value='top-bar' <?php selected( $options['position'], 'top-bar' ); ?>><?php _e( 'Top Bar', 'uk-cookie-consent' ); ?></option>
				<option value='bottom-bar' <?php selected( $options['position'], 'bottom-bar' ); ?>><?php _e( 'Bottom Bar', 'uk-cookie-consent' ); ?></option>
				<option value='top-left-block' <?php selected( $options['position'], 'top-left-block' ); ?>><?php _e( 'Top Left Block', 'uk-cookie-consent' ); ?></option>
				<option value='top-right-block' <?php selected( $options['position'], 'top-right-block' ); ?>><?php _e( 'Top Right Block', 'uk-cookie-consent' ); ?></option>
				<option value='bottom-left-block' <?php selected( $options['position'], 'bottom-left-block' ); ?>><?php _e( 'Bottom Left Block', 'uk-cookie-consent' ); ?></option>
				<option value='bottom-right-block' <?php selected( $options['position'], 'bottom-right-block' ); ?>><?php _e( 'Bottom Right Block', 'uk-cookie-consent' ); ?></option>
			</select>
			<p class="description"><?php _e( 'Where the notification should appear', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function container_class_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type="text" name="ctcc_styles_settings[container_class]" value="<?php echo esc_attr( $options['container_class'] ); ?>">
			<p class="description"><?php _e( 'You can add an optional wrapper class, eg container, here to align the notification text with the rest of your content', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function enqueue_styles_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type='checkbox'  name='ctcc_styles_settings[enqueue_styles]' <?php checked ( ! empty ( $options['enqueue_styles'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Deselect this to dequeue the plugin stylesheet', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function rounded_corners_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type='checkbox'  name='ctcc_styles_settings[rounded_corners]' <?php checked ( ! empty ( $options['rounded_corners'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Round the corners on the block (doesn\'t apply to the top or bottom bar)', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function drop_shadow_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type='checkbox'  name='ctcc_styles_settings[drop_shadow]' <?php checked ( ! empty ( $options['drop_shadow'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Add drop shadow to the block (doesn\'t apply to the top or bottom bar)', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function display_accept_with_text_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type='checkbox'  name='ctcc_styles_settings[display_accept_with_text]' <?php checked ( ! empty ( $options['display_accept_with_text'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Display the confirmation button with notification text', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function x_close_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type='checkbox'  name='ctcc_styles_settings[x_close]' <?php checked ( ! empty ( $options['x_close'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Remove confirmation button and use \'X\' icon instead', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function text_color_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type="text" class="cctc-color-field" name="ctcc_styles_settings[text_color]" value="<?php echo esc_attr( $options['text_color'] ); ?>">
			<p class="description"><?php _e( 'The text color on the notification', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function bg_color_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type="text" class="cctc-color-field" name="ctcc_styles_settings[bg_color]" value="<?php echo esc_attr( $options['bg_color'] ); ?>">
			<p class="description"><?php _e( 'The background color for the notification', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function link_color_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type="text" class="cctc-color-field" name="ctcc_styles_settings[link_color]" value="<?php echo esc_attr( $options['link_color'] ); ?>">
			<p class="description"><?php _e( 'The link color on the notification', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function button_color_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type="text" class="cctc-color-field" name="ctcc_styles_settings[button_color]" value="<?php echo esc_attr( $options['button_color'] ); ?>">
			<p class="description"><?php _e( 'The text color on the notification button', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function button_bg_color_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type="text" class="cctc-color-field" name="ctcc_styles_settings[button_bg_color]" value="<?php echo esc_attr( $options['button_bg_color'] ); ?>">
			<p class="description"><?php _e( 'The background color on the notification button', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function flat_button_render() {
			$options = get_option( 'ctcc_styles_settings' ); ?>
			<input type='checkbox'  name='ctcc_styles_settings[flat_button]' <?php checked ( ! empty ( $options['flat_button'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Remove the border from the button', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function enable_metafield_render() {
			$options = get_option( 'ctcc_options_settings' ); ?>
			<input type='checkbox'  name='ctcc_options_settings[enable_metafield]' <?php checked ( ! empty ( $options['enable_metafield'] ), 1 ); ?> value='1'>
			<p class="description"><?php _e( 'Select this to enable a metafield on pages and posts. Checking the metafield on a page or post will exclude that page from displaying the notification.', 'uk-cookie-consent' ); ?></p>
		<?php
		}

		public function settings_section_callback() {
			echo '<p>' . __( 'Basic settings', 'uk-cookie-consent' ) . '</p>';
			echo '<p><a href="https://termly.io/products/privacy-policy-generator/?utm_source=Wordpress%20Plugin&utm_medium=privacy%20policy%20link" target="_blank">' . __( 'Need a privacy policy? Create one for free with Termly!') . '</a></p>';
		}

		public function content_settings_section_callback() {
			echo '<p>' .__( 'Update the content displayed to the user', 'uk-cookie-consent' ) . '</p>';
			echo '<p><a href="https://termly.io/products/privacy-policy-generator/?utm_source=Wordpress%20Plugin&utm_medium=privacy%20policy%20link" target="_blank">' . __( 'Need a privacy policy? Create one for free with Termly!') . '</a></p>';
		}

		public function styles_settings_section_callback() {
			echo '<p>' .__( 'Change the styles here if you like - but it\'s better in the Customizer', 'uk-cookie-consent' ) . '</p>';
			echo '<p><a href="https://termly.io/products/privacy-policy-generator/?utm_source=Wordpress%20Plugin&utm_medium=privacy%20policy%20link" target="_blank">' . __( 'Need a privacy policy? Create one for free with Termly!') . '</a></p>';
		}

		public function pages_settings_section_callback() {
			echo '<p>' . __( 'Use this section to set exclusion rules for pages and posts.', 'uk-cookie-consent' ) . '</p>';
			echo '<p><a href="https://termly.io/products/privacy-policy-generator/?utm_source=Wordpress%20Plugin&utm_medium=privacy%20policy%20link" target="_blank">' . __( 'Need a privacy policy? Create one for free with Termly!') . '</a></p>';
		}

		public function options_page() {
			$reset = isset ( $_GET['reset'] ) ? $_GET['reset'] : '';
			if ( isset ( $_POST['reset'] ) ) {

				$defaults = $this -> get_default_styles_settings();
				update_option ( 'ctcc_styles_settings', $defaults );

				$defaults = $this -> get_default_content_settings();
				update_option ( 'ctcc_content_settings', $defaults );

			}
			$current = isset ( $_GET['tab'] ) ? $_GET['tab'] : 'options';
			$title =  __( 'Cookie Consent', 'uk-cookie-consent' );
			$tabs = array (
				'options'		=>	__( 'General', 'uk-cookie-consent' ),
				'content'		=>	__( 'Content', 'uk-cookie-consent' ),
				'styles'		=>	__( 'Styles', 'uk-cookie-consent' )
			);?>

			<div class="wrap">
				<h1><?php echo $title; ?></h1>
				<div class="ctdb-outer-wrap">
					<div class="ctdb-inner-wrap">
						<h2 class="nav-tab-wrapper">
							<?php foreach( $tabs as $tab => $name ) {
								$class = ( $tab == $current ) ? ' nav-tab-active' : '';
								echo "<a class='nav-tab$class' href='?page=ctcc&tab=$tab'>$name</a>";
							} ?>
						</h2>
						<form action='options.php' method='post'>
							<?php
							settings_fields( 'ctcc_' . strtolower ( $current ) );
							do_settings_sections( 'ctcc_' . strtolower ( $current ) );
							submit_button();
							?>
						</form>
						<form method="post" action="">
							<p class="submit">
								<input name="reset" class="button button-secondary" type="submit" value="<?php _e( 'Reset plugin defaults', 'uk-cookie-consent' ); ?>" >
								<input type="hidden" name="action" value="reset" />
							</p>
						</form>
					</div><!-- .ctdb-inner-wrap -->

					<div class="ctdb-banners">
						<div class="ctdb-banner">
							<a href="https://catapultthemes.com/downloads/showcase/?utm_source=plugin_ad&utm_medium=wp_plugin&utm_content=cookieconsent&utm_campaign=themes"><img src="<?php echo CTCC_PLUGIN_URL . 'assets/images/showcase-banner-ad.jpg'; ?>" alt="" ></a>
						</div>
						<div class="ctdb-banner hide-dbpro">
							<a href="https://discussionboard.pro/?utm_source=plugin_ad&utm_medium=wp_plugin&utm_content=cookieconsent&utm_campaign=dbpro"><img src="<?php echo CTCC_PLUGIN_URL . 'assets/images/dbpro-ad-view.png'; ?>" alt="" ></a>
						</div>
						<div class="ctdb-banner">
							<a href="https://catapultthemes.com/downloads/sliderify-pro/?utm_source=plugin_ad&utm_medium=wp_plugin&utm_content=cookieconsent&utm_campaign=themes"><img src="<?php echo CTCC_PLUGIN_URL . 'assets/images/mgs-banner-ad.png'; ?>" alt="" ></a>
						</div>
						<div class="ctdb-banner">
							<a href="http://superheroslider.catapultthemes.com/?utm_source=plugin_ad&utm_medium=wp_plugin&utm_content=cookieconsent&utm_campaign=superhero"><img src="<?php echo CTCC_PLUGIN_URL . 'assets/images/superhero-ad1.png'; ?>" alt="" ></a>
						</div>
					</div>

				</div><!-- .ctdb-outer-wrap -->
			</div><!-- .wrap -->
			<?php
		}


	}

}
