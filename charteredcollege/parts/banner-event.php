<?php
/**
 * Banner - Event
 *
 * The banner for individual events.
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
				<span class="sub-title"><?php the_field( 'event_date' ); ?>, <?php the_field( 'event_time' ); ?>, <?php the_field( 'event_location' ); ?></span>
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</header>
