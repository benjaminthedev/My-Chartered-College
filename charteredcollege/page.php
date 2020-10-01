<?php
/**
 * Page
 *
 * The template for default pages.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>

<main id="main" class="site-main">

	<?php
	while ( have_posts() ) : the_post();

		// Get the page header.
		get_template_part( 'parts/banner', 'page' );

		// Get the relevant template part to display the content.
		get_template_part( 'parts/content', 'page' );

	endwhile; ?>

</main>

<?php
get_footer();
