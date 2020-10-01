<?php
/**
 * Posts
 *
 * A file in which post types, taxonomies and meta fields are defined.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */




/**
 * Example function to create a custom post type
 * Creates a post type 'event'
 * All dashicons listed at https://developer.wordpress.org/resource/dashicons
 */

function tac_create_post_type() {

	register_post_type( 'event',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'events',
			),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
			),
			'menu_icon' => 'dashicons-tickets-alt',
		)
	);


	register_post_type( 'course',
		array(
			'labels' => array(
				'name' => __( 'Courses' ),
				'singular_name' => __( 'Course' ),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'courses',
			),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
			),
			'menu_icon' => 'dashicons-awards',
		)
	);
}

add_action( 'init', 'tac_create_post_type' );




/**
 * Creates taxonomies 'Phase', 'Interest' and 'Subject'.
 */

function tac_create_custom_tax() {

	// For posts.
	register_taxonomy(
		'phase',
		'post',
		array(
			'label' => __( 'Phases' ),
			'rewrite' => array(
				'slug' => 'phase',
			),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'interest',
		'post',
		array(
			'label' => __( 'Interests' ),
			'rewrite' => array(
				'slug' => 'interest',
			),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'subject',
		'post',
		array(
			'label' => __( 'Subjects' ),
			'rewrite' => array(
				'slug' => 'subject',
			),
			'hierarchical' => true,
		)
	);


	// For events.
	register_taxonomy(
		'type',
		'event',
		array(
			'label' => __( 'Type' ),
			'rewrite' => array(
				'slug' => 'event-type',
			),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'region',
		'event',
		array(
			'label' => __( 'Region' ),
			'rewrite' => array(
				'slug' => 'region',
			),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'topic',
		'event',
		array(
			'label' => __( 'Theme' ),
			'rewrite' => array(
				'slug' => 'theme',
			),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'organiser',
		'event',
		array(
			'label' => __( 'Organiser' ),
			'rewrite' => array(
				'slug' => 'organiser',
			),
			'hierarchical' => true,
		)
	);


	// For courses.
	register_taxonomy(
		'suitability',
		'course',
		array(
			'label' => __( 'Suitability' ),
			'rewrite' => array(
				'slug' => 'suitability',
			),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'theme',
		'course',
		array(
			'label' => __( 'Theme' ),
			'rewrite' => array(
				'slug' => 'theme',
			),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'duration',
		'course',
		array(
			'label' => __( 'Duration' ),
			'rewrite' => array(
				'slug' => 'duration',
			),
			'hierarchical' => true,
		)
	);
}

add_action( 'init', 'tac_create_custom_tax' );
