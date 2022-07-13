jQuery(document).ready(function( $ ) {
	/*******************************
	 *  FAQs accordion.
	 **************************** */

	/*
	* Put the hide and reveal functionality in the Yoast FAQs block.
	*/
	var $dropdowns = $( '.schema-faq-section' );

	$dropdowns.each(function() {
		var $dropdown = $( this );
		$dropdown.click(function() {
			toggleDropDown( $dropdown );
		} );
	} );

	
	function toggleDropDown($el) {
		if ( $el.hasClass( 'is-open' ) ) {
			$el.removeClass( 'is-open' );
		} else {
			$el.addClass( 'is-open' );
		}
	}
});