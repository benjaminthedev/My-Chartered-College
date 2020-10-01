<?php
/**
 * Archive Event
 *
 * A part file that can be used to display individual post date inside a loop.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<div class="item item--event">

	<?php
	if( has_term( 'external-events', 'type' ) ) : ?>

		<a href="<?php the_field( 'event_ticket_link' ); ?>" title="Link to <?php the_title(); ?>" target="_blank">

	<?php
	else : ?>

		<a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">

	<?php
	endif;

		// Show a tag for the event type.
		$event_type = wp_get_object_terms( $post->ID,  'type' );
		if ( ! empty( $event_type ) ) {
		    echo '<p class="item__type">' . esc_html( $event_type[0]->name ) . '</p>';   
		}

		// Check if the post has a featured image and display it.
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'featured' );
		endif; ?>

		<div class="item__inner text-padding">
			<div class="item__title">
				
				<?php
				$terms = wp_get_object_terms( $post->ID,  'topic' );
				if ( ! empty( $terms ) ) :
					if ( ! is_wp_error( $terms ) ) :
						echo '<div class="cat">';
							foreach( $terms as $term ) :
								echo '<span>' . esc_html( $term->name ) . '</span>'; 
							endforeach;
						echo '</div>';
					endif;
				endif; ?>

				<h2><?php the_title(); ?></h2>

				<?php
				// Show the organiser if it is set.
				$event_organiser = wp_get_object_terms( $post->ID,  'organiser' );
				if ( ! empty( $event_organiser ) ) :
				    echo '<h3>' . esc_html( $event_organiser[0]->name ) . '</h3>';   
				endif;

				// Show a brief description.
				the_field( 'event_short_description' ); ?>

			</div>

			<div class="item__meta border-top">
				<p><i class="far fa-calendar-alt" alt="Calendar icon."></i><?php the_field( 'event_date' ); ?></p>
				<p><i class="far fa-clock" alt="Clock icon."></i><?php the_field( 'event_time' ); ?> - <?php the_field( 'event_end_time' ); ?></p>
				<p><i class="far fa-pound-sign" alt="Pound sign icon."></i><?php the_field( 'event_price' ); ?></p>
			</div>
		</div>

	</a>

	<?php // Check if there are any links.
	if ( have_rows( 'event_related_content' ) ) : ?>
		
		<div class="item__links text-padding">
			<h4>Interested in content on this theme?</h4>

			<?php
			// Loop through the rows of data.
			while ( have_rows( 'event_related_content' ) ) : the_row(); ?>

				<div class="item__links__link">

					<?php
					$link_type = get_sub_field( 'link_type' );

					if ( $link_type ) : ?>

						<p><a href="<?php the_sub_field( 'link_external' ); ?>" target="_blank"><?php the_sub_field( 'title' ); ?> (external link)</a></p>

					<?php
					else : ?>

						<p><a href="<?php the_sub_field( 'link_internal' ); ?>" target="_blank"><?php the_sub_field( 'title' ); ?></a></p>

					<?php
					endif; ?>

				</div>

			<?php
			endwhile; ?>

		</div>

	<?php
	endif; ?>

</div>
