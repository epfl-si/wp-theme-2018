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


/**
 * Custom nav menu walker for the top bar
 *
 * + Remove so-called "phantom" top-level navigation entries such as "Labs",
 *   that only exist as placeholders
 *
 * + Substitute locally-defined nav menu items with the same set_title.
 *   This lets e.g. school-level sites redirect their "Education", "Research" etc.
 *   pages
 */
class EPFL_Theme2018_Root_Menu_Walker extends Walker_Nav_Menu {
    function start_el (&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if ($surrogate_menu = $this->_get_surrogate_menu()) {
            foreach ($surrogate_menu as $surrogate_item) {
                if ($item->title === $surrogate_item->title) {
                    $item = $surrogate_item;
                    break;
                }
            }
        }
        return parent::start_el($output, $item, $depth, $args, $id);
    }

    private function _get_surrogate_menu () {
        require_once(__DIR__ . '/functions.php');
        if (! root_menu_overrides_enabled()) return false;

        if (! property_exists($this, '_surrogate_menu')) {
            global $EPFL_MENU_OVERRIDE_LOCATION;
            $this->_surrogate_menu = wp_get_nav_menu_items(get_current_menu_slug($EPFL_MENU_OVERRIDE_LOCATION));
        }
        return $this->_surrogate_menu;
    }

    /**
    * Overridden to discard "phantom" root menu entries; that is,
    * entries whose only child is an ExternalMenuItem (as determined
    * by the EPFL plug-in setting a ->epfl_external_menu_children_count
    * annotation for us).
    */
    public function walk( $elements, $max_depth, ...$args ) {
        $self = $this;
        $filtered_elements = array_filter($elements,
        function($element) use ($self, $elements) {
            return ! $this->_is_phantom_node($elements, $element);
        });
        return parent::walk($filtered_elements, $max_depth, ...$args);
    }

    function _is_phantom_node ($elements, $element) {
        $self = $this;
        if (property_exists($element, 'epfl_external_menu_children_count') &&
        $element->epfl_external_menu_children_count == 1) {
            $other_children_count = count(array_filter($elements,
            function($child) use ($self, $element) {
                return ($child->menu_item_parent == $element->ID &&
                property_exists($child, 'epfl_soa') &&
                $child->epfl_soa !== $self->_get_our_soa());
            }));
            if ($other_children_count === 0) return true;
        }
    }

