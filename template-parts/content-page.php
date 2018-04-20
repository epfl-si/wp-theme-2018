<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package epfl
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		<!-- .entry-header -->

		<?php epfl_post_thumbnail(); ?>

		<div class="entry-content py-5 mb-4">
		<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			endif;
		?>

		</div>
		<!-- .entry-content -->
		</footer>
		<!-- .entry-footer -->
	</article>
	<!-- #post-<?php the_ID(); ?> -->