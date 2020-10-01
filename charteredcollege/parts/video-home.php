<?php
/**
 * Featured Videos - Home
 *
 * A block to show featured videos on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<div id="video" class="spacing-both">
	<div class="row">
		<div class="s12 col">
			<h2 class="section-title">Featured Videos</h2>
		</div>
	</div>
	<div class="row">
		<div class="s12 m6 col">

			<?php
			// Get the post object for each featured video.
			$post_object = get_field( 'home_video_1' );

			if ( $post_object ) :

				// Set up the post object data.
				$post = $post_object;
				setup_postdata( $post ); ?>

				<article id="post-<?php the_ID(); ?>" class="item item--video">
					<a href="<?php the_permalink(); ?>" title="Watch <?php the_title(); ?>">
						<div class="item__image">
							<div class="item__play">
								<i class="fas fa-play"></i>
							</div>

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

						<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
						<h3><?php the_field( 'short_title' ); ?></h3>
						<p class="item__link">Watch Video</p>
					</a>
				</article>

				<?php
				// Reset post data ready for the next article.
				wp_reset_postdata();

			endif; ?>

		</div>
		<div class="s12 m6 col">

			<?php
			// Get the post object for each featured video.
			$post_object = get_field( 'home_video_2' );

			if ( $post_object ) :

				// Set up the post object data.
				$post = $post_object;
				setup_postdata( $post ); ?>

				<article id="post-<?php the_ID(); ?>" class="item item--video">
					<a href="<?php the_permalink(); ?>" title="Watch <?php the_title(); ?>">
						<div class="item__image">
							<div class="item__play">
								<i class="fas fa-play"></i>
							</div>

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

						<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
						<h3><?php the_field( 'short_title' ); ?></h3>
						<p class="item__link">Watch Video</p>
					</a>
				</article>

				<?php
				// Reset post data ready for the next article.
				wp_reset_postdata();

			endif; ?>

		</div>
	</div>
</div><!-- / #featured-video. -->
