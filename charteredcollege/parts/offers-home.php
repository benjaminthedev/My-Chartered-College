<?php
/**
 * Offers - Home
 *
 * A block to promote up to three member offers on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

if ( is_user_logged_in() ) : ?>

	<section id="offers" class="offers spacing-both">
		<div class="row">
			<div class="s12 col">
				<h2 class="section-title color-white">Member Offers</h2>

				<?php // Check if the nested repeater field has rows of data.
				if ( have_rows( 'home_offer_links', 2 ) ) : ?>

					<ul class="block-grid four-up mobile-one-up">

						<?php // Loop through the rows of data.
						while ( have_rows( 'home_offer_links', 2 ) ) : the_row(); ?>

							<li>
								<div class="item item--offer">
									<a href="<?php the_sub_field( 'link' ); ?>" target="_blank">
										<span class="item__offer"><?php the_sub_field( 'offer' ); ?></span>
										<div class="item__inner text-padding background-white" data-mh="offer">
											<h3><?php the_sub_field( 'title' ); ?></h3>

											<?php
											the_sub_field( 'description' ); ?>

											<p class="item__link">Get Offer</p>
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

<?php
endif;
