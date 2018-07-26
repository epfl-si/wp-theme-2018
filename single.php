<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package epfl
 */

init_nav();
get_header();
get_sidebar();
?>

<main id="content" role="main" class="content pt-5">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
</main>

<?php
get_sidebar();
get_footer();
