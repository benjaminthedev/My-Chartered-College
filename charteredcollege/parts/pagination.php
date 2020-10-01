<?php
/**
 * Categories - Home
 *
 * A block to show categories (series) on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Check if there's more than one page of posts and if there is, show the pagination. tac_is_paginated() is documented in functions.php.
if ( tac_is_paginated() ) : ?>

	<div id="pagination" class="pagination spacing-bottom">
		<div class="row">
			<div class="s12 col">

				<?php
				echo facetwp_display( 'pager' ); ?>

			</div>
		</div>
	</div>

<?php
endif;
