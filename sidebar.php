<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

global $wp_query;

global $EPFL_MENU_LOCATION;

// recover current post and menu item
$items = wp_get_nav_menu_items(get_current_menu_slug());
$item = reset(wp_filter_object_list( $items, ['object_id' => $post->ID]));

// to display correctly the menu on level 1 pages, we need to add '.current-menu-parent' to the wrapper
$classes = '';
if ($item === false || $item->menu_item_parent == 0 ) $classes = 'current-menu-parent';
?>
<div class="overlay"></div>
<nav class="nav-main">
	<div class="nav-wrapper">
		<div class="nav-container <?php echo $classes ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => $EPFL_MENU_LOCATION,
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
	if ($currentTemplate == 'page-aside-none.php' || $currentTemplate == 'page-homepage.php' || is_home()) $aside = false;
	if ($currentTemplate == 'page-aside-siblings-only.php') $asideContent = 'siblings';
	if ($currentTemplate == 'page-aside-children-only.php') $asideContent = 'children';
	if ($aside) :
?>

<aside class="nav-aside-wrapper">
	<nav id="nav-aside" class="nav-aside" role="navigation" aria-describedby="nav-aside-title">
  	<h2 class="h5 sr-only-xl"><?php esc_html_e("In the same section", 'epfl') ?></h2>
				<?php
				wp_nav_menu( array(
				    'theme_location' => $EPFL_MENU_LOCATION,
        		    'menu_class'=> 'nav-menu',
					'container' => 'ul',
					'submenu' => get_the_ID(),
					'submenu_type' => $asideContent
				) );
			?>
	</nav>
</aside>

<?php endif; ?>
