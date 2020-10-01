<?php
/**
 * References
 *
 * Shows a repeating set of references. Used by single.php.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Check if the nested repeater field has rows of data.
if ( have_rows( 'references' ) ) : ?>

	<div id="references" class="references spacing-bottom">
		<div class="row">
			<div class="s12 m8 offset-m2 col">
				<h2>References</h2>
				<ol class="references__list">

					<?php // Loop through the rows of data.
					while ( have_rows( 'references' ) ) : the_row(); ?>

						<li>

							<?php
							// Check if this reference has a link associated with it.
							$has_link = get_sub_field( 'reference_link' );

							// If the reference has a link, wrap the text in it.
							if ( $has_link ) : ?>

								<a href="<?php the_sub_field( 'reference_link' ); ?>" target="_blank"><?php the_sub_field( 'reference_text' ); ?></a>

							<?php
							// Otherwise just show text.
							else :
								the_sub_field( 'reference_text' );
							endif; ?>

						</li>

					<?php
					endwhile; ?>

				</ul>
			</div>
		</div>
	</div>

<?php
endif;