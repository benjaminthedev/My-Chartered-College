<?php
/**
 * Related Courses
 *
 * Show a set of courses related to the current one.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Get the IDs of the subjects related to this post.
$themes = wp_get_post_terms( $post->ID, 'theme' );
$theme_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $themes as $theme ) {
	$theme_ids[] = $theme->term_id;
}

// Get the IDs of the interests related to this post.
$suitabilities = wp_get_post_terms( $post->ID, 'suitability' );
$suitability_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $suitabilities as $suitability ) {
	$suitability_ids[] = $suitability->term_id;
}

// Get the IDs of the phases related to this post.
$durations = wp_get_post_terms( $post->ID, 'duration' );
$duration_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $durations as $duration ) {
	$duration_ids[] = $duration->term_id;
}

// Get the ID of the current post so we can exclude it from our query.
$this_post = $post->ID;

// Set up the query.
$args = array(
	'post_type' => 'course',
	'post_status' => 'publish',
	'posts_per_page' => 4,
	'post__not_in' => array( $this_post ), // Current post.

	// Set up the tax query to get posts from any of the associated taxonomies.
	'tax_query' => array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'theme',
			'field'    => 'ID',
			'terms'    => $theme_ids,
		),
		array(
			'taxonomy' => 'suitability',
			'field'    => 'ID',
			'terms'    => $suitability_ids,
		),
		array(
			'taxonomy' => 'duration',
			'field'    => 'ID',
			'terms'    => $duration_ids,
		),
	),
);

$query = new WP_Query( $args );

// If some posts match the query, show them.
if ( $query->have_posts() ) : ?>

	<aside id="related" class="spacing-bottom">
		<div class="row">
			<div class="s12 col">
				<h2 class="section-title">Similar courses</h2>
				<ul class="block-grid four-up mobile-one-up archive-list">

					<?php
					while ( $query->have_posts() ) {
						$query->the_post();

						// Get the common post archive item template.
						get_template_part( 'parts/archive-course' );
					} ?>

				</ul>
			</div>
		</div>
	</aside>

<?php
endif;

wp_reset_postdata();
