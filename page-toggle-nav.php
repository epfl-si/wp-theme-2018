<?php
/**
 * @package epfl
 * Template Name: Menu caché
 * Template Post Type: page
 */

init_nav();
get_header();
get_sidebar();
?>
		<main id="content" role="main" class="content pt-5">
			<?php custom_breadcrumbs(); ?>
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

<?php
get_footer();
