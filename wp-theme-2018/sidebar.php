<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

require_once 'menu_microservice.inc';

global $wp_query;

global $EPFL_MENU_LOCATION;

function render_sidebar_item($crumb_item, $currentPage, $children) {
    $title = $crumb_item['title'] ?? '';
    $url = $crumb_item['url'] ?? '';

    if ($crumb_item['title'] == $currentPage->title) {
        ?>
      <li class="menu-item active">
          <a href="<?= $url; ?>" title="<?= $title; ?>">
                        <?= $title; ?>
          </a>
          <ul class="sub-menu">
                        <?php foreach ($children as $child) { ?>
                <li class="menu-item">
                    <a href="<?= $child['url']; ?>"><?= $child['title']; ?></a>
                </li>
                        <?php } ?>
          </ul>
      </li>
        <?php
    } else {
        ?>
      <li class="menu-item">
          <a href="<?= $url; ?>" title="<?= $title; ?>">
                        <?= $title; ?>
          </a>
      </li>
        <?php
    }
}

function get_stitched_menus($post, $asideContent)
{
    $site = new CurrentSite();
    return call_menu_api_microservice($site, 'getStitchedMenus', $post, $asideContent);
}


?>
<div class="overlay"></div>
<div class="nav-container">
    <nav class="nav-main nav-main-mobile" role="navigation">
        <div class="nav-wrapper">
            <div class="nav-container current-menu-parent">
                <ul id="menu-main" class="nav-menu">
                    <?php
                    require(__DIR__.'/header-top-menu-fallback.php');
                    ?>
                </ul>
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
                <ul id="menu-main" class="nav-menu">
                    <?php
                        $items = get_all_menu_items_flattened();

                        $current_item = get_current_item($items);

                        if ( has_menu_api() && ($response = get_stitched_menus($post, $asideContent)) ) {
                            $siblings = $response['siblings'] ?? [];
                            $children = $response['children'] ?? [];
                            foreach($siblings as $crumb_item) {
                                render_sidebar_item($crumb_item, $current_item, $children);
                            }
                        } else {
                            wp_nav_menu( array(
                                'theme_location' => $EPFL_MENU_LOCATION,
                                'menu_class'=> 'nav-menu',
                                'container' => 'ul',
                                'submenu' => get_the_ID(),
                                'submenu_type' => $asideContent
                            ) );

                        }

                    ?>
                </ul>
            </nav>
        </aside>

    <?php endif; ?>
</div>
