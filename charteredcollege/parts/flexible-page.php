<?php
/**
 * Flexible Page
 *
 * Allows additional content blocks in pages.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Check if the flexible content field has rows of data.
if ( have_rows( 'content_blocks_page' ) ) :

	// Loop through the rows of data and display the correct block.
	while ( have_rows( 'content_blocks_page' ) ) : the_row();

		if ( get_row_layout() === 'text_block' ) :

			get_template_part( 'parts/flexible/text-block' );

		elseif ( get_row_layout() === 'quote_block' ) :

			get_template_part( 'parts/flexible/quote-block' );

		elseif ( get_row_layout() === 'image_block' ) :

			get_template_part( 'parts/flexible/two-image-block' );

		endif;

	endwhile;

endif;
