<?php
/**
 * Customisations for the news archive page.
 *
 * @package tgwf
 */

add_action( 'neve_before_posts_loop', 'tgwf_display_news_categories' );

function tgwf_display_news_categories() {

	$categories = get_categories(
		array(
			'orderby' => 'name',
			'parent'  => 0,
		)
	);

	foreach ( $categories as $category ) {
		printf(
			'<a class="wp-block-button__link" href="%1$s">%2$s</a>',
			esc_url( get_category_link( $category->term_id ) ),
			esc_html( $category->name )
		);
	}
}
