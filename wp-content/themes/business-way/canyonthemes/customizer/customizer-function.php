<?php
/**
 * Define some custom classes for business-way.
 * 
 * https://codex.wordpress.org/Class_Reference/WP_Customize_Control
 *
 * @package Canyon Themes
 * @subpackage Business Way
 * @since 1.0.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	   	
	/**
	 * A class to create a dropdown for all categories in your wordpress site
	 *
	 * @since 1.0.0
	 * @business-way public
	 */
	class Business_Way_Customize_Category_Control extends WP_Customize_Control {
		
		/**
		 * Render the control's content.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function render_content() {
			$business_way_dropdown = wp_dropdown_categories(
					array(
						'name'              => 'customize-dropdown-categories' . $this->id,
						'echo'              => 0,
						'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;','business-way'),
						'option_none_value' => '0',
						'selected'          => $this->value(),
					)
			);

			// Hackily add in the data link parameter.
			$business_way_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $business_way_dropdown );

			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
				$this->label,
				$this->description,
				$business_way_dropdown
			);
		}
	}

	
}