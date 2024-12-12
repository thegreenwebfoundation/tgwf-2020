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
require 'inc/after-single-posts.php';
require 'inc/fellowship-post.php';
require 'inc/publication-report.php';
require 'inc/rss-newsletter.php';
require 'inc/support-form.php';


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
			'name'     => __( 'White to blue', 'tgwf' ),
			'gradient' => 'linear-gradient(145deg, rgb(255,255,255) 15%, rgb(0,102,255) 100%)',
			'slug'     => 'white-to-blue',
		),
		array(
			'name'     => __( 'White to orange', 'tgwf' ),
			'gradient' => 'linear-gradient(145deg, rgb(255,255,255) 15%, rgb(250,170,0) 100%)',
			'slug'     => 'white-to-orange',
		),
	)
);

add_action( 'init', 'register_acf_blocks' );

function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/threecols--title-para-button' );
}

add_filter( 'body_class', 'add_slug_body_class' );

function add_slug_body_class( $classes ) {
	global $post;

	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}
