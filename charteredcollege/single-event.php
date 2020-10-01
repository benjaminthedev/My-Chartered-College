<?php
/**
 * Single Event
 *
 * The template for single events.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>


	<?php
	while ( have_posts() ) : the_post();

		// Get the page header.
		get_template_part( 'parts/banner', 'event' );

		// Get the event content.
		get_template_part( 'parts/content', 'event' );

		// Get the related posts.
		get_template_part( 'parts/share-alt' );

		// Get the related posts.
		get_template_part( 'parts/related-events' );

	endwhile; ?>

</article>

<?php
get_footer();
