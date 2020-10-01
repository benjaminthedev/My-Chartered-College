<?php
/**
 * Wakelet - Home
 *
 * A block to promote up to four Wakelet links on the home page.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section id="wakelet" class="spacing-bottom">
	<div class="row">
		<div class="s12 col">
			<h2 class="section-title">Wakelet</h2>

			<?php // Check if the nested repeater field has rows of data.
			if ( have_rows( 'home_wakelet_links', 2 ) ) : ?>

				<ul class="block-grid four-up mobile-one-up">

					<?php // Loop through the rows of data.
					while ( have_rows( 'home_wakelet_links', 2 ) ) : the_row(); ?>

						<li>
							<div class="item">
								<a href="<?php the_sub_field( 'link' ); ?>" target="_blank">

									<?php
									// Get the ID of the image and use it to get the alt text.
									$image_id = get_sub_field( 'image' );
									$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>

									<!-- Use the ACF helper function (documented in lib/tac-framework.setup.php to get the responsive image-->
									<img <?php tac_acf_responsive_image( get_sub_field( 'image' ),'featured','600px' ); ?>  alt="<?php echo esc_html( $image_alt ); ?>" />
									<span class="cat color-pink"><?php the_sub_field( 'date' ); ?></span>
									<h3><?php the_sub_field( 'title' ); ?></h3>
									<p class="item__link">Visit Link</p>
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
