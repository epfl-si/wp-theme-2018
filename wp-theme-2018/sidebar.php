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
        $subMenus = '<ul class=\"sub-menu\">';
        foreach ($children as $child) {
            $subMenus = $subMenus . "<li class=\"menu-item\"><a href=\"{$child['url']}\">{$child['title']}</a></li>";
        }
        $subMenus = $subMenus . '</ul>';
        return "
            <li class=\"menu-item active\">
                <a href=\"{$url}\" title=\"{$title}\">
                    {$title}
                </a>
                {$subMenus}
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

function getStitchedMenus($homePageUrl, $urlSite, $lang): array
{
	$main_post_page = get_option('page_for_posts');
	if (! function_exists("pll_get_post")) {
		# Menus and siblings require Polylang.
		return [];
	}
	$current_language_page_id = pll_get_post($main_post_page, $lang);
	$mainPostPageName = urlencode(get_the_title($current_language_page_id));
	$mainPostPageUrl = get_permalink($current_language_page_id);

	$urlApi = 'http://menu-api-siblings:3001/menus/getStitchedMenus/?lang=' . $lang . '&url=' . trailingslashit( $urlSite ) .
		'&pageType=' . get_post_type() .
		($main_post_page == 0 ? '' : ($mainPostPageName == '' ? '' : '&mainPostPageName=' . $mainPostPageName)) .
		($main_post_page == 0 ? '' : ($mainPostPageUrl == '' ? '' : '&mainPostPageUrl=' . $mainPostPageUrl)).
		'&postName=' . urlencode(get_the_title()) .
		'&homePageUrl=' . $homePageUrl;
    //echo $urlApi;
	$curl = curl_init($urlApi);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl);
	if (curl_errno($curl)) {
		error_log( curl_error($curl). ': '. $urlApi );
	}
	curl_close($curl);

	if ($response === false) {
		error_log( 'Failed to retrieve data from the API.' );
	} else {
        $siblings = json_decode($response, true)['siblings'];
        $children = json_decode($response, true)['children'];
        $data = array(
            "siblings" => $siblings ?? [],
            "children" => $children ?? [],
        );
        return $data;
	}
	return [];
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
                        // Final generated strings will be in this var
                        $crumbs = [];

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
                        $homePageUrl = home_url();
                        if (!str_ends_with($homePageUrl, '/')) {
                            $homePageUrl = $homePageUrl . '/';
                        }
                        $protocol = is_ssl() ? 'https://' : 'http://';
                        $currentUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                        $indexOfQueryString = strpos($currentUrl, '?');
                        if ($indexOfQueryString) {
                            $currentUrl = substr($currentUrl, 0, $indexOfQueryString);
                        }
                        if ((($homePageUrl == $currentUrl) || ($homePageUrl . $current_lang . '/') == $currentUrl) && !is_category()) {
                            if (!str_contains($currentUrl, '/' . $current_lang . '/')) {
                                $currentUrl = $currentUrl . $current_lang . '/';
                            }
                            if (isset($post) && $post->post_name !== null && !str_ends_with($currentUrl, $post->post_name . '/')) {
                                $currentUrl = $currentUrl . $post->post_name . '/';
                            }
                        }
                        if (!str_contains($homePageUrl, '/' . $current_lang . '/')) {
                            $homePageUrl = $homePageUrl . $current_lang . '/';
                        } else {
                            $languageInformation = '/' . $current_lang . '/';
                            $homePageUrl = substr($homePageUrl, 0, strpos($homePageUrl, $languageInformation) + strlen($languageInformation));
                        }
                        $parent_items = getStitchedMenus($homePageUrl, $currentUrl, $current_lang);


                        foreach($parent_items['siblings'] as $crumb_item) {
                            $crumbs[] = get_rendered_sider_item($crumb_item, $current_item, $parent_items['children']);
                        }

                        echo implode('', $crumbs);
                    ?>
                </ul>
            </nav>
        </aside>

    <?php endif; ?>
</div>
