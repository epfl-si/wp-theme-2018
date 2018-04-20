<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container">
		<div class="site-info">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				// printf( esc_html__( 'Theme: %1$s', 'epfl' ), '<b>Epfl</b>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
