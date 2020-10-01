<?php
/**
 * Utilities
 *
 * Various minor tweaks that help with the development process.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */




/**
 * Simple wrapper for native get_template_part()
 * Allows you to pass in an array of parts and output them in your theme
 * e.g. <?php get_template_parts(array('part-1', 'part-2')); ?>
 *
 * @param array $parts for template parts.
 */
function get_template_parts( $parts = array() ) {
	foreach ( $parts as $part ) {
		get_template_part( $part );
	};
}




/**
 * Get the category id from a category name
 *
 * @param string $cat_name for the category name.
 */
function get_category_id( $cat_name ) {
	$term = vip_get_term_by( 'name', $cat_name, 'category' );
	return $term->term_id;
}
