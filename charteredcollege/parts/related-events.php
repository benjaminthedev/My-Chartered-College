<?php
/**
 * Related Events
 *
 * Show a set of events related to the current one.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Get the IDs of the subjects related to this post.
$regions = wp_get_post_terms( $post->ID, 'region' );
$region_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $regions as $region ) {
	$region_ids[] = $region->term_id;
}

// Get the IDs of the interests related to this post.
$topics = wp_get_post_terms( $post->ID, 'topic' );
$topic_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $topics as $topic ) {
	$topic_ids[] = $topic->term_id;
}

// Get the IDs of the phases related to this post.
$organisers = wp_get_post_terms( $post->ID, 'organiser' );
$organiser_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $organisers as $organiser ) {
	$organiser_ids[] = $organiser->term_id;
}

// Get the ID of the current post so we can exclude it from our query.
$this_post = $post->ID;

// Set up the query.
$args = array(
	'post_type' => 'event',
	'post_status' => 'publish',
	'posts_per_page' => 4,
	'post__not_in' => array( $this_post ), // Current post.

	// Set up the tax query to get posts from any of the associated taxonomies.
	'tax_query' => array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'region',
			'field'    => 'ID',
			'terms'    => $region_ids,
		),
		array(
			'taxonomy' => 'topic',
			'field'    => 'ID',
			'terms'    => $topic_ids,
		),
		array(
			'taxonomy' => 'organiser',
			'field'    => 'ID',
			'terms'    => $organiser_ids,
		),
	),
);

$query = new WP_Query( $args );

// If some posts match the query, show them.
if ( $query->have_posts() ) : ?>

	<aside id="related" class="spacing-bottom">
		<div class="row">
			<div class="s12 col">
				<h2 class="section-title">Related events</h2>
				<ul class="block-grid four-up mobile-one-up archive-list">

					<?php
					while ( $query->have_posts() ) {
						$query->the_post();

						// Get the common post archive item template.
						get_template_part( 'parts/archive-event' );
					} ?>

				</ul>
			</div>
		</div>
	</aside>

<?php
endif;

wp_reset_postdata();
