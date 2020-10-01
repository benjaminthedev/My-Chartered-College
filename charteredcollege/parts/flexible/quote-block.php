<?php
/**
 * Flexible - Quote
 *
 * Show a text area in a fleixble content block.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="content-block">
	<div class="row">
		<div class="s12 l8 offset-l2 col">
			<blockquote>
			
				<?php
				the_sub_field( 'quote' );

				$has_cite = get_sub_field( 'quote_source' );

				if ( $has_cite ) : ?>

					<cite><?php the_sub_field( 'quote_source' ); ?></cite>

				<?php
				endif ?>

			</blockquote>
		</div>
	</div>
</section>
