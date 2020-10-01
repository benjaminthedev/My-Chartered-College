<?php
/**
 * 404
 *
 * The default 404 template used in the theme.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>

<main id="main" class="site-main">
	
	<?php
	// The user can upload multiple banner images, so get these from an ACF gallery array.
	$background = get_field( 'archive_banners', 'option' );

	// We only want to display one background image, so randomly select one from the array.
	$rand = array_rand( $background, 1 ); ?>

	<header id="banner" class="banner border-bottom spacing-both" style="background-image:url(<?php echo esc_url( $background[ $rand ]['sizes']['banner-full'] ); ?>);">
		<div class="banner__content">
			<div class="row">
				<div class="s12 m7 col">
					<span class="sub-title">Error 404</span>
					<h1>Sorry, the content you tried to access could not be found</h1>
				</div>
			</div>
		</div>
	</header>
	
	<!-- The first content block. -->
	<div id="first" class="text-block spacing-both">
		<div class="row">
			<div class="s12 m3 col">
				<h2>Error 404</h2>
			</div>
			<div class="s12 m7 col">
				<p>The page may have been moved or the link you followed might be out of date.</p>
				<p>To help you find what you are looking for, you can:</p>
				<ul>
					<li>Return to our <a href="<?php echo esc_url( site_url() ); ?>">home page</a></li>
					<li>Find out about <a href="<?php echo esc_url( site_url() ); ?>/about/">My College</a></li>
					<li>See <a href="<?php echo esc_url( site_url() ); ?>/our-series/">our series</a></li>
					<li>Return to the main <a href="https://chartered.college/">Chartered College website</a></li>
				</ul>
				<p>Alternatively, you can use the search form below to help you find articles relevant to you.</p>
			</div>
		</div>
	</div><!-- End of first content block. -->

	<aside id="search" class="text-block spacing-bottom">
		<div class="row">
			<div class="s12 m3 col">
				<h2>Search</h2>
			</div>
			<div class="s12 m9 col">

				<?php
				get_search_form(); ?>

			</div>
		</div>
	</aside>

<?php
get_footer();
