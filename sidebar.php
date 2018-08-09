<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

global $post;

// to display correctly the menu on level 1 pages, we need to add '.current-menu-parent' to the wrapper
$classes = '';
if ( $post->post_parent === 0 ) $classes = 'current-menu-ancestor';

?>
<div class="overlay"></div>
<nav class="nav-main">
	<span class="nav-close" role="button" aria-description="Close secondary menu"></span>
	<div class="nav-wrapper">
		<div class="nav-container <?php echo $classes ?>">
			<?php
				wp_nav_menu( array(
					'menu_class'=> 'nav-menu',
					'container' => 'ul',
					'walker' => new Custom_Nav_Walker()
				) );
			?>
		</div>
	</div>
</nav>

<?php 
	$aside = false;
	$asideContent = 'children';
	$currentTemplate = get_page_template_slug();
	if ( $currentTemplate == 'page-aside-siblings.php'
	  || $currentTemplate == 'page-aside-children.php') $aside = true;
	if ($currentTemplate == 'page-aside-siblings.php') $asideContent = 'siblings';

	if ($aside) :
?>

<aside class="nav-aside-wrapper">
	<nav id="nav-aside" class="nav-aside" role="navigation" aria-describedby="nav-aside-title">
  	<h2 class="h5 sr-only-xl"><?php esc_html__("Dans la même section", 'epfl-shortcodes') ?></h2>
				<?php
				wp_nav_menu( array(
					'menu_class'=> 'nav-menu',
					'container' => 'ul',
					'submenu' => get_the_ID(),
					'submenu_type' => $asideContent
				) );
			?>
	</nav>
</aside>

<?php endif;