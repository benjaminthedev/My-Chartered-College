<?php
/**
 * Share
 *
 * A fixed share panel that appears on post and article templates.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<div id="share" class="share-panel">
	<ul>
		<li><a href="#" class="fab fa-facebook-f"></a></li>
		<li><a href="#" class="fab fa-twitter"></a></li>
		<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" class="fab fa-linkedin-in"></a></li>
		<li><a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" class="fas fa-envelope" title="Share by email."></a></li>
	</ul>
</div>
