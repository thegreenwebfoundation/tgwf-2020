<?php
/**
 * Three columns with images and text pattern.
 *
 * @package TGWF
 */

return array(
	'title'      => __( 'Text with gradient over image', 'tgwf' ),
	'content'    => '
	<!-- wp:cover {"url":"https://tgwf.local/wp-content/uploads/two-protestors_newsprint.jpg","id":4106,"dimRatio":0,"isDark":false,"align":"full","className":"pattern__text-gradient-image"} -->
	<div class="wp-block-cover alignfull is-light pattern__text-gradient-image">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
		<img class="wp-block-cover__image-background wp-image-4106" alt="" src="https://tgwf.local/wp-content/uploads/two-protestors_newsprint.jpg" data-object-fit="cover"/>
		
		<div class="wp-block-cover__inner-container">
		
			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">

				<div class="wp-block-group__inner-container">
					<!-- wp:heading {"textAlign":"center","fontSize":"large"} -->
					<h2 class="has-text-align-center has-large-font-size">Run another Green Check</h2>
					<!-- /wp:heading -->

					<!-- wp:shortcode -->
					[green-checker-search-form]
					<!-- /wp:shortcode -->
				</div>
			</div>
			<!-- /wp:group -->
		
		</div>
	</div>
	<!-- /wp:cover -->
	',
	'categories'    => array( 'greenweb' ),
);