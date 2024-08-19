<?php
/**
 * Customisations for single new posts
 *
 * @package tgwf
 */

add_action( 'neve_after_content', 'gwf_after_post_content' );

/**
 * Display the list of post categories on the blog archive page only.
 */
function gwf_after_post_content() {

    // Output tags at end of content for all posts.
    // Can't use Neve hooks, as no way to insert stuff after tags.
	if ( is_single() ) :
        output_post_tags();

        $co2_cat = 'CO2.js';

        $args = array(
            'co2_cat' => $co2_cat,
        );

        // Only do this for posts in the CO2.js category.
        if ( in_category( $co2_cat ) ) :
            ?>
                <hr/>
                <h3>Get notified about new CO2.js posts</h3>
            <?php
            echo do_shortcode( '[sibwp_form id=2]' );
        endif;
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
    echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}