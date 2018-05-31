<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */
?>
<div class="overlay"></div>
<nav class="nav-main">
	<span class="nav-close" role="button" aria-description="Close secondary menu"></span>
	<div class="nav-wrapper">
	<?php
	// we are deeper in the menu tree
	$navContainerClasses = 'current-page-ancestor';
	$navMenuClasses = 'current-page-ancestor';
	if (is_front_page()) {
		//we are at the top level
		$navContainerClasses = 'current-page-ancestor';
		$navMenuClasses = 'current-page-ancestor';
	}
	?>
		<div class="nav-container <?php echo $navContainerClasses ?>">
			<?php
				wp_nav_menu( array(
					'menu_class'=> 'nav-menu current-page-ancestor',
					'container' => 'ul',
					'walker' => new custom_page_walker(),
				) );
			?>
		</div>
	</div>
</nav>
