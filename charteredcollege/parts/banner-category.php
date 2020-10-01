<?php
/**
 * Banner - Category
 *
 * The banner for individual category pages.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Get the current category.
$term = get_queried_object();

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
				<span class="sub-title"><?php echo esc_attr( $term->name ); ?></span>

				<?php
				if ( is_category() ) : ?>

					<h1><?php echo category_description(); ?></h1>

				<?php
				else : ?>

					<h1>The archive page for all posts tagged as <?php echo esc_attr( $term->name ); ?></h1>

				<?php
				endif; ?>

			</div>
		</div>
	</div>
</header>
