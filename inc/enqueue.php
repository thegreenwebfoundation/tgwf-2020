<?php
/**
 * Functions for loading in stylesheets and scripts.
 *
 * @package V24
 */

add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );


if ( ! function_exists( 'neve_child_load_css' ) ) :
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		$css_version = filemtime( get_stylesheet_directory() . '/assets/css/main.css' );
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . '/assets/css/main.min.css', array( 'neve-style' ), $css_version );
	}
endif;
