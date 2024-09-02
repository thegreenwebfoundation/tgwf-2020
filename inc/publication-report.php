<?php

/**
 * Customisations to the fog of enactment page.
 *
 * @package tgwf
 */

add_filter( 'body_class', 'fog_of_enactment_body_class', 50, 1 );
add_filter( 'neve_container_class_filter', 'fog_of_enactment_class', 50, 1 );

add_action( 'neve_do_sidebar', 'fog_of_enactment_toc', 50, 2 );


/* Adds a container level class for the fog of enactment page. */
function fog_of_enactment_body_class( $classes ) {
	if ( is_page( 'report-fog-of-enactment' ) || is_page( 'report-ai-environmental-impact' ) ) {
		$classes[] = 'gwf-publications__report';
	}

    return $classes;
}


/* Adds a container level class for the fog of enactment page. */
function fog_of_enactment_class( $string ) {
	if ( is_page( 'report-fog-of-enactment' ) ) {
    	$string .= ' gwf-publication-report fog-of-enactment';
	} elseif ( is_page( 'report-ai-environmental-impact' ) ) {
		$string .= ' gwf-publication-report ai-env-impact';
	}


    return $string;
}

function fog_of_enactment_toc( $context, $position ) {

	if ( is_page( 'report-fog-of-enactment' ) && $position == 'left' ) {

		get_template_part( 'template-parts/fog-of-enactment', '', '');
	} else if ( is_page( 'report-ai-environmental-impact' ) && $position == 'left' ) {

		get_template_part( 'template-parts/fog-of-enactment', '', '');
	}
}


