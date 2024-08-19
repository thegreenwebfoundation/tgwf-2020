<?php
/**
 * Customisations to the end of single post content.
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

        // Only do this for posts in the CO2.js category.
        if ( in_category( 'CO2.js' ) ) :
            $content .= '<hr><h4>Get notified about new CO2.js posts</h4>';
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
    $html  = '<div class="nv-tags-list" style="margin-top: 2rem; margin-bottom: 2rem;">';
    $html .= '<span style="font-weight: bold">' . __( 'Tags', 'neve' ) . ':</span>';
    foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
        $html    .= '<a href=' . esc_url( $tag_link ) . ' title="' . esc_attr( $tag->name ) . '" class=' . esc_attr( $tag->slug ) . ' rel="tag">';
        $html    .= esc_html( $tag->name ) . '</a>';
    }
    $html .= ' </div> ';
    return $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}