<?php
/**
 * VW Dentist Theme Customizer
 *
 * @package VW Dentist
 */

if ( ! class_exists( 'VW_Dentist_Content_Creation' ) ) :

	/**
	 * VW_Dentist_Content_Creation class.
	 */
	class VW_Dentist_Content_Creation extends WP_Customize_Control {

		/**
		 * Control type
		 *
		 * @var string control type
		 */
		public $type = 'content-creation';

		/**
		 * Button text
		 *
		 * @var string button text
		 */
		public $button_text = '';

		/**
		 * Button link
		 *
		 * @var string button url
		 */
		public $button_url = '#';

		/**
		 * List of features
		 *
		 * @var array theme features / options
		 */
		public $options = array();

		/**
		 * List of explanations
		 *
		 * @var array additional info
		 */
		public $explained_features = array();

		/**
		 * VW_Dentist_Content_Creation constructor.
		 *
		 * @param WP_Customize_Manager $manager the customize manager class.
		 * @param string               $id id.
		 * @param array                $args customizer manager parameters.
		 */
		public function __construct( WP_Customize_Manager $manager, $id, array $args ) {
			$this->button_text;
			$manager->register_control_type( 'VW_Dentist_Content_Creation' );
			parent::__construct( $manager, $id, $args );

		}

		/**
		 * Json conversion
		 */
		public function to_json() {
			parent::to_json();
			$this->json['button_text']        = $this->button_text;
			$this->json['button_url']         = $this->button_url;
			$this->json['options']            = $this->options;
			$this->json['explained_features'] = $this->explained_features;
		}

		/**
		 * Control content
		 */
		public function content_template() {
			?>
			<div class="content-themeinfo">
				<# if ( data.options ) { #>
					<ul class="content-themeinfo-features">
						<# for (option in data.options) { #>
							<li><span class="upsell-pro-label"></span>{{ data.options[option] }}
							</li>
							<# } #>
					</ul>
					<# } #>

					<# if ( data.button_text && data.button_url ) { #>
						<a target="_blank" href="{{ data.button_url }}" class="button button-primary" target="_blank">{{
							data.button_text }}</a>
						<# } #>

						<# if ( data.explained_features.length > 0 ) { #>
						<hr />

						<ul class="content-themeinfo-feature-list">
							<# for (requirement in data.explained_features) { #>
								<li>* {{{ data.explained_features[requirement] }}}</li>
								<# } #>
						</ul>
				<# } #>
			</div>
		<?php
		}
	}
endif;
