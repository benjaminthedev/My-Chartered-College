<?php
/**
 * Search
 *
 * The template for displaying search results.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>

<main id="main" class="site-main">

	<?php
	// Get the banner.
	get_template_part( 'parts/banner', 'search' ); ?>

	<section id="search-results" class="search-results spacing-both">
		<div class="row">
			<div class="s12 m8 offset-m2 col">

				<?php
				// If there are some search results, show them.
				if ( have_posts() ) : ?>
		
					<?php
					// Get the number of search results and show it to the user.
					global $wp_query;
					$results = $wp_query->found_posts; ?>

					<h2 class="search-results__sub-title">Your search results</h2>
					<p class="search-results__count"><?php echo esc_attr( $results ); ?> results found</h2>

					<?php
					while ( have_posts() ) : the_post(); ?>

						<!-- Start post. -->
						<div id="post-<?php echo esc_attr( $post->ID ); ?>" class="search-results__item border-bottom">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							
							<?php
							the_excerpt(); ?>

							<p><a href="<?php the_permalink(); ?>">Read more &rarr;</a></p>
						</div><!-- /#post-(ID). -->

					<?php
					endwhile;

				else : ?>

					<!-- Start no results found. -->
					<div id="no-results" class="text-block text-block--first spacing-bottom">
						<p>No results found for '<?php echo get_search_query(); ?>'</p>
					</div><!-- /#no-results. -->

				<?php
				endif; ?>

			</div>
		</div>
	</section><!-- /#page-content. -->

	<?php
	// Show the pagination.
	get_template_part( 'parts/pagination' ); ?>
				
</main><!-- /#main. -->

<?php
get_footer();
