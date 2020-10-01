<?php
/**
 * Flexible - Text
 *
 * Show a text area in a fleixble content block.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<section class="content-block text-block">
	<div class="row">
		<div class="s12 l8 offset-l2 col">
			<h2 class=""><?php the_sub_field( 'title' ); ?></h2>
			
			<?php
			the_sub_field( 'text' ); ?>

		</div>
	</div>
</section>
