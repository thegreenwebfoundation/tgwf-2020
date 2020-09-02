<?php
/**
 * Output an airline teaser
 *
 * @package v24
 */

$logo = get_field( 'logo' );
$docs = get_field( 'documents' );

$default_link_text = 'Download pdf';
?>

<div class="airline__teaser">

	<div class="airline__teaser--image">
		<?php
		if ( ! empty( $logo ) ) :
			?>

			<img src="<?php echo esc_url( $logo ); ?>">

			<?php
		endif;
		?>
	</div>

	<div class="airline__teaser--details">
		<?php the_title( '<h3>', '</h3>' ); ?>

		<?php
		if ( $docs ) :

			foreach ( $docs as $doc ) {
				$file = $doc['airline_document'];
				$text = $doc['document_title_text'];

				if ( ! empty( $file ) ) :
					?>

					<div class="airline__teaser--doc">
						<a class="airline__teaser--doclink" href="<?php echo esc_url( $file ); ?>"><?php echo ! empty( $text ) ? esc_html( $text ) : __( $default_link_text, 'v24' ); ?></a>
					</div>

					<?php
				endif;
			}
			echo '</ul>';
		endif;
		?>
	</div>

</div>

<?php
