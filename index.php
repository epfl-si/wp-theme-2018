<?php
/**
 * @package epfl
 */
init_nav();
get_header();
get_sidebar();
?>

		<main id="content" role="main" class="content pt-5">
			<div class="container">

			<h1 class="mb-5">
			<?php echo(apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' )))); ?>
				</h1>
				<div class="news-listing">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'post-teaser' );
					endwhile; // End of the loop.
					?>
				</div>
				<?php get_template_part( 'template-parts/pagination'); ?>
			</div>
		</main><!-- #main -->
<?php
get_footer();
