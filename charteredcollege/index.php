<?php
/**
 * Index
 *
 * The template for the blog index.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>

<main id="main" class="site-main">
	
	<?php
	// Get the main index banner.
	get_template_part( 'parts/banner', 'index' );

	// Get the category list.
	get_template_part( 'parts/categories' ); ?>

</main>

<?php
get_footer();
