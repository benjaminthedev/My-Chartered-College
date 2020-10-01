<?php
/**
 * Archive
 *
 * The default archive template used in the theme.
 * Page titles are displayed dependent on the type of archive being shown.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

get_header(); ?>

	<main id="main" class="site-main">

		<?php
		if ( 'post' === get_post_type() ) :

			// Get the category banner.
			get_template_part( 'parts/banner', 'category' );

		else :

			// If it's an event, get the main archive banner.
			get_template_part( 'parts/banner', 'index' );

		endif; ?>

		<div class="archive">

			<?php
			if ( 'post' === get_post_type() ) :

				// Get the post filter.
				get_template_part( 'parts/filter', 'posts' );

			elseif ( 'event' === get_post_type() ) :

				// Get the post filter.
				get_template_part( 'parts/filter', 'events' );

			else :

				// Get the post filter.
				get_template_part( 'parts/filter', 'courses' );

			endif;
			
			if ( 'event' == get_post_type() ) : ?>

				<!-- Offer the user the change to show/hide external events. -->
				<div id="event-list-type" class="event-list-type">
					<div class="row">
						<div class="s12 col">
							<div class="event-list-type__inner">

								<?php
								// If it's the CCoT events only archive, show a link to include external events.
								if ( is_tax( 'type', 'chartered-college-events' ) ) : ?>

									<h2>Want to also see external events that may be of interest?</h2>
									<a class="button" href="<?php echo site_url(); ?>/events/">View external events</a>
									

								<?php
								// Otherwise include a link to show only CCoT events.
								else : ?>

									<h2>Want to only see events organised by The Chartered College and our member-led networks?</h2>
									<a class="button" href="<?php echo site_url(); ?>/event-type/chartered-college-events/">Only view our events</a>

								<?php
								endif; ?>
									
							</div>
						</div>
					</div>
				</div><!-- /#event-list-type. -->

			<?php
			endif;
			
			$spacing = '';

			if ( 'event' == get_post_type() ) :
				$spacing = 'spacing-bottom';
			else :
				$spacing = 'spacing-both';
			endif; ?>
			
			<div id="posts" class="<?php echo esc_attr( $spacing ); ?> facetwp-template">
				<div class="row">
					<div class="s12 col">

						<?php
						$cols = '';

						if ( 'event' == get_post_type() ) :
							$cols = 'archive-list--events';
						endif; ?>

						<div class="archive-list <?php echo esc_attr( $cols ); ?>">

							<?php
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();

									if ( 'post' === get_post_type() ) :

										// Get the common post archive item template.
										get_template_part( 'parts/archive-post' );

									elseif ( 'event' === get_post_type() ) :

										// Get the archive part for events.
										get_template_part( 'parts/archive-event' );

									else :

										// Get the archive part for events.
										get_template_part( 'parts/archive-course' );

									endif;

								endwhile;
							endif;?>

						</ul>
					</div>
				</div>
			</div>

			<?php
			// Get the pagination.
			get_template_part( 'parts/pagination' ); ?>

		</div>
	</main>

<?php
get_footer();
