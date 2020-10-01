<?php
/**
 * Search Overlay
 *
 * The initially hidden search overlay.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<!-- The search overlay that is opened with the search button in the site header. -->
<div id="search" class="search-bar">
	<div class="row">
		<div class="s12 col">
			<a class="js-search-toggle search-bar__close">Close</a>
		</div>
	</div>
	<div class="row">
		<div class="s12 m10 offset-m1 col">
			<form role="search" method="get" class="search-form" action="<?php echo esc_html( home_url( '/' ) ); ?>">
				<span class="search-bar__screen-reader-text"><?php echo esc_html( 'Search My College', 'label' ) ?></span>
				<div class="search-form__inner">
					<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter text to search...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
					<button class="search-submit"><i class="fal fa-search"></i></button>
				</div>
			</form>
		</div>
	</div>
</div><!-- /#search. -->
