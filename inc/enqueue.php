<?php

/**
 * Functions for loading in stylesheets and scripts.
 *
 * @package tgwf
 */

add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );
add_action( 'wp_enqueue_scripts', 'tgwf_load_footer_scripts' );


if ( ! function_exists( 'neve_child_load_css' ) ) :
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		$css_version = filemtime( get_stylesheet_directory() . '/assets/css/main.css' );
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/main.min.css', array( 'neve-style' ), $css_version );

		// Conditionally load FOE report CSS.
		if ( is_page( 'report-fog-of-enactment' ) ) {
			$foe_css_version = filemtime( get_stylesheet_directory() . '/assets/css/fog-of-enactment.min.css' );
			wp_enqueue_style( 'fog-of-enactment-report', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/fog-of-enactment.min.css', array( 'neve-child-style' ), $foe_css_version );
		}
	}
endif;

/**
 * Load scripts into the footer.
 */
function tgwf_load_footer_scripts() {
	// Cabin analytics.
	wp_enqueue_script( 'cabin', 'https://scripts.withcabin.com/hello.js', array(), '1.0.0', true );

	// Conditionally load FOE report JS.
	if ( is_page( 'report-fog-of-enactment' ) ) {
		$foe_js_version = filemtime( get_stylesheet_directory() . '/assets/js/theme.js' );
		wp_enqueue_script( 'fog-of-enactment-report', get_stylesheet_directory_uri() . '/assets/js/theme.min.js', array(), $foe_js_version, true );
	}

	// Only enqueue this JS if there is an FAQ block present on the page.
	if ( has_block( 'yoast/faq-block' ) ) {
		wp_enqueue_script(
			'faqs-js',
			get_stylesheet_directory_uri() . '/assets/js/block-faq.js',
			array( 'jquery' ),
			true,
			true
		);
	}
}
