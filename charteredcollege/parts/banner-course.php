<?php
/**
 * Banner - Course
 *
 * The banner for individual courses.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// The user can upload multiple banner images, so get these from an ACF gallery array.
$background = get_field( 'archive_banners', 'option' );

// We only want to display one background image, so randomly select one from the array.
$rand = array_rand( $background, 1 ); ?>

<header id="banner" class="banner border-bottom spacing-both" style="background-image:url(<?php echo esc_url( $background[ $rand ]['sizes']['banner-full'] ); ?>);">
	
	<div class="breadcrumbs">
		<div class="row">
			<div class="s12 col">

				<?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				} ?>

			</div>
		</div>
	</div>

	<div class="banner__content">
		<div class="row">
			<div class="s12 l8 col">
				<?php
					$terms = wp_get_object_terms( $post->ID,  'theme' );
					if ( ! empty( $terms ) ) :
						if ( ! is_wp_error( $terms ) ) :
							echo '<span class="sub-title">';
								foreach( $terms as $term ) :
									echo '<span>' . esc_html( $term->name ) . '</span>'; 
								endforeach;
							echo '</span>';
						endif;
					endif; ?>
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</header>
