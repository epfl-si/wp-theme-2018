<?php
/**
 * @package epfl
 */

get_header();
get_sidebar();
?>

		<main id="content" role="main" class="content pt-5">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

<?php
get_footer();
