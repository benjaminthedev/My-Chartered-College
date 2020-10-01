<?php
/**
 * Flexible - Internal Links
 *
 * Show internal links in a fleixble content block.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="content-block content-block--cards">
	<div class="row">
		<div class="s12 col">
			<h2 class=""><?php the_sub_field( 'title' ); ?></h2>

			<?php // Check if the nested repeater field has rows of data.
			if ( have_rows( 'link' ) ) : ?>

				<ul class="downloads block-grid two-up mobile-one-up">

					<?php // Loop through the rows of data.
					while ( have_rows( 'link' ) ) : the_row(); ?>

						<li>
							<div class="item item--horizontal">
								<a href="<?php the_sub_field( 'link' ); ?>" title="Watch">
									<div class="item__image">

										<?php
										// Get the ID of the image and use it to get the alt text.
										$image_id = get_sub_field( 'image' );
										$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>

										<!-- Use the ACF helper function (documented in lib/tac-framework.setup.php to get the responsive image-->
										<img <?php tac_acf_responsive_image( get_sub_field( 'image' ),'square','1000px' ); ?>  alt="<?php echo esc_html( $image_alt ); ?>" />

									</div>
									<div class="item__content">
										<h3><?php the_sub_field( 'title' ); ?></h3>
										<p class="item__link">Visit link</p>
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
