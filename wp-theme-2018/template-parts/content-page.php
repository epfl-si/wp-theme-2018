<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package epfl
 */

$content = $post->post_content;

$regex1 = '/\[epfl_hero/';
$regex2 = '/\<!--\swp:epfl\/hero/';
$has_hero = preg_match($regex1, $content) > 0 || preg_match($regex2, $content) > 0;
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		$currentTemplate = get_page_template_slug();
		if ($currentTemplate != 'page-homepage.php' and !$has_hero):
		?>
			<header class="entry-header container-grid">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
		<?php endif ?>

		<?php
		$content_spacing_classes = $has_hero || $currentTemplate == 'page-homepage.php' ? 'pb-5 mb-4 ' : 'pb-5 pt-3 mb-4 '; ?>

		<div class="entry-content container-grid <?php echo $content_spacing_classes; ?>">
			<?php
					@the_content();
			?>

		</div> <!-- .entry-content -->
	</article>
	<!-- #post-<?php the_ID(); ?> -->
