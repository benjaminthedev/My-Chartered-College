<?php
/**
 * Don't Miss - Home
 *
 * A block to promote up to six popular articles on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section id="dont-miss" class="spacing-bottom-small">
	<div class="row">
		<div class="s12 col">
			<h2 class="section-title">Don't Miss</h2>

			<?php // Check if the nested repeater field has rows of data.
			if ( have_rows( 'dont_miss_articles', 2 ) ) : ?>

				<ul class="block-grid three-up mobile-one-up">

					<?php // Loop through the rows of data.
					while ( have_rows( 'dont_miss_articles', 2 ) ) : the_row(); ?>

						<?php
						// Get the post object for each don't miss article.
						$post_object = get_sub_field( 'article', 2 );

						if ( $post_object ) :

							// Set up the post object data.
							$post = $post_object;
							setup_postdata( $post ); ?>

							<li>
								<article class="item item--with-date">
									<a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">
										<div class="item__date border-right" data-mh="item">
											<!-- Show the data/time in a large number, small month format. -->
											<time class="date" datetime="<?php echo the_time( 'Y-m-d' ); ?>"><span class="date__day"><?php the_time( 'j' ); ?></span><span class="date__month"><?php the_time( 'M' ); ?></span></time>
										</div>
										<div class="item__content" data-mh="item">

											<?php
											// Get the categories assigned to the post and show the first.
											$category = get_the_category();
											$cat = $category[0]->cat_name;
											$slug = $category[0]->slug; ?>

											<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
											<h3><?php the_field( 'short_title' ); ?></h3>

											<?php
											the_excerpt(); ?>

										</div>
									</a>
								</article>
							</li>

							<?php
							// Reset post data ready for the next article.
							wp_reset_postdata();

						endif;

					endwhile; ?>

				</ul>

			<?php
			endif; ?>

		</div>
	</div>
</section>
