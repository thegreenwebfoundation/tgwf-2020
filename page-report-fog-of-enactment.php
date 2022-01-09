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

// headers and nav are disabled in the page UI. We need to import a
// menu ourselves if we want to display any navigation options for the site

// wp_nav_menu( $args );

?>

<?php

	wp_enqueue_style( 'fog-of-enactment-report', get_stylesheet_directory_uri() . '/assets/css/fog-of-enactment.css');

	wp_enqueue_script( 'sticky-js', get_stylesheet_directory_uri() . '/assets/js/sticky-sidebar.js' );

	wp_enqueue_script( 'fog-of-enactment-report', get_stylesheet_directory_uri() . '/assets/js/fog-of-enactment.js' );


?>


<div class="">
	<?php
	// TODO make a pared back menu, or decide if this would do by itself
	// wp_nav_menu( array( 'menu' => '3') );
?>

	<div class="row">


		<?php do_action( 'neve_do_sidebar', 'single-page', 'left' ); ?>


		<div class="nv-single-page-wrap col fog-of-enactment">

			<nav id="toc_nav_holder">
				<div class="logo">
					<a class="brand" href="https://www.thegreenwebfoundation.org/" title="The Green Web Foundation"
						aria-label="The Green Web Foundation">
						<?php
							$logo_path = get_stylesheet_directory_uri() . '/assets/img/thegreenwebfoundation-logo.png';
							?>
						<img src="<?php echo $logo_path ?>" />
					</a>
				</div>

				<button class="tocToggle">
					Table of Contents
				</button>


				<div class="toc">
					<!--
						button for showing the ToC in
						fixed form for touch devices
					-->
					<button>
						Close
					</button>
					<ol>
						<li>
							<details>
								<summary><a href="#acknowledgements">Acknowledgements</a></summary>
								<ol>
									<li><a href="#the-green-web-foundation">The Green Web Foundation</a></li>
									<li><a href="#about-the-author">About the author</a></li>
									<li><a href="#suggested-citation">Suggested Citation</a></li>
								</ol>
							</details>
						</li>
						<li>
							<details>
								<summary><a href="#foreword">Foreword</a></summary>
								<ol>
									<li><a href="#the-fog-of-enactment">The Fog of Enactment</a></li>
									<li><a href="#why-we-published-this-report">Why we published this report</a></li>
								</ol>
							</details>
						</li>

						<!--
							these are short enough not to need the sub items
							is the only part without sub items
						-->
						<li>
							<a href="#executive-summary">Executive summary</a></summary>
						</li>
						<li>
							<a href="#introduction">Introduction</a>
						</li>

						<li>
							<details>
								<summary>
									<a href="#gaps-in-how-we-model-impact">Gaps in how we model impact</a>
								</summary>
								<ol>
									<li><a href="#estimating-footprint-of-a-digital-service-or-product">Estimating the footprint of a
											digital service or product</a>
										</a></li>
									<li>
										<a href="#what-about-global-estimates">What about global estimates?</a>
										</a></li>
								</ol>
							</details>
						</li>

						<li>
							<details>
								<summary>
									<a href="#critical-assessment-of-industry-sustainability-claims">
										Critical assessment of industry sustainability claims
									</a>
								</summary>
								<ol>
									<li><a href="#looking-at-direct-and-indirect-effects">
											Looking at direct and indirect effects
										</a>
									</li>
									<li>
										<a href="#claims-of-positive-impacts">
											Claims of positive impacts
										</a>
									</li>
									<li>
										<a href="#lessons-learned">
											Lessons learned
										</a>

									</li>
								</ol>

							</details>
							</li>
							<li>

							<details>
								<summary>
									<a href="#extractive-industries-and-the-tech-sector-the-case-of-fossil-fuels">
										Extractive industries and the tech sector: the case of fossil fuels
									</a>
								</summary>
								<ol>

									<li>
										<a href="#reaching-carbon-neutrality">
											Reaching carbon neutrality
										</a>

									</li>
									<li>
										<a href="#digitization-for-fossil-fuel-industry">
											Digitization for fossil fuel industry?
										</a>
									</li>

									<li><a href="#reducing-embodied-emissions">
											Reducing Embodied Emissions
										</a>
									</li>
								</ol>
							</details>
						</li>
						<li><a href="#conclusion">
								Conclusion
							</a>
						</li>
						<li>
							<a href="#footnotes">
								Footnotes
							</a>
						</li>
						<li>
							<a href="#appendix">
								Appendix
							</a>
						</li>
					</ol>
				</div>

					<!-- close the nav wrapper for the sticky sidebar -->
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
				while ( have_posts() ) { ?>
				<section>

					<?
					the_post();
					get_template_part( 'template-parts/content', 'page' );
					?>
				</section>
				<? }

			} else { ?>
				<section>

					<? get_template_part( 'template-parts/content', 'none' ); ?>
				</section>
				<? }

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

