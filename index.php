<?php
/**
 * @package epfl
 */
init_globals();
get_header();

?>

<div class="nav-layout-toggle">
	<?php get_sidebar(); ?>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="mb-5">
					<?php echo(apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' )))); ?>
				</h1>

			</div>
			<aside class="col-md-4">
			<!-- categories -->
				<h3 class="h5 font-weight-normal"><?php echo esc_html__( 'Catégories', 'epfl-shortcodes' ) ?></h3>
				<?php 
				$categories = get_categories();
					foreach($categories as $category) {
						echo '<a class="tag tag-sm tag-light mr-1" href="' . get_category_link($category->term_id) . '">' . $category->name . ' ('.$category->count.')</a>';
					}
				?>
				<!-- end categories -->

				<!-- archives -->
				<h3 class="h5 font-weight-normal mt-4"><?php echo esc_html__( 'Archives', 'epfl-shortcodes' ) ?></h3>
				<?php 
				$archives = wp_get_archives([
					'type' => 'yearly',
					'show_post_count' => true,
					'format' => 'html',
					'echo' => true
				]);  
				?>
				<!-- end archives -->
			</aside>
			<main id="content" role="main" class="content col-md-8">
				<div class="list-group">
					<?php
					if (have_posts()) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'post-teaser' );
						endwhile; // End of the loop.
					else : ?>
						<h2>
							<?php echo esc_html__( 'Aucun article trouvé', 'epfl-shortcodes' ) ?>
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