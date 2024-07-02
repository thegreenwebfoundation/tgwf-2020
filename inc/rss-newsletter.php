<?php

/**
 * Functions relating to RSS newsletter setup
 *
 * @package tgwf
 */

add_action( 'init', 'co2js_rss' );
add_action( 'pre_get_posts', 'co2js_rss_posts' );
add_filter( 'pre_option_posts_per_rss', 'co2js_rss_posts_limit' );

/**
 * Create a feed for co2.js, and assign a render/template function.
 * Feed becomes available at /feed/co2js on the front-end.
 */
function co2js_rss() {
    add_feed( 'co2js', 'render_co2js_rss' );
}

/**
 * Only display posts that have the 'co2-js' category assigned to them.
 */
function co2js_rss_posts( $query ) {

    // Exit if this is not a feed request.
	if( ! $query->is_feed('co2js') || ! $query->is_main_query() ){
		return;
	}

    $query->set( 'category_name', 'co2-js' );
}

/** 
 * Set the number of posts we want to display on this RSS feed.
 */
function co2js_rss_posts_limit( $option_name ) {
    if ( is_feed('co2js') ) 
        return 5;

    return $option_name;
}

/**
 * Change the default rss template to be a custom one.
 */
function render_co2js_rss() {
    get_template_part( 'template-parts/rss/rss', 'co2js' );
}
