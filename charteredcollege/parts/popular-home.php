<?php
/**
 * Popular - Home
 *
 * A block to show popular content on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section id="popular" class="popular background-navy spacing-top-small spacing-bottom">
	<div class="row">
		<div class="s8 col">
			<h2 class="section-title color-white">Popular</h2>
		</div>
		<div class="s4 col">
			<a class="button float-right" href="<?php echo site_url(); ?>/resources/">All Resources</a>
		</div>
	</div>

	<?php
	// Set up a query that get the most popular post on the site based on a post count meta field - see lib/tac.framework.setup.php.
	$query = new WP_Query(
		array(
			'posts_per_page' => 2,
			'meta_key' => 'tac_post_views_count',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
		)
	); ?>

	<div class="row">

		<?php
		while ( $query->have_posts() ) : $query->the_post();

			// Get the ID of this post so we don't include it in the other popular post tabs.
			$id = get_the_ID(); ?>

			<div class="s12 m4 col">
				<article class="item item--dark-bg">
					<a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">

						<?php
						// Check if the post has a featured image and display it.
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'featured' );
						endif;

						// Get the categories assigned to the post and show the first.
						$category = get_the_category();
						$cat = $category[0]->cat_name;
						$slug = $category[0]->slug; ?>

						<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
						<h2><?php the_field( 'short_title' ); ?></h2>
						<p class="item__link">Read Article</p>
						
					</a>
				</article><!-- /#post-(ID). -->
			</div>

		<?php
		endwhile;

		// Reset post data ready for the next article.
		wp_reset_postdata(); ?>

		<div class="s12 m4 col">

			<?php
			// Set up a query that gets the three most popular posts in the literacy subject - exlucing the most popular post on the site.
			$query = new WP_Query(
				array(
					'posts_per_page' => 3,
					'offset' => 3,
					'meta_key' => 'tac_post_views_count',
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
				)
			);

			while ( $query->have_posts() ) : $query->the_post(); ?>

				<article class="item item--dark-bg item--top-padding border-top">
					<a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">

						<?php
						// Get the categories assigned to the post and show the first.
						$category = get_the_category();
						$cat = $category[0]->cat_name;
						$slug = $category[0]->slug; ?>

						<div class="item__content">
							<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
							<h2><?php the_field( 'short_title' ); ?></h2>
						</div>
					</a>
				</article><!-- /#post-(ID). -->

			<?php
			endwhile;

			// Reset post data ready for the next article.
			wp_reset_postdata(); ?>
			
		</div>
	</div>
</section><!-- /#popular. -->
