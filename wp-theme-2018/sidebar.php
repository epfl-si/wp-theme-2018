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


// to display correctly the menu on level 1 pages, on missing menu, or for the blog home,
// we need to add '.current-menu-parent' to the wrapper
$classes = '';

$items = wp_get_nav_menu_items(get_current_menu_slug());
$current_menu_entry = get_menu_entry_from_element_id($items, get_currently_viewed_element_id());

if (get_queried_object() && !is_archive()) {  // only when we are looking at an object or in the category/tag view
	if ($current_menu_entry === false || $current_menu_entry->menu_item_parent == 0 || is_home()) {
		$classes = 'current-menu-parent';
	}
}

?>
<?php
	// corona link builder
	// this is a temp hack until we remove it
	$language = get_current_language();

  if (get_option( 'epfl_hide_coronavirus_info_header', false ) == "1") {
    $new_entry_item = '';
  } else {
      if ($language === 'fr') {
          $new_entry_url = 'https://www.epfl.ch/campus/security-safety/sante/coronavirus-covid-19/';
          $new_entry_item = '<li id="menu-item--0" class="menu-item--0"><a style="color:#ff0000;" href="' . $new_entry_url . '">Info coronavirus</a></li>';
      } else {
          $new_entry_url = 'https://www.epfl.ch/campus/security-safety/en/health/coronavirus-covid19/';
          $new_entry_item = '<li id="menu-item--0" class="menu-item--0"><a style="color:#ff0000;" href="' . $new_entry_url . '">Coronavirus Info</a></li>';
      }
  }
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
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $new_entry_item . '</ul>',  // this is a temp hack until we remove it
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
	if ($currentTemplate == 'page-aside-none.php' || $currentTemplate == 'page-homepage.php') $aside = false;
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
