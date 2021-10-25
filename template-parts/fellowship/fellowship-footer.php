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

	<div class="wp-block-group alignfull has-background has-neve-link-color-background-color has-nv-site-bg-color">
		<div class="wp-block-group__inner-container">
			<?php dynamic_sidebar( 'fellowship-footer' ); ?>
		</div>
	</div>

	<?php
endif;

