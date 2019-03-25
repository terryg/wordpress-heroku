<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Dentist_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-dentist' ),
				'family'      => esc_html__( 'Font Family', 'vw-dentist' ),
				'size'        => esc_html__( 'Font Size',   'vw-dentist' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-dentist' ),
				'style'       => esc_html__( 'Font Style',  'vw-dentist' ),
				'line_height' => esc_html__( 'Line Height', 'vw-dentist' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-dentist' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-dentist-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-dentist-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-dentist' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-dentist' ),
        'Acme' => __( 'Acme', 'vw-dentist' ),
        'Anton' => __( 'Anton', 'vw-dentist' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-dentist' ),
        'Arimo' => __( 'Arimo', 'vw-dentist' ),
        'Arsenal' => __( 'Arsenal', 'vw-dentist' ),
        'Arvo' => __( 'Arvo', 'vw-dentist' ),
        'Alegreya' => __( 'Alegreya', 'vw-dentist' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-dentist' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-dentist' ),
        'Bangers' => __( 'Bangers', 'vw-dentist' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-dentist' ),
        'Bad Script' => __( 'Bad Script', 'vw-dentist' ),
        'Bitter' => __( 'Bitter', 'vw-dentist' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-dentist' ),
        'BenchNine' => __( 'BenchNine', 'vw-dentist' ),
        'Cabin' => __( 'Cabin', 'vw-dentist' ),
        'Cardo' => __( 'Cardo', 'vw-dentist' ),
        'Courgette' => __( 'Courgette', 'vw-dentist' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-dentist' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-dentist' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-dentist' ),
        'Cuprum' => __( 'Cuprum', 'vw-dentist' ),
        'Cookie' => __( 'Cookie', 'vw-dentist' ),
        'Chewy' => __( 'Chewy', 'vw-dentist' ),
        'Days One' => __( 'Days One', 'vw-dentist' ),
        'Dosis' => __( 'Dosis', 'vw-dentist' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-dentist' ),
        'Economica' => __( 'Economica', 'vw-dentist' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-dentist' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-dentist' ),
        'Francois One' => __( 'Francois One', 'vw-dentist' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-dentist' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-dentist' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-dentist' ),
        'Handlee' => __( 'Handlee', 'vw-dentist' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-dentist' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-dentist' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-dentist' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-dentist' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-dentist' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-dentist' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-dentist' ),
        'Kanit' => __( 'Kanit', 'vw-dentist' ),
        'Lobster' => __( 'Lobster', 'vw-dentist' ),
        'Lato' => __( 'Lato', 'vw-dentist' ),
        'Lora' => __( 'Lora', 'vw-dentist' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-dentist' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-dentist' ),
        'Merriweather' => __( 'Merriweather', 'vw-dentist' ),
        'Monda' => __( 'Monda', 'vw-dentist' ),
        'Montserrat' => __( 'Montserrat', 'vw-dentist' ),
        'Muli' => __( 'Muli', 'vw-dentist' ),
        'Marck Script' => __( 'Marck Script', 'vw-dentist' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-dentist' ),
        'Open Sans' => __( 'Open Sans', 'vw-dentist' ),
        'Overpass' => __( 'Overpass', 'vw-dentist' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-dentist' ),
        'Oxygen' => __( 'Oxygen', 'vw-dentist' ),
        'Orbitron' => __( 'Orbitron', 'vw-dentist' ),
        'Patua One' => __( 'Patua One', 'vw-dentist' ),
        'Pacifico' => __( 'Pacifico', 'vw-dentist' ),
        'Padauk' => __( 'Padauk', 'vw-dentist' ),
        'Playball' => __( 'Playball', 'vw-dentist' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-dentist' ),
        'PT Sans' => __( 'PT Sans', 'vw-dentist' ),
        'Philosopher' => __( 'Philosopher', 'vw-dentist' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-dentist' ),
        'Poiret One' => __( 'Poiret One', 'vw-dentist' ),
        'Quicksand' => __( 'Quicksand', 'vw-dentist' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-dentist' ),
        'Raleway' => __( 'Raleway', 'vw-dentist' ),
        'Rubik' => __( 'Rubik', 'vw-dentist' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-dentist' ),
        'Russo One' => __( 'Russo One', 'vw-dentist' ),
        'Righteous' => __( 'Righteous', 'vw-dentist' ),
        'Slabo' => __( 'Slabo', 'vw-dentist' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-dentist' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-dentist'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-dentist' ),
        'Sacramento' => __( 'Sacramento', 'vw-dentist' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-dentist' ),
        'Tangerine' => __( 'Tangerine', 'vw-dentist' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-dentist' ),
        'VT323' => __( 'VT323', 'vw-dentist' ),
        'Varela Round' => __( 'Varela Round', 'vw-dentist' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-dentist' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-dentist' ),
        'Volkhov' => __( 'Volkhov', 'vw-dentist' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-dentist' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-dentist' ),
			'100' => esc_html__( 'Thin',       'vw-dentist' ),
			'300' => esc_html__( 'Light',      'vw-dentist' ),
			'400' => esc_html__( 'Normal',     'vw-dentist' ),
			'500' => esc_html__( 'Medium',     'vw-dentist' ),
			'700' => esc_html__( 'Bold',       'vw-dentist' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-dentist' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-dentist' ),
			'normal'  => esc_html__( 'Normal', 'vw-dentist' ),
			'italic'  => esc_html__( 'Italic', 'vw-dentist' ),
			'oblique' => esc_html__( 'Oblique', 'vw-dentist' )
		);
	}
}
