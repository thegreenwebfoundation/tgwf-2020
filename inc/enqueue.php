<?php

/**
 * Functions for loading in stylesheets and scripts.
 *
 * @package tgwf
 */

add_action('wp_enqueue_scripts', 'neve_child_load_css', 20);
add_action('wp_enqueue_scripts', 'tgwf_load_footer_scripts');


if (!function_exists('neve_child_load_css')) :
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css()
	{
		$css_version = filemtime(get_stylesheet_directory() . '/assets/css/main.css');
		wp_enqueue_style('neve-child-style', trailingslashit(get_stylesheet_directory_uri()) . '/assets/css/main.min.css', array('neve-style'), $css_version);

		// conditionally load the css here
		if (is_page('report-fog-of-enactment')) {
			$foe_css_version = filemtime(get_stylesheet_directory() . '/assets/css/fog-of-enactment.css');
			wp_enqueue_style('fog-of-enactment-report', get_stylesheet_directory_uri() . '/assets/css/fog-of-enactment.min.css', array('neve-child-style'), $foe_css_version);
		}
	}
endif;

/**
 * Load scripts into the footer.
 */
function tgwf_load_footer_scripts()
{
	wp_enqueue_script('cabin', 'https://scripts.withcabin.com/hello.js', array(), '1.0.0', true);
	// conditionally load the css here
	if (is_page('report-fog-of-enactment')) {
		$foe_js_version = filemtime(get_stylesheet_directory() . '/assets/js/theme.js');
		wp_enqueue_script('fog-of-enactment-report', get_stylesheet_directory_uri() . '/assets/js/theme.min.js', array(), $foe_js_version, true);
	}
}
