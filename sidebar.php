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

<script type="text/javascript">
// this is a dirty hack for the copil.
	window.onload = function() {
		if (false) {
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
		$('.nav-header').append('<li id="menu-item-search"><a class="nav-item" href="https://preview.liip.ch/epfl-search/api/" target="_blank"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg></a></li>');
		}
	}

				
</script>
