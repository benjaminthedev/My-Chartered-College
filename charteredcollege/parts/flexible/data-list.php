<?php
/**
 * Flexible - Accordion
 *
 * Show a data list in a fleixble content block.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="content-block content-block--cards">
	<div class="row">
		<div class="s12 m8 offset-m2 col">
			<h2 class=""><?php the_sub_field( 'title' ); ?></h2>

			<?php // Check if the nested repeater field has rows of data.
			if ( have_rows( 'item' ) ) : ?>

				<dl class="js-accordion accordion">

					<?php // Loop through the rows of data.
					while ( have_rows( 'item' ) ) : the_row(); ?>

						<dt><a href="#"><?php the_sub_field( 'title' ); ?> <i class="far fa-chevron-down"></i></a></dt>
						<dd>
							<div class="accordion__content">
								
								<?php
								the_sub_field( 'content' ); ?>
								
							</div>
						</dd>

					<?php
					endwhile; ?>

				</dl>

			<?php
			endif; ?>

		</div>
	</div>
</section>
