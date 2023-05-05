<?php
/**
 * Key functions for the Neve child theme.
 *
 * @package tgwf
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'inc/enqueue.php';
require 'inc/widgets.php';
require 'inc/patterns.php';

require 'inc/news-archive.php';
require 'inc/fellowship-post.php';


// Add theme support for gradients, and define them.
add_theme_support(
	'editor-gradient-presets',
	array(
		array(
			'name'     => __( 'White to primary', 'tgwf' ),
			'gradient' => 'linear-gradient(145deg, rgb(255,255,255) 15%, rgb(0,255,0) 100%)',
			'slug'     => 'white-to-primary',
		),
		array(
			'name'     => __( 'Primary to white', 'tgwf' ),
			'gradient' => 'linear-gradient(145deg, rgb(0,255,0) 15%, rgb(255,255,255) 100%)',
			'slug'     => 'primary-to-white',
		),
		array(
			'name'     => __( 'White to orange', 'tgwf' ),
			'gradient' => 'linear-gradient(145deg, rgb(255,255,255) 15%, rgb(250,170,0) 100%)',
			'slug'     => 'white-to-orange',
		),
	)
);

