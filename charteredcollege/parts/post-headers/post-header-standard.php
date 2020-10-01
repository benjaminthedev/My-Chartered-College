<?php
/**
 * Post Header - Compact Guides
 *
 * The post header for the Research Digests category.
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
		<div class="row">
			<div class="s12 col">
				<figure class="post-header__image spacing-top">
					
					<?php
					the_post_thumbnail( 'banner-full' ); ?>

				</figure>
			</div>
		</div>
	</div>

	<?php
	get_template_part( 'parts/share' ); ?>
	
</header>

