<?php
/**
 * @package epfl
 */
init_globals();
get_header();

global $containerClasses;
global $mainClasses;

if (!is_front_page()) {
	get_template_part( 'template-parts/breadcrumb');
}
?>

<div class="<?php echo $containerClasses ?>">
	<div class="w-100">
		<main id="content" role="main" class="content <?php echo $mainClasses ?>">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div> <!-- w-100 -->
	<?php get_sidebar(); ?>
</div> <!-- nav-toggle-layout -->

</div> <!-- main-container -->

<?php
get_footer();
