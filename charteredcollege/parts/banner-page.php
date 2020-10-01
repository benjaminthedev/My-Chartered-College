<?php
/**
 * Banner - Page
 *
 * The banner for individual category pages.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

// Get the background image that is associated with the current page.
$bg = get_field( 'banner_background' ); ?>

<header id="banner" class="banner border-bottom spacing-both" style="background-image:url(<?php echo esc_url( $bg ); ?>);">
	
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
				<span class="sub-title"><?php the_title(); ?></span>
				<h1><?php the_field( 'banner_title' ); ?></h1>
			</div>
		</div>
	</div>
</header>
