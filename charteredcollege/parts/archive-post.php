<?php
/**
 * Archive Post
 *
 * A part file that can be used to display individual post date inside a loop.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<div class="item post">
	<a class="border-bottom" href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">

		<?php
		// Check if the post has a featured image and display it.
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'featured' );
		endif;

		// Get the categories assigned to the post and show the first.
		$category = get_the_category();
		$cat = $category[0]->cat_name;
		$slug = $category[0]->slug; ?>

		<div class="cat cat--<?php echo esc_attr( $slug ); ?>"><?php echo esc_attr( $cat ); ?></div>
		<h2><?php the_field( 'short_title' ); ?></h2>

		<?php
		the_excerpt(); ?>

	</a>
</div>
