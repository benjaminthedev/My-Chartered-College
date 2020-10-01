<?php
/**
 * Content Page
 *
 * Template part for displaying article content in page.php
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="spacing-top">

	<?php
	// If this article is premium content and the user is not logged in, redirect them to the sign in page, otherwise show the article.
	if ( hide_content() ) :
		get_template_part( 'parts/sign-up' );
	else : ?>
	
		<!-- The first content block. -->
		<div id="first" class="text-block spacing-bottom">
			<div class="row">
				<div class="s12 l8 offset-l2 col">
					<h2><?php the_field( 'page_sub_title' ); ?></h2>

					<?php
					the_content(); ?>

				</div>
			</div>
		</div><!-- End of first content block. -->

		<?php
		// If we're on the resources page, show a list of all categories (excluding the ones shown in more detail below).
		if ( is_page( 'resources' ) ) :
			get_template_part( 'parts/categories' );
		endif;
		
		// If this article uses flexible content blocks, let's get them.
		get_template_part( 'parts/flexible', 'post' );

	endif; ?>

</article><!-- /#post-(ID). -->
