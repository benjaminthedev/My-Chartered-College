<?php
/**
 * Banner - Index
 *
 * The banner for the main blog index.
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
				if ( 'post' == get_post_type() ) : ?>

					<span class="sub-title">Our Series</span>
					<h1><?php the_field( 'main_index_introduction', 'option' ) ?></h1>

				<?php
				elseif ( 'event' == get_post_type() ) :

					if ( is_tax( 'type', 'chartered-college-events' ) ) : ?>

						<span class="sub-title">Our Events</span>
						<h1><?php the_field( 'events_introduction_internal', 'option' ) ?></h1>

					<?php
					else : ?>

						<span class="sub-title">Our Events</span>
						<h1><?php the_field( 'events_introduction', 'option' ) ?></h1>

					<?php
					endif;
					
				else : ?>

					<span class="sub-title">Our Learning</span>
					<h1><?php the_field( 'courses_introduction', 'option' ) ?></h1>

				<?php
				endif; ?>

			</div>
		</div>
	</div>
</header>
