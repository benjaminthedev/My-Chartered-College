<?php
/**
 * Queries
 *
 * A file in which any manipulation of queries is done.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */




/**
 * Example function to customise query
 * First if statement does nothing
 * Second if statement sets posts per page to 9 if the page is a post archive
 *
 * @param array $query is the WP query.
 */
function tac_customise_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( is_post_type_archive( 'post' ) ) {
		$query->set( 'posts_per_page', 12 );
		return;
	}

	// If we're showing events, show them in order of 'event_date' meta field and don't show past events.
	if ( is_post_type_archive( 'event' ) || 'event' === get_post_type() || is_tax() ) {

		$query->set( 'meta_key', 'event_date' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'ASC' );

		// Get today's date.
		$today = date( 'Ymd' );

		// Compare the 'event_date' field to today's date and only show events that are >= today, i.e. in the future.
		$date_query = array(
			'key'     => 'event_date',
			'value'   => $today,
			'compare' => '>=',
		);

		$query->set( 'meta_query', $date_query );
		return;
	}


	// If we're showing courses, show them in order of 'course_date' meta field and don't show past events.
	if ( is_post_type_archive( 'course' ) || 'course' === get_post_type() ) {

		$query->set( 'meta_key', 'course_date' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'ASC' );

		// Get today's date.
		$today = date( 'Ymd' );

	}
}

add_action( 'pre_get_posts', 'tac_customise_query', 1 );
