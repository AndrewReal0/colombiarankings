( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['verb-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
