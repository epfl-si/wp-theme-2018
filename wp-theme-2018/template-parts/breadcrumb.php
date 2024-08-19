<?php
/**
 * hide breadcrumbs on:
 *  - homepage
 *  - homepage template
 */
$currentTemplate = get_page_template_slug();

if ($currentTemplate == 'page-homepage.php') {
    return;
}

function get_home_icon_markup() {
    $markup = [];

    // first, the little home url
    if (get_option('stylesheet') === 'wp-theme-light') {
        $little_home_url = get_site_url();
    } else {
        $little_home_url = get_epfl_home_url();
    }

    $markup[] = '
            <li class="breadcrumb-item">
                <a class="bread-link bread-home" href="' . $little_home_url . '" title="home">
                    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-home"></use></svg>
                </a>
            </li>';

    return $markup;
}

function get_mobile_breadcrumb_markup() {
    $markup[] = '
            <li class="breadcrumb-item expand-links">
                <button class="btn btn-expand-links" aria-expanded="false" title="Afficher l\'intégralité du fil d\'Ariane">
                    <span class="dots" aria-hidden="true">…</span>
                    <span class="sr-only">Afficher l\'intégralité du fil d\'Ariane</span>
                </button>
            </li>';

    return $markup;
}

/*
* Get the html of the custom tag
*/
function get_custom_tags_markup() {
    // get an array of custom tags that we will show before the real breadcrumb

    /* custom_tags should be like
    array(x) {
    [0]=>
    object(stdClass)#1520 (5) {
    ["url_fr"]=>
    string(34) "https://www.epfl.ch/schools/ic/fr/"
    ["url_en"]=>
    string(31) "https://www.epfl.ch/schools/ic/"
    ["name_fr"]=>
    string(2) "IC"
    ["name_en"]=>
    string(2) "IC"
    ["type"]=>
    string(7) "faculty"
    },
    {
    ...
    }
    }
    */

    $markup = [];

    $custom_tags = apply_filters('get_site_tags', '');

    if (!empty($custom_tags)) {
        $ln = get_current_language();
        $markup[] = "
                    <li class=\"breadcrumb-item breadcrumb-tags-wrapper\">";

        foreach ($custom_tags as $tag_item) {
            if ($ln === 'fr') {
                $tag_name = $tag_item->name_fr;
                if (!empty($tag_item->url_fr)) {
                    $tag_url = $tag_item->url_fr;
                } else {
                    $tag_url = $tag_item->url_en;
                }
            } else {
                $tag_name = $tag_item->name_en;
                $tag_url = $tag_item->url_en;
            }

            $markup[] = "
                <a href=\"{$tag_url}\" class=\"tag tag-primary\">" . esc_html($tag_name) . "</a>
            ";
        }
        $markup[] = "</li>";
    }

    return $markup;
}

/**
 * With items menu, construct a very basic tree (one leaf)
 * that will serve to build the breadcrumb
 */
function get_all_menu_items_flattened() {
    $items = [];

    if(($menu_items = wp_get_nav_menu_items(get_current_menu_slug()))!==false)
    {
        foreach ($menu_items as $item) {
            $items[(int) $item->db_id] = $item;
        }
    }

    return $items;
}

function get_current_item($items) {
    $item = null;

    // yeah, the one with current set
    $wp_filter_object_list = wp_filter_object_list( $items, ['current' => True]);
    $item = $items ? reset($wp_filter_object_list) : false;

    if (!$item) {
        // ok, we may be in a post
        $current_id = get_post()->ID;
        $wp_filter_object_list = wp_filter_object_list( $items, ['object_id' => $current_id]);
        $item = $items ? reset($wp_filter_object_list) : false;
    }

    return $item;
}

function get_rendered_crumb_item($crumb_item, $is_current_item=False, $siblings_items) {
    $title = $crumb_item['title'] ?? '';
    $url = $crumb_item['url'] ?? '';

    $siblings = render_siblings($siblings_items, $crumb_item);
    if ( $is_current_item ) {
        return "
        <li class=\"breadcrumb-item active\" aria-current=\"page\">
            {$title}
            {$siblings}
        </li>";
    } else {
        return "
        <li class=\"breadcrumb-item\">
            <a class=\"bread-link\" href=\"{$url}\" title=\"{$title}\">
                {$title}
            </a>
            {$siblings}     
        </li>";
    }
}

