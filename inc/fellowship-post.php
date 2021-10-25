<?php
/**
 * Output a custom header and footer for posts in the fellowship category.
 *
 * @package tgwf
 */

add_action( 'neve_before_content', 'tgwf_output_fellowship_header' );
add_action( 'neve_after_content', 'tgwf_output_fellowship_footer' );

/**
 * Outputs a content header on a single post in the 'fellowship' category.
 */
function tgwf_output_fellowship_header() {

	// Only do this for posts.
	if ( is_single() && in_category( 'fellowship' ) ) :

		get_template_part( 'template-parts/fellowship/fellowship-header' );

	endif;
}

/**
 * Outputs a content footer on a single post in the 'fellowship' category.
 */
function tgwf_output_fellowship_footer() {

	// Only do this for posts.
	if ( is_single() && in_category( 'fellowship' ) ) :

		get_template_part( 'template-parts/fellowship/fellowship-footer' );

	endif;
}
