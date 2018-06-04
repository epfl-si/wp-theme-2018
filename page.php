<?php
/**
 * @package epfl
 */

function nav_toggle_body_class($classes) {
    $classes[] = 'nav-toggle';
    return $classes;
}

add_filter('body_class', 'nav_toggle_body_class');
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
