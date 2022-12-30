<?php
/**
 * Customisations for the news archive page.
 *
 * @package tgwf
 */

add_action( 'neve_before_posts_loop', 'tgwf_display_news_categories' );

/**
 * Display the list of post categories on the blog archive page only.
 */
function tgwf_display_news_categories() {

	if ( is_home() ) :

		$categories = get_categories(
			array(
				'orderby' => 'name',
				'parent'  => 0,
			)
		);

		echo '<div class="blog-categories-list summary-highlight">';
		echo '<h3 class="mt-0">Browse our posts by topic</h3>';

		foreach ( $categories as $category ) {
			echo '<div class="wp-block-button is-style-primary" style="display: inline-block;">';
			printf(
				'<a class="wp-block-button__link" href="%1$s">%2$s</a>',
				esc_url( get_category_link( $category->term_id ) ),
				esc_html( $category->name )
			);
			echo '</div>';
		}

		echo '</div>';
	endif;
}
