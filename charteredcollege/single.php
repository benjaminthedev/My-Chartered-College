<?php
/**
 * Page
 *
 * The template for single posts.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>

<main id="main" class="site-main">

	<?php
	while ( have_posts() ) : the_post();

		// Update the post views count. See the function in lib/tac.framework.setup.php for more info on how the post counts work.
		tac_set_post_views( get_the_ID() );


		// There's several post headers, each one unique to a category. Get the relevant post header for this post.
		if ( has_category( 'research-reviews' ) || has_category( 'research-digests' ) ) :
			get_template_part( 'parts/post-headers/post-header-research' );
		elseif ( has_category( 'book-reviews' ) ) :
			get_template_part( 'parts/post-headers/post-header-book-reviews' );
		elseif ( has_category( 'video-resources' ) ) :
			get_template_part( 'parts/post-headers/post-header-video' );
		else :
			get_template_part( 'parts/post-headers/post-header-standard' );
		endif;
		

		// Get the relevant template part to display the content.
		get_template_part( 'parts/content', 'post' );

		// Get the references block, if used.
		get_template_part( 'parts/references' );

		// Get the related posts.
		get_template_part( 'parts/related' );

	endwhile; ?>

</main>

<?php
get_footer();
