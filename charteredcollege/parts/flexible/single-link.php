<?php
/**
 * Flexible - Single Link
 *
 * Show a single link in a flexible content block.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="single-link spacing-bottom">
	<div class="row">
		<div class="s12 col">
			<div class="single-link__image" data-mh="impact">

				<?php
				// Get the ID of the image and use it to get the alt text.
				$image_id = get_sub_field( 'image' );
				$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>

				<!-- Use the ACF helper function (documented in lib/tac-framework.setup.php to get the responsive image-->
				<img <?php tac_acf_responsive_image( get_sub_field( 'image' ),'square','1000px' ); ?>  alt="<?php echo esc_html( $image_alt ); ?>" />
			</div>
			<div class="single-link__content align-center" data-mh="impact">
				<div class="vertically-center vertically-center--not-on-mobile">
					<span class="cat color-navy"><?php the_sub_field( 'subtitle' ); ?></span>
					<h2><?php the_sub_field( 'title' ); ?></h2>

					<?php
					// Allow both internal and external links.
					$is_external = get_sub_field( 'make_external_link' );

					if ( $is_external ) :
						$link = get_sub_field( 'link_external' );
					else :
						$link = get_sub_field( 'link' );
					endif; ?>

					<a class="button button--secondary" href="<?php echo esc_url( $link ); ?>" target="_blank"><?php the_sub_field( 'link_text' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
