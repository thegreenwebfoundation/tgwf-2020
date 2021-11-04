<?php
/**
 * Output a custom header and footer for posts in the fellowship category.
 *
 * @package tgwf
 */

add_action( 'neve_before_post_content', 'tgwf_output_fellowship_header' );
add_action( 'neve_after_content', 'tgwf_output_fellowship_footer' );

/**
 * Outputs a content header on a single post in the 'fellowship notebook' category.
 */
function tgwf_output_fellowship_header() {

	$fellowship_cat = 'Fellowship notebook';

	$args = array(
		'fellowship_cat' => $fellowship_cat,
	);

	// Only do this for posts.
	if ( is_single() && in_category( $fellowship_cat ) ) :

		get_template_part( 'template-parts/fellowship/fellowship-header', '', $args );

	endif;
}

/**
 * Outputs a content footer on a single post in the 'fellowship notebook' category.
 */
function tgwf_output_fellowship_footer() {

	$fellowship_cat = 'Fellowship notebook';

	$args = array(
		'fellowship_cat' => $fellowship_cat,
	);

	// Only do this for posts.
	if ( is_single() && in_category( $fellowship_cat ) ) :

		get_template_part( 'template-parts/fellowship/fellowship-footer', '', $args );

	endif;
}
