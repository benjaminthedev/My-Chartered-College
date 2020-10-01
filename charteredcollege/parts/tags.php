<?php
/**
 * Tags
 *
 * Shows the post tags alongside social share links. Used by single.php.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<aside id="tags" class="tags spacing-bottom">
	<div class="row">
		<div class="s12 l8 offset-l2 col">
			<h2 class="border-top spacing-top">Tagged with:</h2>

			<?php
			// Get all terms associated with the post.
			$phases = get_the_terms( $post->ID, 'phase' );
			$subjects = get_the_terms( $post->ID, 'subject' );
			$interests = get_the_terms( $post->ID, 'interest' );

			$all_terms = array_merge( $phases, $subjects, $interests );

			if ( $all_terms ) : ?>

				<ul class="tags__list">

					<?php
					// Loop through the terms.
					foreach ( $all_terms as $term ) {
						$term_url = site_url() . '/' . $term->taxonomy . '/' . $term->slug;
						echo '<li><a href="' . $term_url . '">' . $term->name . '</a></li>';
					} ?>

				</ul>

				<aside class="share">
					<div class="row">
						<div class="s12 col">
							<div class="share__inner">
								<h2>Share this article on:</h2>
								<ul class="share__buttons">
									<li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="fab fa-facebook" title="Share this article on Facebook."></a></li>
									<li><a href="http://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" class="fab fa-twitter" title="Share this article on Twitter."></a></li>
									<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" class="fab fa-linkedin" target="_blank" title="Share this article on LinkedIn."></a></li>
								</ul>
							</div>
						</div>
					</div>
				</aside>

			<?php
			endif; ?>

		</div>
	</div>
</aside>
