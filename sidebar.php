<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

global $post;

// to display correctly the menu ov level 1 pages, we need to add '.current-menu-parent' to the wrapper
$classes = '';
if ( $post->post_parent === 0 ) $classes = 'current-menu-parent';

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