function render_siblings($siblings_items, $crumb_item) {
    $siblings = '';
    foreach ($siblings_items as $sibling) {
        if ($crumb_item['title'] == $sibling['title']) {
			$siblings = $siblings . "<li class=\"dropdown-item current-menu-item-parent\"><a href=\"{$sibling['url']}\">{$sibling['title']}</a></li>";
		} else {
            $siblings = $siblings. "<li class=\"dropdown-item\"><a href=\"{$sibling['url']}\">{$sibling['title']}</a></li>";
        }
    }
    if ($siblings !== '') {
        return "
            <div class=\"dropdown\">
                <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <!--<span class=\"icon feather icon-arrow-down-circle\" aria-hidden=\"true\"></span>-->
                    <svg class=\"icon feather\" aria-hidden=\"true\">
                      <use xlink:href=\"#arrow-down-circle\"></use>
                    </svg>
                    <span class=\"sr-only\">Affiche les pages de même niveau</span>
                </button>
                <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                    {$siblings}
                </ul>
            </div>";
    }
    return $siblings;
}

function _call_menu_api_microservice($homePageUrl, $urlSite, $lang,$callType): array
{
    $main_post_page = get_option('page_for_posts');
    if (! function_exists("pll_get_post")) {
        # Menus and siblings require Polylang.
        return [];
    }
    $current_language_page_id = pll_get_post($main_post_page, $lang);
    $mainPostPageName = urlencode(get_the_title($current_language_page_id));
    $mainPostPageUrl = get_permalink($current_language_page_id);

    $urlSiteVerified = $urlSite;
    $indexOfQueryString = strpos($urlSite, '?');
    if ($indexOfQueryString) {
        $urlSiteVerified = substr($urlSite, 0, $indexOfQueryString);
    }
    $urlApi = 'http://menu-api-siblings:3001/menus/'.$callType.'/?lang=' . $lang . '&url=' . trailingslashit( $urlSiteVerified ) .
        '&pageType=' . get_post_type() .
        ($main_post_page == 0 ? '' : ($mainPostPageName == '' ? '' : '&mainPostPageName=' . $mainPostPageName)) .
        ($main_post_page == 0 ? '' : ($mainPostPageUrl == '' ? '' : '&mainPostPageUrl=' . $mainPostPageUrl)).
        '&postName=' . urlencode(get_the_title()) .
        '&homePageUrl=' . $homePageUrl;
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
        $data = json_decode($response, true)['result'];
        if ($data !== null) {
            return $data;
        } else {
			error_log( 'Failed to parse JSON response.' );
        }
    }
    return [];
}

function get_siblings ($homePageUrl, $urlSite, $lang) {
    return _call_menu_api_microservice($homePageUrl, $urlSite, $lang, 'siblings');
}

function get_breadcrumb ($homePageUrl, $urlSite, $lang) {
    return _call_menu_api_microservice($homePageUrl, $urlSite, $lang, 'breadcrumb');
}

?>

<div class="breadcrumb-container">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <?php
            // Breadcrumb
            // Final generated strings will be in this var
            $crumbs = [];

            // add the little home icon
            $crumbs = array_merge($crumbs, get_home_icon_markup());

            // add custom tags if any
            $crumbs = array_merge($crumbs, get_custom_tags_markup());

            // add the "..." icon
            $crumbs = array_merge($crumbs, get_mobile_breadcrumb_markup());

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

            $current_lang = get_current_language();
            $homePageUrl = home_url();
            if (!str_ends_with($homePageUrl, '/')) {
                $homePageUrl = $homePageUrl . '/';
            }
            $protocol = is_ssl() ? 'https://' : 'http://';
            $currentUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            if ((($homePageUrl == $currentUrl) || ($homePageUrl . $current_lang . '/') == $currentUrl) && !is_category()) {
                if (!str_contains($currentUrl, '/' . $current_lang . '/')) {
                    $currentUrl = $currentUrl . $current_lang . '/';
                }
                if (!str_ends_with($currentUrl, $post->post_name . '/')) {
                    $currentUrl = $currentUrl . $post->post_name . '/';
                }
            }
            if (!str_contains($homePageUrl, '/' . $current_lang . '/')) {
                $homePageUrl = $homePageUrl . $current_lang . '/';
            } else {
                $languageInformation = '/' . $current_lang . '/';
                $homePageUrl = substr($homePageUrl, 0, strpos($homePageUrl, $languageInformation) + strlen($languageInformation));
            }
            $parent_items = get_breadcrumb($homePageUrl, $currentUrl, $current_lang);

            foreach($parent_items as $crumb_item) {
                $siblings_items = get_siblings($homePageUrl, $crumb_item['url'], $current_lang);
                $current_item_db_id = $current_item->db_id ?? null;
                $crumb_item_db_id = $crumb_item['db_id'] ?? null;
                if ($current_item_db_id && $crumb_item_db_id && (int) $current_item_db_id === (int) $crumb_item_db_id) { // current item ?
                    $crumbs[] = get_rendered_crumb_item($crumb_item, True, $siblings_items);
                } else {
                    $crumbs[] = get_rendered_crumb_item($crumb_item, False, $siblings_items);
                }
            }

            echo implode('', $crumbs);
            ?>
        </ol>
    </nav>
    <!-- end Breadcrumb -->
</div>
