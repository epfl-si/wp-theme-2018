<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

global $wp_query;

// recover current post and menu item
$post = get_post($wp_query->queried_object->ID);
$items = wp_get_nav_menu_items('menu-1');
$item = reset(wp_filter_object_list( $items, ['object_id' => $post->ID]));

// to display correctly the menu on level 1 pages, we need to add '.current-menu-parent' to the wrapper
$classes = '';
if ( $item->post_parent === 0 || $item === false ) $classes = 'current-menu-parent';

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
	$aside = true;
	$asideContent = 'all';
	$currentTemplate = get_page_template_slug();
	if ($currentTemplate == 'page-aside-none.php' || is_home() || is_front_page()) $aside = false;
	if ($currentTemplate == 'page-aside-siblings-only.php') $asideContent = 'siblings';
	if ($currentTemplate == 'page-aside-children-only.php') $asideContent = 'children';

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