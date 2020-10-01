<?php
/**
 * Search form
 *
 * The template for displaying a search form.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<form role="search" method="get" class="search-again" action="<?php echo esc_html( home_url( '/' ) ); ?>">
	<input type="search" class="search-again__field" placeholder="<?php echo esc_attr_x( 'e.g. Latest events...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'e.g. Enter terms to search...', 'label' ) ?>" />
	<input type="submit" class="search-again__submit" value="Search" />
</form>
