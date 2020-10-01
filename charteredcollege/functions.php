<?php
/**
 * Functions
 *
 * The theme functions file.
 * This file links to four files in the lib directors that should be removed if necessary.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

/**
 * Include files from the lib directory
 */
require_once( 'lib/tac.framework.posts.php' );
require_once( 'lib/tac.framework.setup.php' );
require_once( 'lib/tac.framework.queries.php' );
require_once( 'lib/tac.framework.utilities.php' );


/**
 * Enqueue CSS
 * Main CSS file and fontawesome
 */
function tac_css_enqueuer() {
	wp_register_style( 'tac_main', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'tac_main' );
	wp_register_style( 'tac_typekit', 'https://use.typekit.net/gfa4snp.css' );
	wp_enqueue_style( 'tac_typekit' );
	wp_register_style( 'tac_cookie_css', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css' );
	wp_enqueue_style( 'tac_cookie_css' );
}
add_action( 'wp_enqueue_scripts', 'tac_css_enqueuer' );


/**
 * Enqueue JS
 */
function tac_script_enqueuer() {
	if ( ! is_admin() ) {
		// Modernizr.
		wp_register_script( 'tac_modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr.js', array( 'jquery' ) );
		wp_enqueue_script( 'tac_modernizr' );
		// Cookies.
		wp_register_script( 'tac_cookie_js', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'tac_cookie_js' );
		// Site.
		wp_register_script( 'tac_main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'tac_main' );

		wp_register_script( 'customJS', get_stylesheet_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
		wp_enqueue_script( 'customJS' );
	};
}
add_action( 'wp_enqueue_scripts', 'tac_script_enqueuer' );


/**
 * Add a Google Map API Key for use with ACF.
 */
function tac_acf_init() {
	
	acf_update_setting( 'google_api_key', 'AIzaSyAE4q2hyOSsa5rpPQWQ17xSoWtZpVLbkBc' );
}

add_action( 'acf/init', 'tac_acf_init' );


/**
 * Include favicons and touch icons
 * Only include favicon png and max size apple-touch-icon as per HTML5 Boilerplate
 */
function tac_add_favicon() {
	?>
	<link rel="shortcut icon" href="<?php echo esc_html( get_stylesheet_directory_uri() ); ?>/img/favicon.png"/>
	<link rel="apple-touch-icon" href="<?php echo esc_html( get_stylesheet_directory_uri() ); ?>/img/apple-touch-icon.png">
<?php
}

add_action( 'wp_head' , 'tac_add_favicon' );

/**
 * Create a widget area
 */
function tac_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Widget Area' ),
		'id' => 'widget-area',
		'description' => __( 'The widget area' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'tac_widgets_init' );


/**
 * Register menus
 * Main and Mobile
 */
register_nav_menus( array(
	'main' => 'Main Navigation',
	'supplementary' => 'Supplementary Navigation',
	'mobile' => 'Mobile Navigation',
	'footer' => 'Footer Navigation',
	'social' => 'Social Navigation',
) );


/**
 * Image sizes
 */
add_image_size( 'banner-full', 1280, 600, true );
add_image_size( 'banner-square', 800, 800, true );
add_image_size( 'banner-portrait', 800, 1100, true );
add_image_size( 'featured', 400, 300, true );
add_image_size( 'featured-small', 300, 200, true );
add_image_size( 'featured-large', 800, 600, true );
add_image_size( 'square', 800, 700, true );
add_image_size( 'video', 1000, 750, true );
add_image_size( 'post-content', 1000, 9999, false );
add_image_size( 'book', 600, 9999, false );


/**
 * Remove <p> tags from term descriptions.
 */
remove_filter( 'term_description', 'wpautop' );


/**
 * Custom excerpt length.
 *
 * @param name $length is excerpt length.
 */
function tac_custom_excerpt_length( $length ) {
	return 15;
}

add_filter( 'excerpt_length', 'tac_custom_excerpt_length', 999 );


/**
 * Customise the excerpt text.
 *
 * @param name $more is the text that immediately follows the excerpt.
 */
function tac_new_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'tac_new_excerpt_more' );


/**
 * Check if more than one page of posts exists
 */
function tac_is_paginated() {
	global $wp_query;
	return ( $wp_query->max_num_pages > 1 );
}


/**
 * Redirect to platform logout when user logs out of WordPress
 */
function tac_auto_redirect_external_after_logout() {
	wp_redirect( 'https://members.chartered.college/saml/logout' );
	exit();
}

add_action( 'wp_logout', 'tac_auto_redirect_external_after_logout' );




/**
 * Redirect external events to the event archive as they should never be viewed.
 */

function tac_page_template_redirect() {
    if ( ( is_singular( 'event' ) ) && has_term( 'external-events', 'type' ) ) {
        $url = site_url( '/events' );
        wp_safe_redirect( $url, 301 );
        exit();
    }
}
add_action( 'template_redirect', 'tac_page_template_redirect' );


//* Add Logged In/Out class to <body> with WordPress
add_filter( 'body_class', 'login_status_body_class' );
function login_status_body_class( $classes ) {
	
  if (is_user_logged_in()) {
    $classes[] = 'logged-in';
  } else {
    $classes[] = 'logged-out';
  }
  return $classes;
	
}
