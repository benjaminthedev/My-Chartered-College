<?php
/**
 * Flexible - Downloads
 *
 * Show a text area in a fleixble content block.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="content-block content-block--cards">
	<div class="row">
		<div class="s12 l8 offset-l2 col">
			<h2 class=""><?php the_sub_field( 'title' ); ?></h2>

			<?php // Check if the nested repeater field has rows of data.
			if ( have_rows( 'downloads' ) ) : ?>

				<ul class="downloads block-grid two-up">

					<?php // Loop through the rows of data.
					while ( have_rows( 'downloads' ) ) : the_row(); ?>

						<li>
							<div class="download background-grey">
								<a class="text-padding" href="<?php the_sub_field( 'file' ); ?>" target="_blank" data-mh="download">
									<h3><?php the_sub_field( 'title' ); ?></h3>
									<div class="download__inner">
										<span class="far fa-file-download"></span>
									</div>
								</a>
							</div>
						</li>

					<?php
					endwhile; ?>

				</ul>

			<?php
			endif; ?>

		</div>
	</div>
</section>
