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

function get_rendered_crumb_item($crumb_item, $is_current_item=False) {
    $title = $crumb_item->title ?? '';
    $url = $crumb_item->url ?? '';

    if ( $is_current_item ) {
        return "
        <li class=\"breadcrumb-item active\" aria-current=\"page\">
            {$title}
        </li>";
    } else {
        return "
        <li class=\"breadcrumb-item\">
            <a class=\"bread-link bread-home\" href=\"{$url}\" title=\"{$title}\">
                {$title}
            </a>
        </li>";
    }
}
?>
<div class="breadcrumb-container">
  <!-- Browse  -->
  <div>
    <button id="nav-toggle" class="nav-toggle btn btn-secondary">
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-browse"></use>
      </svg>
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-close"></use>
      </svg>
      <?php echo __("Browse", 'epfl') ?>
    </button>
  </div>
  <!-- end Browse -->

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
    $res = file_get_contents('http://menu-api:8080/breadcrumb?lang=' . $current_lang . '&url=' . trailingslashit( get_site_url() ));
    $parent_items = json_decode($res, false)->breadcrumb ?? [];
    $crumb_items = [...$parent_items, ...$crumb_items];

    foreach($crumb_items as $crumb_item) {
        $current_item_db_id = $current_item->db_id ?? null;
        $crumb_item_db_id = $crumb_item->db_id ?? null;
        if ($current_item_db_id && $crumb_item_db_id && (int) $current_item_db_id === (int) $crumb_item_db_id) { // current item ?
            $crumbs[] = get_rendered_crumb_item($crumb_item, True);
        } else {
            $crumbs[] = get_rendered_crumb_item($crumb_item, False);
        }
    }

    echo implode('', $crumbs);
  ?>
    </ol>
  </nav>
  <!-- end Breadcrumb -->
</div>
