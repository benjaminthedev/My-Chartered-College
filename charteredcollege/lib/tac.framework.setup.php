<?php
/**
 * Setup
 *
 * A file in which setup and optimisation of the WP CMS is done
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */





/**
 * Add support for post thumbnails
 */
add_theme_support( 'post-thumbnails' );




/**
 * Add support for post title tags
 */
function tac_theme_slug_setup() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'tac_theme_slug_setup' );




/**
 * Remove the toolbar
 */
add_filter( 'show_admin_bar', '__return_false' );




/**
 * Add HTML5 support in search form
 */
function tac_after_setup_theme() {
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'tac_after_setup_theme' );




/**
 * Remove dashboard widgets that aren't needed
 */
function tac_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
}
add_action( 'wp_dashboard_setup', 'tac_remove_dashboard_widgets' );




/**
 * Remove meta boxes on post editor screens that aren't needed
 */
function remove_extra_meta_boxes() {
	remove_meta_box( 'postcustom' , 'post' , 'normal' ); // custom fields for posts.
	remove_meta_box( 'revisionsdiv' , 'post' , 'normal' ); // custom fields for posts.
	remove_meta_box( 'postcustom' , 'page' , 'normal' ); // custom fields for pages.
	remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); // recent comments for pages.
	remove_meta_box( 'tagsdiv-post_tag' , 'page' , 'side' ); // page tags.
	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' ); // post trackbacks.
	remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' ); // page trackbacks.
	remove_meta_box( 'slugdiv', 'post', 'normal' ); // post slug.
	remove_meta_box( 'slugdiv', 'page', 'normal' ); // page slug.
}
add_action( 'admin_menu' , 'remove_extra_meta_boxes' );




/**
 * Remove dashboard menu items that aren't needed
 */
function tac_remove_menus() {
	global $menu;
	$restricted = array( __( 'Links' ),__( 'Comments' ) );
	end( $menu );
	while ( prev( $menu ) ) {
		$value = explode( ' ', $menu[ key( $menu ) ] [0] );
		if ( in_array( $value[0] !== null?$value[0] : '' , $restricted ) ) {
			unset( $menu[ key( $menu ) ] );
		}
	}
}
add_action( 'admin_menu', 'tac_remove_menus' );




/**
 * Move the Yoast SEO box to the bottom of the page editor screen.
 */
function tac_yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'tac_yoasttobottom' );




/**
 * Clean the script tag for enqueued scripts (i.e. remove type="text/javascript" etc)
 *
 * @param string $tag is the script tag.
 * @param string $handle is the handle.
 */
function tac_tidy_scrip_tag( $tag, $handle ) {
	return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

add_filter( 'style_loader_tag', 'tac_tidy_scrip_tag', 10, 2 );
add_filter( 'script_loader_tag', 'tac_tidy_scrip_tag', 10, 2 );




/**
 * Remove support for post tags
 */
function myprefix_unregister_tags() {
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}

add_action( 'init', 'myprefix_unregister_tags' );




/**
 * Move the SEO box to the bottom of the page editor screen.
 */
function tac_seo_metabox_priority() {
	// Accepts 'high', 'default', 'low'. Default is 'high'.
	return 'low';
}

add_filter( 'the_seo_framework_metabox_priority', 'tac_seo_metabox_priority' );




/**
 * Set up a custom meta field to count post views.
 *
 * @param string $post_id is the post ID of the current post.
 */
function tac_set_post_views( $post_id ) {

	// Set up the meta field.
	$count_key = 'tac_post_views_count';
	$count = get_post_meta( $post_id, $count_key, true );

	// If the meta field doesn't exist set it up and set the count to 0.
	if ( '' === $count ) :
		$count = 0;
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '0' );
	else :
		// If the post already has the field, increase the value each time it is viewed.
		$count++;
		update_post_meta( $post_id, $count_key, $count );
	endif;
}

// To keep the count accurate, lets get rid of prefetching.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );




