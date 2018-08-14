<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package epfl
 */

init_globals();
get_header();

global $containerClasses;

if (!is_front_page()) {
	get_template_part( 'template-parts/breadcrumb');
}
?>

	<div class="<?php echo $containerClasses ?>">
		<div class="w-100">
			<main id="content" role="main" class="content pt-5">
				<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; // End of the loop.
			?>
			</main>
		</div> <!-- w-100 -->

		<?php get_sidebar(); ?>
	</div> <!-- nav-toggle-layout -->

	</div> <!-- main-container -->

<?php
get_footer();