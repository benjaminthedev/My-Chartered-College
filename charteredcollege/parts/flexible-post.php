<?php
/**
 * Flexible Content
 *
 * Allows additional content blocks in posts.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Check if the flexible content field has rows of data.
if ( have_rows( 'content_blocks' ) ) :

	// Loop through the rows of data and display the correct block.
	while ( have_rows( 'content_blocks' ) ) : the_row();

		if ( get_row_layout() === 'text_block' ) :

			get_template_part( 'parts/flexible/text-block' );

		elseif ( get_row_layout() === 'quote_block' ) :

			get_template_part( 'parts/flexible/quote-block' );

		elseif ( get_row_layout() === 'image_block' ) :

			get_template_part( 'parts/flexible/image-block' );

		elseif ( get_row_layout() === 'download_block' ) :

			get_template_part( 'parts/flexible/download-block' );

		elseif ( get_row_layout() === 'gallery' ) :

			get_template_part( 'parts/flexible/gallery' );

		elseif ( get_row_layout() === 'videos' ) :

			get_template_part( 'parts/flexible/videos' );

		elseif ( get_row_layout() === 'single_link' ) :

			get_template_part( 'parts/flexible/single-link' );

		elseif ( get_row_layout() === 'external_links' ) :

			get_template_part( 'parts/flexible/external-links' );

		elseif ( get_row_layout() === 'internal_links' ) :

			get_template_part( 'parts/flexible/internal-links' );

		elseif ( get_row_layout() === 'data_list' ) :

			get_template_part( 'parts/flexible/data-list' );

		endif;

	endwhile;

endif;
