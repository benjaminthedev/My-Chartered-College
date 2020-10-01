<?php
/**
 * Category Listing
 *
 * Shows all article categories in an item grid - used in index.php.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section id="categories" class="block spacing-top spacing-bottom-small">
	<div class="row">
		<div class="s12 col">
			<h2>Resource Categories</h2>

			<?php
			// Set up a query to get an ordered list of all categories.
			$cat_args = array(
				'orderby' => 'name',
				'order' => 'ASC',
				'exclude' => array('79','3','1'),
			);

			$categories = get_categories( $cat_args ); ?>

			<ul class="block-grid three-up mobile-one-up">

				<?php
				// Show the categories in a list.
				foreach ( $categories as $category ) { ?>

					<li>

						<?php
						$slug = $category->slug; ?>

						<div class="item">
							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">

								<?php
								$term_id = $category->term_id;
								// Get the ID of the image and use it to get the alt text.
								$image_id = get_field( 'category_img', 'term_' . $term_id );
								$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>

								<!-- Use the ACF helper function (documented in lib/tac-framework.setup.php to get the responsive image-->
								<img <?php tac_acf_responsive_image( get_field( 'category_img', 'term_' . $term_id ), 'featured', '600px' ); ?>  alt="<?php echo esc_html( $image_alt ); ?>" />

								<h3><?php echo esc_attr( $category->name ); ?></h3>
								<p><?php echo category_description( $category->term_id ); ?></p>
							</a>
						</div>
					</li>
					
				<?php
				} ?>

			</ul>

		</div>
	</div>
</section>
