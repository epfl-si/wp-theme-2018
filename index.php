<?php
/**
 * @package epfl
 */
init_nav();
get_header();

?>

<div class="nav-toggle">
	<?php get_sidebar(); ?>

	<div class="w-100">
		<div class="container">
			<main id="content" role="main" class="content pt-5">
				<h1 class="mb-5">
				<?php echo(apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' )))); ?>
					</h1>
					<div class="news-listing">
						<?php
						if (have_posts()) :
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'post-teaser' );
							endwhile; // End of the loop.
						else : ?>
							<h2><?php echo esc_html__( 'Aucun article trouvé', 'epfl-shortcodes' ) ?></h2>
						<?php endif; ?>
					</div>
					<?php get_template_part( 'template-parts/pagination'); ?>
			</main><!-- #main -->
		</div> <!-- container -->
	</div><!-- w-100 -->
</div><!-- nav-toggle -->
	
<?php
get_footer();
