( function( api ) {

	// Extends our custom "led" section.
	api.sectionConstructor['canary-led'] = api.Section.extend( {

		// No led for this type of section.
		attachLed: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
