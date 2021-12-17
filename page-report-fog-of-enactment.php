<?php
/**
 * A Template to implement some of the ideas for presenting a
 * Report on the Web
 *
 * @package tgwf
 * @since   0.0.0
 */
$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-page' );

get_header();

?>

<?php

	wp_enqueue_style( 'fog-of-enactment-report', get_stylesheet_directory_uri() . '/assets/css/tufte.css');
?>


<div class="<?php echo esc_attr( $container_class ); ?> single-page-container">
	<div class="row">

		<?php do_action( 'neve_do_sidebar', 'single-page', 'left' ); ?>



		<div class="nv-single-page-wrap col fog-of-enactment">
			<article>
			<?php
			/**
			 * Executes actions before the page header.
			 *
			 * @since 2.4.0
			 */
			do_action( 'neve_before_page_header' );

			/**
			 * Executes the rendering function for the page header.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_page_header', 'single-page' );

			/**
			 * Executes actions before the page content.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_before_content', 'single-page' );

			if ( have_posts() ) {
				while ( have_posts() ) {

					the_post();
					get_template_part( 'template-parts/content', 'page' );
				}
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}

			/**
			 * Executes actions after the page content.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_after_content', 'single-page' );
			?>
			</article>
		</div>
		<?php do_action( 'neve_do_sidebar', 'single-page', 'right' ); ?>
	</div>
</div>
<?php get_footer(); ?>
