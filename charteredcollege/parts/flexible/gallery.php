<?php
/**
 * Flexible - Gallery
 *
 * Template part for showing an image gallery in a fleixble layout.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="content-block">
	<div class="row">
		<div class="s12 m8 offset-m2 col">
			<h2><?php the_sub_field( 'title' ); ?></h2>

			<?php
			// Get the images.
			$images = get_sub_field( 'images' );

			// Define thumbnail and full sizes.
			$size_thumb = 'thumbnail';
			$size_full = 'full';

			if ( $images ) : ?>

				<!-- Set up the featherlight gallery attributes. -->
			    <ul class="block-grid three-up mobile-two-up" data-featherlight-gallery data-featherlight-filter="a">

			        <?php
					foreach ( $images as $image ) :

						// Get the URL of the full image and set up a link to it.
						$url = wp_get_attachment_url( $image['ID'] ); ?>

			            <li>
			            	<a href="<?php echo esc_url( $url ); ?>">
			            		
			            		<?php
			            		// Show the thumbnail version of the image.
			            		echo wp_get_attachment_image( $image['ID'], $size_thumb ); ?>
			            		<p class="gallery__caption"><?php echo esc_attr( $image['caption'] ); ?></p>
			            	</a>
			            </li>

			        <?php
			    	endforeach; ?>

			    </ul>
			
			<?php
			endif; ?>

		</div>
	</div>
</section>
