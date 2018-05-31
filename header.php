<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script type="text/javascript">window.svgPath = "<?php bloginfo('template_url'); ?>/assets/icons/icons.svg"</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site nav-toggle">
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'epfl' ); ?></a>

	<header role="banner" class="header">
  	<a class="logo" href="<?php bloginfo('url') ?>">
			<img src="<?php bloginfo('template_url'); ?>/assets/svg/epfl-logo.svg" alt="Logo EPFL, École polytechnique fédérale de Lausanne" class="img-fluid">
		</a>

		<div aria-hidden="true">
			<?php
				wp_nav_menu( array(
					'menu_class'=> 'nav-header d-none d-xl-flex',
					'container' => 'ul',
					'depth' => 1,
				) );
			?>
		</div>

		<div class="input-group search">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<svg class="icon"><use xlink:href="#icon-search"></use></svg>
				</span>
			</div>
			<input type="text" class="form-control" placeholder="Rechercher">
		</div>  
		<nav class="language-switcher pr-5">
		<ul>
			<li>
				<span class="active" aria-label="Français">FR</span>
			</li>
			<li>
				<a href="#" aria-label="English">EN</a>
			</li>
		</ul>
	</nav>

  <div class="btn btn-secondary menu-toggle-mobile d-xl-none">
		Menu
		<div class="hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>

</header>

<div class="main-container">
