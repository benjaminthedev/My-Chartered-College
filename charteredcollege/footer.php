<?php
/**
 * Footer
 *
 * The template for the site footer.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

		<footer id="site-foot" class="site-foot background-navy">
			<div class="row">
				<div class="s12 m3 l6 col">
					<div class="site-foot__item">
						<img class="site-foot__logo" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/footer-logo.svg" alt="Chartered College of Teachers logo">
					</div>
				</div>
				<div class="s6 m3 l2 col">
					<nav id="supplementary" class="site-foot__item">

						<?php
						// The footer pages nav.
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'container' => false,
						) ); ?>

					</nav>
				</div>
				<div class="s6 m3 l2 col">
					<nav id="social" class="site-foot__item">

						<?php
						// The footer social nav.
						wp_nav_menu( array(
							'theme_location' => 'social',
							'container' => false,
						) ); ?>

					</nav>
				</div>
				<div class="s6 m3 l2 col">
					<div class="site-foot__item">
						<p>Pears Pavilion<br>Coram Campus<br>41 Brunswick Square<br>London<br>WC1N 1AZ</p>
						<p><a href="mailto:hello@chartered.college">hello@chartered.college</a><br>020 3433 7624</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="s12 col">
					<div class="site-foot__credit">
						<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> 
					</div>
				</div>
			</div>
		</footer>

		<?php
		// Get the schema info.
		get_template_part( 'parts/schema' );

		if ( is_user_logged_in() ) : ?>

			<script>

				<?php
				$user_id = '';
				$user_email = '';

				$user_id = get_current_user_id();
				$the_user = get_user_by( 'id', $user_id );
				$user_email = $the_user->user_email; ?>
				

				(function() { window.satismeter = window.satismeter || function() {(window.satismeter.q = window.satismeter.q || []).push(arguments);};window.satismeter.l = 1 * new Date();var script = document.createElement("script");var parent = document.getElementsByTagName("script")[0].parentNode;script.async = 1;script.src = "https://app.satismeter.com/satismeter.js";parent.appendChild(script);})();

				satismeter({
				writeKey: "JiQREHjdZhIn64QA",
				userId: "<?php echo $user_id; ?>",
				traits: {
				  email: "<?php echo $user_email; ?>",
				}
				});
			</script>

		<?php
		endif;
		
		wp_footer(); ?>

	</body>
</html>
