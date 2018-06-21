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

global $navClasses;

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
<div id="page" class="site <?php echo $navClasses ?>">
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'epfl' ); ?></a>

	<header role="banner" class="header">
  	<a class="logo" href="<?php bloginfo('url') ?>">
			<img src="<?php bloginfo('template_url'); ?>/assets/svg/epfl-logo.svg" alt="Logo EPFL, École polytechnique fédérale de Lausanne" class="img-fluid">
		</a>

		<div aria-hidden="true">
			<?php
				wp_nav_menu( array(
					'menu_class'=> 'nav-header d-none d-xl-flex m-0',
					'container' => 'ul',
					'depth' => 1,
				) );

			?>

		</div>

		<form action="https://preview.liip.ch/epfl-search/api/" class="d-xl-none">
			<div class="input-group search w-100">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<svg class="icon"><use xlink:href="#icon-search"></use></svg>
					</span>
				</div>
				<input type="text" class="form-control" placeholder="Rechercher">
			</div>  
		</form>

<?php 

/*
	language switcher
 */
if (function_exists('pll_the_languages')):
$translations = pll_the_languages(array('raw'=>1));
if (sizeof($translations) > 0) :
?>
<!-- language switcher -->
		<nav class="language-switcher pr-5">
		<ul>
		<?php foreach($translations as $lang): ?>
			<?php if ($lang['current_lang']): ?>
				<li>
					<span class="active" aria-label="<?php echo $lang['name'] ?>'"><?php echo strtoupper($lang['slug']) ?></span>
				</li>
			<?php else: ?>
				<li>
					<a href="<?php $lang['name'] ?>" aria-label="English"><?php echo strtoupper($lang['slug']) ?></a>
				</li>
			<?php endif; // current lang ?>
		<?php endforeach; ?>
		</ul>
	</nav>
<?php else: ?>
<!-- language switcher placeholder -->
<div></div> 
<?php endif; // sizeof ?>
<?php else: ?>
<!-- language switcher placeholder -->
<div></div>
<?php endif; // function_exists ?>

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
