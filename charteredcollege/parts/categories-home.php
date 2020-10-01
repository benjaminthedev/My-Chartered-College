<?php
/**
 * Categories - Home
 *
 * A block to show categories (series) on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<nav id="categories" class="spacing-both background-yellow">
	<div class="row">
		<div class="s12 col">
			<h2 class="section-title section-title--no-underline">Categories</h2>

			<?php
			// Set up a query to get an ordered list of all categories.
			$cat_args = array(
				'orderby' => 'name',
				'order' => 'ASC',
			);

			$categories = get_categories( $cat_args ); ?>

			<ul class="block-grid category-grid three-up mobile-two-up">

				<?php
				// Show the categories in a list.
				foreach ( $categories as $category ) { ?>

					<li>

						<?php
						// Get the slug of the current category and use it to apply a category class to the container that defines colour scheme.
						$slug = $category->slug; ?>

						<div class="category category--<?php echo esc_attr( $slug ); ?> background-white" data-mh="category">
							<a class="text-padding" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
								<h2><?php echo esc_attr( $category->name ); ?></h2>
								<p><?php echo category_description( $category->term_id ); ?></p>
							</a>
						</div>
					</li>
					
				<?php
				} ?>

			</ul>
		</div>
	</div>
</nav><!-- / #categories. -->
