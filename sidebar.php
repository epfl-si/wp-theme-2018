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
if ( $item->menu_item_parent == 0 || $item === false ) $classes = 'current-menu-parent';
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
	if ($currentTemplate == 'page-aside-none.php' || $currentTemplate == 'page-homepage.php' || is_home() || is_front_page()) $aside = false;
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

<script type="text/javascript">
// this is a dirty hack for the copil.
// @TODO : remove this and implement correct search
	window.onload = function() {
		var element = $('.nav-main ul.nav-menu>li.current-menu-item.menu-item-has-children');
		if (element) {
			// the element is at level 0 and has children. we move the menu
			element.removeClass('current-menu-item').addClass('current-menu-parent');
			var parents = element.parents();
			$(parents[1]).removeClass('current-menu-parent').addClass('current-menu-ancestor')
		} else {
			$('.nav-main').removeClass('current-menu-ancestor').addClass('current-menu-parent')
		}
		// add search icon
		$('.nav-header').append('<li id="menu-item-search"><a class="nav-item" href="https://search.epfl.ch" target="_blank"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg></a></li>');
	}

</script>
