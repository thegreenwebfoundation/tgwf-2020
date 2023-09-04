<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-gwf__threecols-t-p-b';

$column_number = get_field( 'column_number' );

if ( $column_number === "Two" ) {
    $class_name .= ' ' . $class_name . '--two-cols';
}


// Load values and assign defaults.
$heading_one             = get_field( 'heading_one' ) ?: 'Heading one';
$heading_two             = get_field( 'heading_two' ) ?: 'Heading two';
$heading_three           = get_field( 'heading_three' ) ?: 'Heading three';

$paragraph_one           = get_field( 'paragraph_one' ) ?: 'Paragraph one';
$paragraph_two           = get_field( 'paragraph_two' ) ?: 'Paragraph two';
$paragraph_three         = get_field( 'paragraph_three' ) ?: 'Paragraph three';

$button_text_one         = get_field( 'button_text_one' ) ?: 'button text';
$button_text_two         = get_field( 'button_text_two' ) ?: 'button text';
$button_text_three       = get_field( 'button_text_three' ) ?: 'button text';

$button_link_one         = get_field( 'button_link_one' ) ?: 'button link';
$button_link_two         = get_field( 'button_link_two' ) ?: 'button link';
$button_link_three       = get_field( 'button_link_three' ) ?: 'button link';

// Set up custom styles based on column width.
//$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
//$style  = implode( '; ', $styles );

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    
	<h3 class="gwf__threecols-t-p-b__title"><?php echo esc_html( $heading_one ); ?></h3>
	<div class="gwf__threecols-t-p-b__para"><?php echo wp_kses_post( $paragraph_one ); ?></div>

	<div class="wp-block-button gwf__threecols-t-p-b__button">
		<a class="wp-block-button__link" href="<?php echo esc_html( $button_link_one ); ?>">
			<?php echo esc_html( $button_text_one ); ?>
		</a>
	</div>

	<h3 class="gwf__threecols-t-p-b__title"><?php echo esc_html( $heading_two ); ?></h3>
	<div class="gwf__threecols-t-p-b__para"><?php echo wp_kses_post( $paragraph_two ); ?></div>
	<div class="wp-block-button gwf__threecols-t-p-b__button">
		<a class="wp-block-button__link" href="<?php echo esc_html( $button_link_two ); ?>">
			<?php echo esc_html( $button_text_two ); ?>
		</a>
	</div>

	<?php 
	if ( $column_number != "Two" ) :
		?>
		<h3 class="gwf__threecols-t-p-b__title"><?php echo esc_html( $heading_three ); ?></h3>
		<div class="gwf__threecols-t-p-b__para"><?php echo wp_kses_post( $paragraph_three ); ?></div>	
		<div class="wp-block-button gwf__threecols-t-p-b__button">
			<a class="wp-block-button__link" href="<?php echo esc_html( $button_link_three ); ?>">
				<?php echo esc_html( $button_text_three ); ?>
			</a>
		</div>
		<?php
	endif;
	?>
	
</div>