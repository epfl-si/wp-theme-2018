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
		<header class="entry-header container-grid">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>

		<?php // epfl_post_thumbnail(); ?>

		<div class="entry-content py-5 mb-4 container-grid">
			<?php
					the_content();
			?>

		</div> <!-- .entry-content -->
		</footer> <!-- .entry-footer -->
	</article>
	<!-- #post-<?php the_ID(); ?> -->