/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar).
 * @param string $image_size the size of the thumbnail image or custom image size.
 * @param string $max_width the max width this image will be shown to build the sizes attribute.
 */
function tac_acf_responsive_image( $image_id, $image_size, $max_width ) {

	// Check the image ID is not blank.
	if ( '' !== $image_id ) {

		// Set the default src image size.
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// Set the srcset with various image sizes.
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// Generate the markup for the responsive image.
		echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
	}
}




/**
 * Add an ACF options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}




/**
 * Add a flexible container around embedded iframes.
 *
 * @param string $html is the embed iframe code.
 * @param string $url is the iframe URL.
 * @param string $attr is the attributes.
 * @param string $post_id is the current post id.
 */
function tac_oembed_filter( $html, $url, $attr, $post_id ) {
	$return = '<figure class="flexible-container item-margin">' . $html . '</figure>';
	return $return;
}

add_filter( 'embed_oembed_html', 'tac_oembed_filter', 10, 4 );




/**
 * Remove the last link in breadcrumbs. WHY? Because it an span tag that contains the title of the page. But you're already on the page, so what's the point?
 */

function tac_wpseo_breadcrumb_links( $links ) {

	if ( sizeof($links) > 1 ) {
		array_pop($links);
	}

	return $links;
}

add_filter( 'wpseo_breadcrumb_links', 'tac_wpseo_breadcrumb_links' );




/**
 * Add link to the last item in the breadcrumbs. Since we removed in the function above, we need to add the link back in. 
 */

function tac_link_to_last_crumb( $output, $crumb){          

	$output = '<a property="v:title" rel="v:url" class="thisLink" href="'. $crumb['url']. '" >';
	$output.= $crumb['text'];
	$output.= '</a>';

	return $output;
}

add_filter( 'wpseo_breadcrumb_single_link', 'tac_link_to_last_crumb' , 10, 2); 




/**
 * Override the breadcrumb trail on main archive pages so that 'Our Series' or 'Our Events' appears as appropriate.
 */
function tac_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_home() || is_singular( 'post' ) || is_archive() ) :

    	if ( 'event' == get_post_type() ) :

	        $breadcrumb[] = array(
	            'url' => get_permalink( get_post_type_archive_link( 'event' ) ),
	            'text' => 'Our Events',
	        );

	        array_splice( $links, 1, -2, $breadcrumb );

	    elseif ( 'course' == get_post_type() ) :

	    	$breadcrumb[] = array(
	            'url' => get_permalink( get_post_type_archive_link( 'course' ) ),
	            'text' => 'Our Learning',
	        );

	        array_splice( $links, 1, -2, $breadcrumb );

	    else :

	       		$breadcrumb[] = array(
	            'url' => get_permalink( get_option( 'page_for_posts' ) ),
	            'text' => 'Our Series',
	        );

	        array_splice( $links, 1, -2, $breadcrumb );
	    endif;
    endif;

    return $links;
}

add_filter( 'wpseo_breadcrumb_links', 'tac_override_yoast_breadcrumb_trail' );




// Remove empty <p> tags outputted in the_content().
function tac_remove_empty_p( $content ){
	// Clean up p tags around block elements.
	$content = preg_replace( array(
		'#<p>\s*<(div|aside|section|article|header|footer)#',
		'#</(div|aside|section|article|header|footer)>\s*</p>#',
		'#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
		'#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
		'#<p>\s*</(div|aside|section|article|header|footer)#',
	), array(
		'<$1',
		'</$1>',
		'</$1>',
		'<$1$2>',
		'</$1',
	), $content );

	return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)?(\s|&nbsp;)*</p>#i', '', $content);
}

add_filter( 'the_content', 'tac_remove_empty_p', 20, 1 );




// Remove empty <p> tags outputted by ACF fields.
function tac_acf_load_value( $value, $post_id, $field ) {
	$content = apply_filters('the_content',$value);
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s| )+</p>\s?~', '', $content );

	return $content;
}

add_filter( 'acf/load_value/type=wysiwyg', 'tac_acf_load_value', 10, 3 );
