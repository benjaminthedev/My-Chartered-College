<?php
/**
 * Share
 *
 * Sharing buttons. Used by single.php.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<aside id="share" class="share spacing-both">
	<div class="row">
		<div class="s12 l8 offset-l2 col">
			<div class="share__inner border-top border-bottom">
				<ul class="share__buttons">
					<li><h2>Share:</h2></li>
					<li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="fab fa-facebook" title="Share this article on Facebook."></a></li>
					<li><a href="http://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" class="fab fa-twitter" title="Share this article on Twitter."></a></li>
					<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" class="fab fa-linkedin" target="_blank" title="Share this article on LinkedIn."></a></li>
				</ul>
			</div>
		</div>
	</div>
</aside>
