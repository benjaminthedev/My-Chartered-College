<?php
/**
 * Post Header - Member's Meet
 *
 * The post header for the Member's Meet category.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<header id="post-header" class="post-header spacing-bottom">
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
	<div class="spacing-top">
		<div class="row">
			<div class="s12 m8 offset-m2 col">
				<h1><?php the_title(); ?></h1>

				<?php
				// Get the categories assigned to the post and show the first.
				$category = get_the_category();
				$cat = $category[0]->cat_name;
				$slug = $category[0]->slug; ?>

				<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
				<div class="post-header__meta"><span>Author: </span><?php the_field( 'author' ); ?></div>
				<div class="post-header__meta"><span>Date: </span><time class="date" datetime="<?php echo the_time( 'Y-m-d' ); ?>"><?php echo the_time( 'M d, Y' ); ?></time></div>
			</div>
		</div>
</header>

<?php
// If this article is premium content and the user is not logged in, redirect them to the sign in page, otherwise show the article.
if ( ! hide_content() ) : ?>

	<!-- The video content block. -->
	<figure id="video" class="spacing-bottom">
		<div class="row">
			<div class="s12 col">
				<div class="flexible-container">
					<iframe src="<?php the_field( 'video_embed' ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</figure><!-- End of video content block. -->

<?php
endif;
