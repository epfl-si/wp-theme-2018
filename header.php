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
<div id="page" class="site">
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'epfl' ); ?></a>

	<header role="banner" class="header">
  	
  	<div class="site-branding">
  	  <a class="logo" href="<?php echo get_nav_home_url(); ?>">
  			<img src="<?php bloginfo('template_url'); ?>/assets/svg/epfl-logo.svg" alt="Logo EPFL, École polytechnique fédérale de Lausanne" class="img-fluid">
  		</a>
  		<a class="logo-50" href="https://celebration.epfl.ch/">
    		<img src="<?php bloginfo('template_url'); ?>/theme/img/logo50.gif" alt="Logo EPFL 50e anniversaire" width="101" height="91">
  		</a>
  	</div>

			<?php
			    global $EPFL_MENU_LOCATION;
				wp_nav_menu( array(
				    'theme_location' => $EPFL_MENU_LOCATION,
        		    'menu_id'        => $EPFL_MENU_LOCATION.'-menu',
					'menu_class'=> 'nav-header d-none d-xl-flex',
					'container' => 'ul',
					'depth' => 1
				) );
			?>

	<div class="dropdown dropright search d-none d-xl-block">
		<a class="dropdown-toggle" href="#" data-toggle="dropdown">
			<svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg>
		</a>
		<form action="https://search.epfl.ch/" class="dropdown-menu border-0 p-0">
			<div class="search-form mt-1 input-group">
				<label for="search" class="sr-only">Rechercher sur le site</label>
				<input type="text" class="form-control" name="q" placeholder="Rechercher" >
				<button type="submit" class="d-none d-xl-block btn btn-primary input-group-append" type="button">Valider</button>
			</div>
		</form>
	</div>

	<form action="https://search.epfl.ch/" class="d-lg-none">
		<div class="input-group search-mobile" role="search">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg>
				</span>
			</div>
				<label for="search" class="sr-only">Rechercher sur le site</label>
				<input type="text" class="form-control" name="q" placeholder="Rechercher">
		</div>
	</form>

	<?php get_template_part( 'template-parts/language-switcher' ) ?>

  <div class="btn btn-secondary nav-toggle-mobile d-xl-none">
		Menu
		<div class="hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>

</header>

<div class="main-container">
