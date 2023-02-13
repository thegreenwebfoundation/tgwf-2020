<?php
/**
 * Functions relating to block patterns
 */

remove_theme_support( 'core-block-patterns' );

add_action( 'init', 'remove_patterns', 100 );
add_action( 'init', 'register_gwf_patterns', 200 );

// Remove all the default patterns, and patterns bundled by theme.
function remove_patterns() {

	$neve_patterns = [
		'dark-header-centered-content',
		'two-columns-image-text',
		'three-columns-images-text',
		'three-columns-images-text',
		'three-columns-images-texts-content',
		'four-columns-team-members',
		'two-columns-centered-content',
		'two-columns-with-text',
		'testimonials-columns',
		'gallery-grid-buttons',
		'gallery-title-buttons',
		'light-header-left-aligned-content',
	];

	foreach ( $neve_patterns as $pattern ) {
		unregister_block_pattern( 'neve/' . $pattern );
	}
}

// Remove all the default patterns, and patterns bundled by theme.
function register_gwf_patterns() {
	$gwf_patterns = [
		'three-cols--title-para-button',
	];

	register_block_pattern_category( 'greenweb', array(
		'label' => __( 'Green Web', 'text-domain' )
	) );

	/**
	 * Load patterns.
	 */
	foreach ( $gwf_patterns as $pattern ) {
		register_block_pattern(
			'gwf/' . $pattern,
			require dirname(__FILE__) . '/../block-patterns/' . $pattern . '.php'
		);
	}
}


