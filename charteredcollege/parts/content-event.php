<?php
/**
 * Content Event
 *
 * Template part for displaying article content in single-event.php
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

$is_premium = get_field( 'event_is_private' );

if ( ( '1' === $is_premium ) && ( ! is_user_logged_in() ) ) :

	get_template_part( 'parts/sign-up' ); 

else : ?>

	<article id="post-<?php the_ID(); ?>">

		<!-- The first content block. -->
		<div id="first" class="content-block text-block spacing-top">
			<div class="row">
				<div class="s12 l7 col" data-mh="event-col">
					<h2>Event information</h2>

					<?php
					the_content(); ?>

					<?php // Check if there are any links.
					if ( have_rows( 'event_related_content' ) ) : ?>
						
						<h2>Interested in content on this theme?</h2>
						<ul>

							<?php
							// Loop through the rows of data.
							while ( have_rows( 'event_related_content' ) ) : the_row(); ?>

								<li>

									<?php
									$link_type = get_sub_field( 'link_type' );

									if ( $link_type ) : ?>

										<a href="<?php the_sub_field( 'link_external' ); ?>" target="_blank"><?php the_sub_field( 'title' ); ?> (external link)</a>

									<?php
									else : ?>

										<a href="<?php the_sub_field( 'link_internal' ); ?>" target="_blank"><?php the_sub_field( 'title' ); ?></a>

									<?php
									endif; ?>

								</li>

							<?php
							endwhile; ?>

						</ul>


					<?php
					endif;

					// Get the values set for the organiser custom tax.
					$terms = wp_get_object_terms( $post->ID,  'organiser' );
					if ( ! empty( $terms ) ) :
						if ( ! is_wp_error( $terms ) ) :
							foreach( $terms as $term ) :
								$organiser = '<span>' . esc_html( $term->name ) . '</span>'; 
							endforeach;
						endif;
					endif; ?>

					<h2>Event details</h2>
					<dl class="event-details">
						<dt data-mh="event-details">Event date</dt>
						<dd data-mh="event-details"><?php the_field( 'event_date' ); ?></dd>
						<dt data-mh="event-details">Event time</dt>
						<dd data-mh="event-details"><?php the_field( 'event_time' ); ?> - <?php the_field( 'event_end_time' ); ?></dd>
						<dt data-mh="event-details">Event location</dt>
						<dd data-mh="event-details"><?php the_field( 'event_location' ); ?></dd>

						<?php
						// Only show the organiser details if they've been set.
						if ( isset( $organiser ) ) : ?>

							<dt data-mh="event-details">Event organiser</dt>
							<dd data-mh="event-details"><?php echo $organiser; ?></dd>

						<?php
						endif; ?>

					</dl>

					<h2>Map</h2>

					<?php
					// Get the ACF Google Map.
					get_template_part( 'parts/event-map' ); ?>

				</div>

				<?php
				// Show the ticket button if there's a ticket link.
				$has_ticket_link = get_field( 'event_ticket_link' );

				if ( $has_ticket_link ) : ?>

					<div class="s12 l4 offset-l1 col" data-mh="event-col">
						<div class="ticket-link text-padding background-grey">
							<h2>Tickets</h2>
							<p>Use the link below to buy a ticket for this event.</p>
							<a class="button" href="<?php the_field( 'event_ticket_link' ); ?>" target="_blank">Buy a ticket</a>
						</div>
					</div>

				<?php
				endif; ?>

			</div>
		</div><!-- End of first content block. -->

	</article><!-- /#post-(ID). -->

<?php
endif;
