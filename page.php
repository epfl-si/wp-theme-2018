<?php
/**
 * @package epfl
 */
init_nav();
get_header();

global $navClasses;
?>
<div class="<?php echo $navClasses ?>">
	<?php get_sidebar(); ?>

	<div class="w-100">
		<?php custom_breadcrumbs(); ?>
		<main id="content" role="main" class="content pt-5">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->

	</div>
</div>

</div> <!-- main-container -->

<?php
get_footer();
