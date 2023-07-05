<?php

/**
 * Customisations to the fog of enactment page.
 *
 * @package tgwf
 */

add_filter( 'neve_container_class_filter', 'fog_of_enactment_class', 50, 1 );

add_action( 'neve_do_sidebar', 'fog_of_enactment_toc', 50, 2 );

/* Adds a container level class for the fog of enactment page. */
function fog_of_enactment_class( $string ) {
	if ( is_page( 'report-fog-of-enactment' ) ) {
    	$string .= ' fog-of-enactment';
	}

    return $string;
}

function fog_of_enactment_toc( $context, $position ) {

	if ( is_page( 'report-fog-of-enactment' ) && $position == 'left' ) {

		get_template_part( 'template-parts/fog-of-enactment', '', '');
	}
}