    function _get_our_soa () {
        if (! property_exists($this, '_our_soa')) {
            $this->_our_soa = site_url();
            if (! preg_match('#/$#', $this->_our_soa)) {
                $this->_our_soa .= '/';
            }
        }
        return $this->_our_soa;
    }
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php require_once(__DIR__.'/favicons.php'); ?>
	<script type="text/javascript">window.svgPath = "<?php bloginfo('template_url'); ?>/assets/icons/icons.svg"</script>
	<script type="text/javascript">window.featherSvgPath = "<?php bloginfo('template_url'); ?>/assets/icons/feather-sprite.svg"</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'epfl' ); ?></a>

  <?php
    // Get the directory name of the active theme
    $themeSlug = get_option('stylesheet');
    $headerLightClass = '';

    if ( $themeSlug == 'wp-theme-light' ) {
      $headerLightClass = ' header-light';
    };
  ?>
	<header role="banner" class="header<?php echo $headerLightClass; ?>">

  <?php if ( $themeSlug == 'wp-theme-light' ) : ?>

    <div class="drawer mr-3 mr-xl-0">
    <button class="drawer-toggle">
      <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
    </button>
    <a href="<?php echo get_epfl_home_url(); ?>" class="drawer-link">
      <span class="text">
        Retour au site principal
      </span>
    </a>
  </div>

  <div class="header-light-content">

  <?php endif; ?>

  <?php
  if ( $themeSlug == 'wp-theme-light' ) {
    $main_logo_url = get_site_url();
  } else {
    $main_logo_url = get_epfl_home_url();
  }
  ?>

	<a class="logo" href="<?php echo $main_logo_url; ?>">
		<img src="<?php bloginfo('template_url'); ?>/assets/svg/epfl-logo.svg" alt="Logo EPFL, École polytechnique fédérale de Lausanne" class="img-fluid">
	</a>

  <?php if ( $themeSlug == 'wp-theme-light' ) : ?>
  <h1><?php bloginfo( 'name' ); ?></h1>
  <?php endif; ?>

	<?php
		global $EPFL_MENU_LOCATION;

		/**
		 * Filters whether the EPFL plugin provides a properly "stitched-up" version of the root (top) menu.
		 *
		 * By default (i.e. EPFL plugin is not installed), or in case of a configuration error, should
		 * return false so that a default root menu is substituted in the top navigation banner.
         * The theme light show the list of the first level pages.
		 */
		$root_menu_functional_in_plugin = apply_filters('epfl_root_menu_ready', false, $EPFL_MENU_LOCATION);

		if ($themeSlug === 'wp-theme-light' || $root_menu_functional_in_plugin) {
				global $EPFL_MENU_LOCATION;
				wp_nav_menu( array(
					'theme_location' => $EPFL_MENU_LOCATION,
					'menu_id'        => $EPFL_MENU_LOCATION.'-menu',
					'menu_class'=> 'nav-header d-none d-xl-flex',
					'container' => 'ul',
					'depth' => 1,
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',  // this is a temp hack until we remove it
					'walker' => new EPFL_Theme2018_Root_Menu_Walker()
				) );
			} else {
                ?>
                  <ul aria-hidden="true" class="nav-header d-none d-xl-flex">
                      <?php
                      require(__DIR__ . "/header-top-menu-fallback.php");
                      ?>
                  </ul>
                <?php
			}
	?>

	<div class="dropdown dropright search d-none d-xl-block">
		<a class="dropdown-toggle" href="#" data-toggle="dropdown">
			<svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg>
		</a>
		<form action="https://search.epfl.ch/" class="dropdown-menu border-0 p-0">
			<div class="search-form mt-1 input-group">
				<label for="search" class="sr-only"><?php esc_html_e('Search on the site', 'epfl') ?></label>
				<input type="text" class="form-control" name="q" placeholder="<?php esc_html_e('Search', 'epfl') ?>" >
				<button type="submit" class="d-none d-xl-block btn btn-primary input-group-append" type="button"><?php esc_html_e('Validate', 'epfl') ?></button>
			</div>
		</form>
	</div>

<form action="https://search.epfl.ch/" class="d-xl-none">
  <a id="search-mobile-toggle" class="search-mobile-toggle searchform-controller" href="#">
    <svg class="icon" aria-hidden="true">
      <use xlink:href="#icon-search"></use>
    </svg>
    <span class="toggle-label sr-only"><?php esc_html_e('Show / hide the search form', 'epfl') ?></span>
  </a>
  <div class="input-group search-mobile" role="search">
    <div class="input-group-prepend">
      <span class="input-group-text">
        <svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-search"></use>
        </svg>
      </span>
    </div>
    <label for="search" class="sr-only"><?php esc_html_e('Search on the site', 'epfl') ?></label>
    <input type="text" class="form-control" name="q" placeholder="<?php esc_html_e('Search', 'epfl') ?>">
    <div class="input-group-append">
      <a id="search-mobile-close" class="search-mobile-close searchform-controller" href="#">
        <svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-close"></use>
        </svg>
        <span class="toggle-label sr-only"><?php esc_html_e('Hide the search form', 'epfl') ?></span>
      </a>
    </div>
  </div>
</form>

	<?php get_template_part( 'template-parts/language-switcher' ) ?>

  <button class="btn btn-secondary nav-toggle-mobile d-xl-none">
    <span class="label"><?php esc_html_e('Menu', 'epfl') ?></span>
		<div class="hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</button>

  <?php if ( $themeSlug == 'wp-theme-light' ) : ?>
  </div>
  <?php endif; ?>

</header>

<div class="main-container">
