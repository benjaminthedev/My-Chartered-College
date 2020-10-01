<?php
/**
 * Banner - Search
 *
 * The banner for the search results pages.
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
				<span class="sub-title">Search results</span>
				<h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
			</div>
		</div>
	</div>
</header>
