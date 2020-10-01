<?php
/**
 * Flexible - Image
 *
 * Show a text area in a fleixble content block.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="content-block">
	<div class="row">
		<div class="s12 l8 offset-l2 col">

			<?php
			// Get the ID of the image and use it to get the alt text.
			$image_id = get_sub_field( 'image' );
			$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>

			<!-- Use the ACF helper function (documented in lib/tac-framework.setup.php to get the responsive image-->
			<img <?php tac_acf_responsive_image( get_sub_field( 'image' ),'post-content','1000px' ); ?>  alt="<?php echo esc_html( $image_alt ); ?>" />
		</div>
	</div>
</section>
