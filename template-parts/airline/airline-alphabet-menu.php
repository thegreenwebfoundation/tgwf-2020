<?php
/**
 * Outputs an alphabet menu of airline CPTS.
 *
 * @package v24
 */

$airline_tax = 'airline-alphabet';

// Save the terms that have posts in an array as a transient (for performance).
if ( false === ( $alphabet = get_transient( 'v24_archive_alphabet' ) ) ) {
	// It wasn't there, so regenerate the data and save the transient.
	$terms = get_terms( $airline_tax );

	$alphabet = array();
	if ( $terms ) {
		foreach ( $terms as $term ) {
			$alphabet[] = $term->slug;
		}
	}
	set_transient( 'v24_archive_alphabet', $alphabet );
}
?>

<div id="archive-menu" class="alphabet-menu">

	<ul id="alphabet-menu" class="alphabet-menu__list">

		<?php
		foreach ( range( 'a', 'z' ) as $i ) :

			$current = ( $i == get_query_var( $airline_tax ) ) ? 'current-menu-item' : 'menu-item';

			$capitised_i = strtoupper( $i );

			if ( in_array( $i, $alphabet ) ) :
				printf( '<li class="alphabet-menu__char %s"><a href="#%s">%s</a></li>', $current, $capitised_i, $capitised_i );
			else :
				printf( '<li class="alphabet-menu__char %s">%s</li>', $capitised_i, $capitised_i );
			endif;

		endforeach;
		?>

	</ul>
</div>
<?php
