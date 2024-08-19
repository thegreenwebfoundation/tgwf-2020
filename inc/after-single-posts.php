<?php
/**
 * Customisations for single new posts
 *
 * @package tgwf
 */

add_filter( 'the_content', 'gwf_after_post_main_content' );

/**
 * Display the list of post categories on the blog archive page only.
 */
function gwf_after_post_main_content( $content ) {

    // Double-check we're on a single post.
	if ( is_singular() && in_the_loop() && is_main_query() ) :

        // Output tags at end of content for all posts.
        // Can't use Neve hooks, as no way to insert stuff after tags.
        $content .= output_post_tags();

        if ( in_category( 'case-studies' ) ) :
            // Output the software vendors CTA block.
            $content .= get_post_field( 'post_content', 5814 );
        endif;

        // Only do this for posts in the CO2.js category.
        if ( in_category( 'CO2.js' ) ) :
            $content .= '<h3>Get notified about new CO2.js posts</h3>';
            $content .= do_shortcode( "[sibwp_form id=2]" );
        endif;

        return $content;
    endif;
}

/**
 * Display the list of tags assigned to a post.
 */
function output_post_tags() {
    $tags = get_the_tags();
    if ( ! is_array( $tags ) ) {
        return;
    }
    $html  = '<div class="nv-tags-list">';
    $html .= '<span>' . __( 'Tags', 'neve' ) . ':</span>';
    foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
        $html    .= '<a href=' . esc_url( $tag_link ) . ' title="' . esc_attr( $tag->name ) . '" class=' . esc_attr( $tag->slug ) . ' rel="tag">';
        $html    .= esc_html( $tag->name ) . '</a>';
    }
    $html .= ' </div> ';
    return $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}