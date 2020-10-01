<?php
/**
 * Archive Course
 *
 * A part file that can be used to display individual post date inside a loop.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<div class="item item--event">
	<a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">

		<?php
		// Check if the post has a featured image and display it.
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'featured' );
		endif; ?>

		<div class="item__inner text-padding" data-mh="event">
			<div>
			
				<?php
				$terms = wp_get_object_terms( $post->ID,  'theme' );
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
				the_field( 'course_short_description' ); ?>

			</div>

			<div class="item__meta border-top">
				<p><i class="far fa-calendar" alt="Calendar icon."></i><?php the_field( 'course_date' ); ?></p>
				
				<?php
				$terms = wp_get_object_terms( $post->ID,  'duration' );
				if ( ! empty( $terms ) ) :
					if ( ! is_wp_error( $terms ) ) :
						echo '<p><i class="far fa-hourglass-half" alt="Hourglass icon."></i>';
							foreach( $terms as $term ) :
								echo '<span>' . esc_html( $term->name ) . '</span>'; 
							endforeach;
						echo '</p>';
					endif;
				endif; ?>

				<?php
				// Check if the course if open.
				$is_open = get_field( 'course_is_open' );

				if ( $is_open ) : ?>

					<p><i class="far fa-file-signature" alt="Sign up icon."></i>Open for registration</p>

				<?php
				else : ?>

					<p><i class="far fa-file-times" alt="Sign up closed icon."></i>Closed for registration</p>

				<?php
				endif;

				// Get suitability.
				$terms = wp_get_object_terms( $post->ID,  'suitability' );
				if ( ! empty( $terms ) ) :
					if ( ! is_wp_error( $terms ) ) :
						echo '<p><i class="far fa-user" alt="User icon."></i>Suitable for: ';
							foreach( $terms as $term ) :
								echo '<span>' . esc_html( $term->name ) . '</span>'; 
							endforeach;
						echo '</p>';
					endif;
				endif; ?>

			</div>
		</div>

	</a>
</div>
