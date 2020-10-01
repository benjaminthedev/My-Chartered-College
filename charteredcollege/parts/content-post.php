<?php
/**
 * Content Post
 *
 * Template part for displaying article content in single.php
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<article id="post-<?php the_ID(); ?>">

	<?php
	if ( in_category( 'book-reviews' ) ) : ?>

		<!-- Specific to Book Reviews. -->
		<div id="book-info" class="content-block text-block">
			<div class="row">
				<div class="s12 m8 offset-m2 col">
					<h2 class="book-intro"><?php the_field( 'book_intro' ); ?></h2>
					<div class="book-info">
						<div class="book-info__item">
							<span class="book-info__title">Title: </span>
							<span class="book-info__data"><?php the_field( 'book_title' ); ?></span>
						</div>
						<div class="book-info__item">
							<span class="book-info__title">Author/Editor: </span>
							<span class="book-info__data"><?php the_field( 'book_author' ); ?></span>
						</div>
						<div class="book-info__item">
							<span class="book-info__title">Publication date: </span>
							<span class="book-info__data"><?php the_field( 'book_publication_date' ); ?></span>
						</div>

						<?php
						$has_link = get_field( 'book_link' );

						if ( $has_link ) : ?>

							<div class="book-info__item">
								<span class="book-info__title">Publisher: </span>
								<span class="book-info__data"><a href="<?php the_field( 'book_link' ); ?>" target="_blank"><?php the_field( 'book_publisher' ); ?> <span class="far fa-external-link"></span></a></span>
							</div>

						<?php
						else : ?>

							<div class="book-info__item">
								<span class="book-info__title">Publisher: </span>
								<span class="book-info__data"><?php the_field( 'book_publisher' ); ?></span>
							</div>

						<?php
						endif; ?>

					</div>
				</div>
			</div>
		</div><!-- End of first content block. -->

	<?php
	endif;

	// If this article is premium content and the user is not logged in, redirect them to the sign in page, otherwise show the article.
	if ( hide_content() ) :
		get_template_part( 'parts/sign-up' );
	else : ?>
	
		<!-- The first content block. -->
		<div id="first" class="content-block text-block">
			<div class="row">
				<div class="s12 l8 offset-l2 col">
					<h2><?php the_field( 'sub_title' ); ?></h2>

					<?php
					the_content(); ?>

				</div>
			</div>
		</div><!-- End of first content block. -->

		<?php
		// If this article uses flexible content blocks, let's get them.
		get_template_part( 'parts/flexible', 'post' );

	endif; ?>

</article><!-- /#post-(ID). -->
