<?php
/**
 * Impact - Home
 *
 * Links to Impact Journal articles. Used by front-page.php.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section id="impact-journal" class="single-link spacing-bottom">
	<div class="row">
		<div class="s12 col">
			<div class="single-link__image" data-mh="impact">

				<?php
				// Get the ID of the image and use it to get the alt text.
				$image_id = get_field( 'home_impact_image' );
				$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>

				<!-- Use the ACF helper function (documented in lib/tac-framework.setup.php to get the responsive image-->
				<img <?php tac_acf_responsive_image( get_field( 'home_impact_image' ),'square','1000px' ); ?>  alt="<?php echo esc_html( $image_alt ); ?>" />
			</div>
			<div class="single-link__content align-center" data-mh="impact">
				<div class="vertically-center vertically-center--not-on-mobile">
					<span class="cat color-navy">Impact Journal</span>
					<h2><?php the_field( 'home_impact_title' ); ?></h2>
					<a class="button button--secondary" href="https://impact.chartered.college/" target="_blank">Visit Impact</a>
				</div>
			</div>
		</div>
	</div>
</section>
