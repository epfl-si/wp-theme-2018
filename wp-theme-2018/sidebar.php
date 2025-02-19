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

function get_rendered_sider_item($crumb_item, $currentPage, $children) {
    $title = $crumb_item['title'] ?? '';
    $url = $crumb_item['url'] ?? '';

    if ($crumb_item['title'] == $currentPage->title) {
        $submenus = '<ul class=\"sub-menu\">';
        foreach ($children as $child) {
            $submenus = $submenus . "<li class=\"menu-item\"><a href=\"{$child['url']}\">{$child['title']}</a></li>";
        }
        $submenus = $submenus . '</ul>';
        return "
            <li class=\"menu-item active\">
                <a href=\"{$url}\" title=\"{$title}\">
                    {$title}
                </a>
                {$submenus}
            </li>";
    } else {
        return "
            <li class=\"menu-item\">
                <a href=\"{$url}\" title=\"{$title}\">
                    {$title}
                </a>
            </li>";
    }
}

function get_stitched_menus($home_page_url, $urlSite, $lang): array
{
    $main_post_page = get_option('page_for_posts');
    if (! function_exists("pll_get_post")) {
        # Menus and siblings require Polylang.
        return [];
    }
    $current_language_page_id = pll_get_post($main_post_page, $lang);
    $main_post_page_name = urlencode(get_the_title($current_language_page_id));
    $main_post_page_url = get_permalink($current_language_page_id);

    $urlApi = 'http://' . getenv('MENU_API_HOST') . ':3001/menus/getStitchedMenus/?lang=' . $lang . '&url=' . trailingslashit( $urlSite ) .
        '&pageType=' . get_post_type() .
        ($main_post_page == 0 ? '' : ($main_post_page_name == '' ? '' : '&mainPostPageName=' . $main_post_page_name)) .
        ($main_post_page == 0 ? '' : ($main_post_page_url == '' ? '' : '&mainPostPageUrl=' . $main_post_page_url)).
        '&postName=' . urlencode(get_the_title()) .
        '&homePageUrl=' . $home_page_url;
    $curl = curl_init($urlApi);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_text = curl_eror($curl);
    }
    curl_close($curl);

    if (isset($error_text)) {
        error_log( "curl error: {$error_text} at {$urlApi}" );
        return [];
    } elseif ($response === false) {
        error_log( 'Failed to retrieve data from the API.' );
        return [];
    } else {
        $siblings = json_decode($response, true)['siblings'];
        $children = json_decode($response, true)['children'];
        $data = array(
            "siblings" => $siblings ?? [],
            "children" => $children ?? [],
        );
        return $data;
    }
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

                        // fullfil crumb_items array, in accordance with the items hierarchy
                        $crumb_items = [];
                        $crumb_item = $current_item;
                        if (count($items) > 1) {
                            while($crumb_item !== false)
                            {
                                array_unshift($crumb_items, $crumb_item);

                                $index = (int) $crumb_item->menu_item_parent;
                                $crumb_item = array_key_exists($index, $items)? $items[$index]: false;
                            }
                        } else {
                            // make at least the only element printed
                            $crumb_items = [$crumb_item];
                        }

                        if (function_exists('pll_current_language')) {
                            $current_lang = pll_current_language();
                        } else {
                            $current_lang = get_current_language();
                        }
                        $home_page_url = home_url();
                        if (!str_ends_with($home_page_url, '/')) {
                            $home_page_url = $home_page_url . '/';
                        }
                        $protocol = is_ssl() ? 'https://' : 'http://';
                        $current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                        $index_of_query_string = strpos($current_url, '?');
                        if ($index_of_query_string) {
                            $current_url = substr($current_url, 0, $index_of_query_string);
                        }
                        if ((($home_page_url == $current_url) || ($home_page_url . $current_lang . '/') == $current_url) && !is_category()) {
                            if (!str_contains($current_url, '/' . $current_lang . '/')) {
                                $current_url = $current_url . $current_lang . '/';
                            }
                            if (isset($post) && $post->post_name !== null && !str_ends_with($current_url, $post->post_name . '/')) {
                                $current_url = $current_url . $post->post_name . '/';
                            }
                        }
                        if (!str_contains($home_page_url, '/' . $current_lang . '/')) {
                            $home_page_url = $home_page_url . $current_lang . '/';
                        } else {
                            $language_information = '/' . $current_lang . '/';
                            $home_page_url = substr($home_page_url, 0, strpos($home_page_url, $language_information) + strlen($language_information));
                        }
                        $parent_items = get_stitched_menus($home_page_url, $current_url, $current_lang);


                        if (array_key_exists('siblings', $parent_items) && len($parent_items['siblings']) > 0) {
                            $crumbs = [];

                            foreach($parent_items['siblings'] as $crumb_item) {
                                $crumbs[] = get_rendered_sider_item($crumb_item, $current_item, $parent_items['children']);
                            }
                            echo implode('', $crumbs);
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
