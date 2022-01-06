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


<div class="">
	<div class="row">


		<?php do_action( 'neve_do_sidebar', 'single-page', 'left' ); ?>



		<div class="nv-single-page-wrap col fog-of-enactment">

			<nav>
				<div class="logo">
					<a class="brand" href="https://www.thegreenwebfoundation.org/" title="The Green Web Foundation"
						aria-label="The Green Web Foundation">
						<?php
							$logo_path = get_stylesheet_directory_uri() . '/assets/img/thegreenwebfoundation-logo.png';
							?>
						<img src="<?php echo $logo_path ?>" />
					</a>
				</div>


				<div class="toc">
					<ol>
						<li>
							<details>
								<summary>Acknowledgements</summary>
								<ol>
									<li>The Green Web Foundation</li>
									<li>About the author</li>
									<li>Suggested Citation</li>
								</ol>
							</details>
						</li>
						<li>
							<details>
								<summary>Foreword</summary>
								<ol>
									<li>The Fog of Enactment</li>
									<li>Why we published this report</li>
								</ol>
							</details>
						</li>


						<li>
							<details>
								<summary>Executive summary</summary>
								<ol>
									<li>Gaps in how environmental impact is modeled</li>
									<li>Critical assessment of industry sustainability claims</li>
									<li>Extractive industries and the tech sector: the case of fossil fuels</li>
								</ol>
							</details>
						</li>
						<li>
							<!-- this is the only part without sub items -->
							Introduction
						</li>
						<li>

							<details>
								<summary>Gaps in how we model impact</summary>
								<ol>
									<li>Estimating the footprint of a digital service or product</li>
									<li>What about global estimates?</li>
								</ol>
							</details>
						</li>

						<li>
							<details>
								<summary>Industry claims largely unchallenged</summary>
								<ol>
									<li>Looking at direct and indirect effects</li>
									<li>Claims of positive impacts</li>
									<li>Lessons learned</li>
								</ol>
							</details>
						</li>


						<li>
							<details>
								<summary>
									Extractive industries and the tech sector: the case of fossil fuels
								</summary>
								<ol>
									<li>Reaching carbon neutrality?</li>
									<li>Digitization for fossil fuel industry?</li>
									<li>Reducing embodied emissions</li>
								</ol>
							</details>
						</li>
						<li>Conclusion</li>
						<li>Footnotes</li>
						<li>Appendix</li>

					</ol>


				</div>

			</nav>

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
