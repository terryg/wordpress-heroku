jQuery( document ).ready( function() {

	/* === <p> === */

	wp.customize(
		'vw_dentist_p_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo p' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_p_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo p' ).css( 'font-family', to );
				} 
			);
		}
	);	

	wp.customize(
		'vw_dentist_p_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo p' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_p_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo p' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_p_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo p' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_p_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo p' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_p_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo p' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);

	/* === <a> === */

	wp.customize(
		'vw_dentist_a_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo a' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_a_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo a' ).css( 'font-family', to );
				} 
			);
		}
	);	

	wp.customize(
		'vw_dentist_a_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo a' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_a_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo a' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_a_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo a' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_a_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo a' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_a_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo a' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);


	/* === <h1> === */

	wp.customize(
		'vw_dentist_h1_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h1' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h1_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h1' ).css( 'font-family', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h1_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h1' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h1_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h1' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h1_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h1' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h1_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h1' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h1_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h1' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);

	/* === <h2> === */

	wp.customize(
		'vw_dentist_h2_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h2' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h2_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h2' ).css( 'font-family', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h2_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h2' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h2_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h2' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h2_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h2' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h2_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h2' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h2_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h2' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);

	/* === <h3> === */

	wp.customize(
		'vw_dentist_h3_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h3' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h3_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h3' ).css( 'font-family', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h3_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h3' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h3_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h3' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h3_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h3' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h3_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h3' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h3_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h3' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);

	/* === <h4> === */

	wp.customize(
		'vw_dentist_h4_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h4' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h4_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h4' ).css( 'font-family', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h4_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h4' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h4_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h4' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_vw_dentist_h4_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h4' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_vw_dentist_h4_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h4' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_vw_dentist_h4_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h4' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);


	/* === <h5> === */

	wp.customize(
		'vw_dentist_vw_dentist_h5_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h5' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_vw_dentist_h5_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h5' ).css( 'font-family', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h5_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h5' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h5_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h5' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h5_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h5' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h5_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h5' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h5_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h5' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);


	/* === <h6> === */

	wp.customize(
		'vw_dentist_h6_font_color',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h6' ).css( 'color', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h6_font_family',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h6' ).css( 'font-family', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h6_font_weight',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h6' ).css( 'font-weight', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h6_font_style',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h6' ).css( 'font-style', to );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h6_font_size',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h6' ).css( 'font-size', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h6_line_height',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h6' ).css( 'line-height', to + 'px' );
				} 
			);
		}
	);

	wp.customize(
		'vw_dentist_h6_letter_spacing',
		function( value ) {
			value.bind( 
				function( to ) {
					jQuery( 'body.ctypo h6' ).css( 'letter-spacing', to + 'px' );
				} 
			);
		}
	);


} ); // jQuery( document ).ready