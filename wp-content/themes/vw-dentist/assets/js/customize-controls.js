( function( api ) {

	// Extends our custom "vw-dentist" section.
	api.sectionConstructor['vw-dentist'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );