<?php
/**
 * Functions for declaring new widget positions
 *
 * @package tgwf
 */

add_action( 'widgets_init', 'tgwf_register_widgets' );

/**
 * Declare the widgets for the tgwf site.
 */
function tgwf_register_widgets() {

	register_sidebar(
		array(
			'id'            => 'fellowship-header',
			'name'          => __( 'Fellowship header' ),
			'description'   => __( 'Displays under the header on a post in the "fellowship" category.' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'id'            => 'fellowship-footer',
			'name'          => __( 'Fellowship footer' ),
			'description'   => __( 'Displays as a footer on a post in the "fellowship" category.' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
