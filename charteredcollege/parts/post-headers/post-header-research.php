<?php
/**
 * Post Header - Research Digests
 *
 * The post header for the Research Digests category.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<header id="post-header" class="post-header post-header--research spacing-top">
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
				the_post_thumbnail( 'banner-square' ); ?>

			</figure>
		</div>
		<div class="s12 m5 offset-m1 col" data-mh="header">
			<div class="vertically-center vertically-center--not-on-mobile">
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
	</div>

	<?php
	get_template_part( 'parts/share' ); ?>
	
</header>

