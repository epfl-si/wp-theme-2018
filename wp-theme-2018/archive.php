<?php
/**
 * @package epfl
 */
init_globals();
get_header();

?>

	<div class="nav-toggle-layout">
		<?php get_sidebar(); ?>

		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php the_archive_title( '<h1>', '</h1>' ); ?>
				</div>

				<aside class="col-md-3  mt-5">
					<?php get_template_part( 'template-parts/categories', 'list' ) ?>
					<?php get_template_part( 'template-parts/archives', 'list' ) ?>
				</aside>

				<main id="content" role="main" class="content col-md-9  mt-5">
					<div class="list-group">
						<?php
					if (have_posts()) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'post-teaser' );
						endwhile; // End of the loop.
					else : ?>
							<h2>
								<?php esc_html_e( 'No article found', 'epfl' ) ?>
							</h2>
							<?php endif; ?>
					</div>
					<?php get_template_part( 'template-parts/pagination'); ?>
				</main>
			</div>
			<!-- container -->
		</div>
		<!-- row -->
	</div>
	<!-- nav-toggle -->

	<?php
get_footer();
