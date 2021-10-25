<?php
/**
 * Output a footer for a fellowship post.
 *
 * @package tgwf
 */

?>

<?php
if ( is_active_sidebar( 'fellowship-footer' ) ) :
	?>

	<div class="fellowship-post__content-widget-container wp-block-group alignfull has-background">
		<div class="wp-block-group__inner-container">
			<?php dynamic_sidebar( 'fellowship-footer' ); ?>
		</div>
	</div>

	<?php
endif;

