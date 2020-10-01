<?php
/**
 * Content Course
 *
 * Template part for displaying article content in single-course.php
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
					<h2>Course information</h2>

					<?php
					the_content(); ?>

					<h2>Course details</h2>
					<dl class="event-details">
						<dt data-mh="event-details">Course start date</dt>
						<dd data-mh="event-details"><?php the_field( 'course_date' ); ?></dd>
						<dt data-mh="event-details">Course duration</dt>
						<dd data-mh="event-details">

							<?php
							$terms = wp_get_object_terms( $post->ID,  'duration' );
							if ( ! empty( $terms ) ) :
								if ( ! is_wp_error( $terms ) ) :
									foreach( $terms as $term ) :
										echo '<span>' . esc_html( $term->name ) . '</span>'; 
									endforeach;
								endif;
							endif; ?>

						</dd>
						<dt data-mh="event-details">Enrolment</dt>
						<dd data-mh="event-details">

							<?php
							$emrolment = get_field( 'course_is_open' );

							if ( $emrolment ) :
								$message = 'Open';
							else :
								$message = 'Closed';
							endif; ?>

							<span><?php echo esc_attr( $message ); ?></span>
						</dd>
						<dt data-mh="event-details">Suitable for</dt>
						<dd data-mh="event-details">

							<?php
							$terms = wp_get_object_terms( $post->ID,  'suitability' );
							if ( ! empty( $terms ) ) :
								if ( ! is_wp_error( $terms ) ) :
									foreach( $terms as $term ) :
										echo '<span>' . esc_html( $term->name ) . '</span>'; 
									endforeach;
								endif;
							endif; ?>

						</dd>
					</dl>
				</div>

				<div class="s12 l4 offset-l1 col" data-mh="event-col">
					<div class="ticket-link text-padding background-grey">
						
						<?php
						$emrolment = get_field( 'course_is_open' );

						if ( $emrolment ) : ?>

							<h2>Enrol now</h2>
							<p>Secure your place on the next course run.</p>
							<a class="button" href="<?php the_field( 'course_registration_link' ); ?>" target="_blank">Register</a>
						
						<?php
						else : ?>

							<h2>Log in to course</h2>
							<p>Log in to continue your online learning.</p>
							<a class="button" href="<?php the_field( 'course_registration_link' ); ?>" target="_blank">Login</a>

						<?php
						endif; ?>

					</div>
				</div>

			</div>
		</div><!-- End of first content block. -->

	</article><!-- /#post-(ID). -->

<?php
endif;
