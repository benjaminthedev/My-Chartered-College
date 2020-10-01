<?php
/**
 * Related
 *
 * Template part for displaying article content in single.php
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Get the IDs of the subjects related to this post.
$subjects = wp_get_post_terms( $post->ID, 'subject' );
$subject_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $subjects as $subject ) {
	$subject_ids[] = $subject->term_id;
}

// Get the IDs of the interests related to this post.
$interests = wp_get_post_terms( $post->ID, 'interest' );
$interest_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $interests as $interest ) {
	$interest_ids[] = $interest->term_id;
}

// Get the IDs of the phases related to this post.
$phases = wp_get_post_terms( $post->ID, 'phase' );
$phase_ids = [];

// Loop through and add the IDs to an array to use in our query.
foreach ( $phases as $phase ) {
	$phase_ids[] = $phase->term_id;
}

// Get the ID of the current post so we can exclude it from our query.
$this_post = $post->ID;

// Set up the query.
$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'post__not_in' => array( $this_post ), // Current post.

	// Set up the tax query to get posts from any of the associated taxonomies.
	'tax_query' => array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'subject',
			'field'    => 'ID',
			'terms'    => $subject_ids,
		),
		array(
			'taxonomy' => 'interest',
			'field'    => 'ID',
			'terms'    => $interest_ids,
		),
		array(
			'taxonomy' => 'phase',
			'field'    => 'ID',
			'terms'    => $phase_ids,
		),
	),
);

$query = new WP_Query( $args );

// If some posts match the query, show them.
if ( $query->have_posts() ) : ?>

	<aside id="related" class="spacing-bottom">
		<div class="row">
			<div class="s12 col">
				<h2 class="section-title">Related articles</h2>
				<ul class="block-grid three-up mobile-one-up archive-list">

					<?php
					while ( $query->have_posts() ) {
						$query->the_post();

						// Get the common post archive item template.
						get_template_part( 'parts/archive-post' );
					} ?>

				</ul>
			</div>
		</div>
	</aside>

<?php
endif;

wp_reset_postdata();
