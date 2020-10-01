<?php
/**
 * Post Header - Book Reviews
 *
 * The post header for the Book Reviews category.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<header id="post-header" class="post-header">
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
	<div class="row">
		<div class="s12 m6 col" data-mh="header">
			<figure class="post-header__image item-margin-mobile">
				
				<?php
				// Get the ID of the image and use it to get the alt text.
				$image_id = get_field( 'book_cover_image' );
				$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>

				<!-- Use the ACF helper function (documented in lib/tac-framework.setup.php to get the responsive image-->
				<img <?php tac_acf_responsive_image( get_field( 'book_cover_image' ),'book','600px' ); ?>  alt="<?php echo esc_html( $image_alt ); ?>" />
			</figure>
		</div>
		<div class="s12 m5 offset-m1 col" data-mh="header">
			<div class="vertically-center">
				<h1><?php the_title(); ?></h1>

				<?php
				// Get the categories assigned to the post and show the first.
				$category = get_the_category();
				$cat = $category[0]->cat_name;
				$slug = $category[0]->slug; ?>

				<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
				<div class="post-header__meta"><span>Reviewer: </span><?php the_field( 'author' ); ?></div>
				<div class="post-header__meta"><span>Date: </span><time class="date" datetime="<?php echo the_time( 'Y-m-d' ); ?>"><?php echo the_time( 'M d, Y' ); ?></time></div>
			</div>
		</div>
	</div>
</header>
