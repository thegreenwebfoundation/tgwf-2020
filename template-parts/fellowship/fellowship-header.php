<?php
/**
 * Output the header for a fellowship post.
 * Expects to be passed $args through get_template_part function.
 * Expected variables are:
 *    -> string fellowship_name the name of the category for fellowship posts.
 *
 * @package tgwf
 */

if ( isset( $args['fellowship_cat'] ) ) :
	$fellowship_cat = $args['fellowship_cat'];

	// Get the ID of fellowship category.
	$category_id = get_cat_ID( $fellowship_cat );

	// Get the URL of this category.
	$category_link = get_category_link( $category_id );
endif;


?>

<?php
if ( is_active_sidebar( 'fellowship-header' ) ) :
	?>
	<div class="fellowship-post__header">
		<div class="fellowship-post__category">
			<a href="<?php esc_html( $category_link ); ?>">
				<?php echo esc_html( $fellowship_cat ); ?>
			</a>
		</div>

		<div class="fellowship-post__content-widget-container wp-block-group has-background">
			<div class="wp-block-group__inner-container">
				<?php dynamic_sidebar( 'fellowship-header' ); ?>
			</div>
		</div>
	</div>

	<?php
endif;

