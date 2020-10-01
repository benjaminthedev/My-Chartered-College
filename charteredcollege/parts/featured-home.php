<?php
/**
 * Featured - Home
 *
 * A block to show featured content on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section id="featured" class="featured spacing-top">
	<div class="row">
		<div class="s12 m8 offset-m2 col">
			<div class="featured__intro align-center spacing-bottom">

				<?php
				the_content(); ?>

				<a class="button" href="<?php echo site_url(); ?>/resources/covid-19-support/">COVID-19 support</a>
			</div>
		</div>
	</div>
	<div class="background-half-navy">
		<div class="row">
			<div class="s12 m8 col">

				<?php
				// Get the post object for the associated project.
				$post_object = get_field( 'home_featured_1' );

				if ( $post_object ) :

					// Set up the post object data.
					$post = $post_object;
					setup_postdata( $post ); ?>

					<article class="item item--featured item--dark-bg">
						<a href="<?php the_permalink(); ?>">
							<div class="item__image" data-mh="item-image">

								<?php
								// Check if the post has a featured image and display it.
								if ( has_post_thumbnail() ) :
									the_post_thumbnail( 'featured' );
								endif; ?>

							</div>

							<?php
							// Get the categories assigned to the post and show the first.
							$category = get_the_category();
							$cat = $category[0]->cat_name;
							$slug = $category[0]->slug; ?>

							<div class="featured-inner">
								<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
								<h2><?php the_title(); ?></h2>
								<p class="item__link">Read Article</p>
							</div>
						</a>
					</article>

					<?php
					// Reset post data ready for the next article.
					wp_reset_postdata();

				endif; ?>

			</div>
			<div class="s12 m4 col">

				<?php
				// Get the post object for the associated project.
				$post_object = get_field( 'home_featured_2' );

				if ( $post_object ) :

					// Set up the post object data.
					$post = $post_object;
					setup_postdata( $post ); ?>

					<article class="item item--featured item--dark-bg">
						<a href="<?php the_permalink(); ?>">

							<div class="item__image" data-mh="item-image">

								<?php
								// Check if the post has a featured image and display it.
								if ( has_post_thumbnail() ) :
									the_post_thumbnail( 'featured' );
								endif; ?>

							</div>

							<?php
							// Get the categories assigned to the post and show the first.
							$category = get_the_category();
							$cat = $category[0]->cat_name;
							$slug = $category[0]->slug; ?>

							<div class="featured-inner">
								<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
								<h2><?php the_field( 'short_title' ); ?></h2>
								<p class="item__link">Read Article</p>
							</div>
						</a>
					</article>

					<?php
					// Reset post data ready for the next article.
					wp_reset_postdata();

				endif; ?>

			</div>
		</div>
		<div class="row">
			<div class="s12 col">
				<div class="spacing-top border-bottom"></div>
			</div>
		</div>
	</div>
</section><!-- /#featured. -->
