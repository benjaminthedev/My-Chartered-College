<?php
/**
 * Front Page
 *
 * The template for the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>

<main id="main" class="site-main">

	<?php
	while ( have_posts() ) : the_post();

		// Get the featured content.
		get_template_part( 'parts/featured', 'home' );

		// Get the popular content.
		get_template_part( 'parts/popular', 'home' );

		// Get the featured video block.
		get_template_part( 'parts/video', 'home' );

		// Get the Impact Journal articles block.
		get_template_part( 'parts/impact', 'home' );

		// Get the Wakelet block.
		get_template_part( 'parts/wakelet', 'home' );

		// Get the offers block.
		get_template_part( 'parts/offers', 'home' );

	endwhile; ?>

</main>

<?php
get_footer();
