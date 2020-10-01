<?php
/**
 * Header
 *
 * The template for the site header. Displays everything up to the main content.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
		wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<!-- Site overlay to darken and block main content when pushy menu is open. -->
		<div class="site-overlay"></div>

		<!-- Start mobile navigation, which is initially concealed. -->
		<nav id="mobile-navigation" class="mobile-nav pushy pushy-right">
			<div class="row">
				<div class="s12 col">
					<a class="menu-btn menu-close fal fa-times"></a>

					<?php
					wp_nav_menu( array(
						'theme_location' => 'mobile',
						'container' => false,
					) ); ?>
				</div>
			</div>
		</nav><!-- /#mobile-navigation. -->

		<!-- Start site header. -->
		<header id="masthead" class="site-head">
			<div class="row">
				<div class="s5 l3 col">
					<!-- <a href="<?php //echo esc_html( home_url() ); ?>"> -->
					<a href="https://my.chartered.college/">
						<img class="site-head__logo" src="<?php echo esc_html( get_stylesheet_directory_uri() ); ?>/img/logo.svg" alt="<?php bloginfo( 'name' );?>">
					</a>
				</div>
				<div class="l6 hide-for-medium-down col">

					<!-- Start main nav. -->
					<nav id="main-nav" class="main-nav">

						<?php
						wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => false,
						) ); ?>

					</nav><!-- /#main-nav. -->

				</div>
				<div class="s7 l3 col">

					<!-- Start the supplementary nav. -->
					<nav id="supplementary-nav" class="main-nav main-nav--supplementary">
						<a class="menu-btn menu-open far fa-bars site-control"></a>

						<?php
						// Check if the user is signed in and show appropriate buttons.
						if ( is_user_logged_in() ) : ?>
							<a class="far fa-sign-out site-control" href="https://my.chartered.college/wp/wp-login.php?action=logout" title="Sign out of My College."></a>
							<a class="far fa-user site-control" href="https://members.chartered.college/account/edit" target="_blank" title="View/edit My Account."></a>
						<?php
						else : ?>
							<a class="far fa-sign-in site-control" href="<?php echo wp_login_url( get_permalink() ); ?>" title="Sign in to My College."></a>
						<?php
						endif; ?>

						<a class="js-search-toggle far fa-search site-control" title="Search My College."></a>

					</nav><!-- /#supplementary-nav. -->
				</div>
			</div>
		</header><!-- /#masthead. -->

		<?php
		// The initially hidden full screen search overlay.
		get_template_part( 'parts/search-overlay' ); ?>
