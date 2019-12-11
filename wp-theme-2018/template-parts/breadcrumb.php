<?php

require_once __DIR__ . '/../menus/blog-posts.php';

$currentTemplate = get_page_template_slug();

if ($currentTemplate == 'page-homepage.php') {
    // hide breadcrumbs on:
    //  - homepage
    //  - homepage template
    return;
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
  <?php
// Breadcrumb generated strings will be in this var
$crumbs = array();

// first, the little home url
if (get_option('stylesheet') === 'wp-theme-light') {
    $little_home_url = get_site_url();
} else {
    $little_home_url = get_epfl_home_url();
}

echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper"><ol class="breadcrumb">';
$crumbs[] = '
        <li class="breadcrumb-item">
            <a class="bread-link bread-home" href="' . $little_home_url . '" title="home">
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-home"></use></svg>
            </a>
        </li>';

/**
 * CUSTOM TAGS start
 */
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

$custom_tags = apply_filters('get_site_tags', '');

if (!empty($custom_tags)) {
    $ln = get_current_language();
    $crumbs[] = "
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

        $crumbs[] = "
            <a href=\"{$tag_url}\" class=\"tag tag-primary\">" . esc_html($tag_name) . "</a>
        ";
    }
    $crumbs[] = "</li>";
}

/**
 * CUSTOM TAGS end
 */
###
# With items menu, construct a very basic tree (one leaf)
# that will serve to build the breadcrumb
$items = array();

if (($menu_items = wp_get_nav_menu_items(get_current_menu_slug())) !== false) {
    foreach ($menu_items as $item) {
        $items[(int) $item->db_id] = $item;
    }
}

$current_id = get_queried_object_id();

$wp_filter_object_list = wp_filter_object_list($items, ['object_id' => $current_id]);
$item = $items ? reset($wp_filter_object_list) : false;

# when doing posts, check if we are in the menu, user may not have added this post yet
if (!$item && get_post_type(get_queried_object_id()) == "post") {
    # no having element here means the items is not attached to the menu
    # better print at least the selected element in settings

    # fullfil the crumb_items with some custom posts
    $crumb_items = array();

    # check if we have a static in settings for posts
    $static_posts_page_selected_id = has_static_posts_page_selected();
    if ($static_posts_page_selected_id) {
        $static_post = get_post($static_posts_page_selected_id);
        # yep, we have to transform the post page to a menu item here, as we a
        # Example found here :
        # https://github.com/wp-cli/entity-command/blob/95f2a07fdfa107aaa778711a4b5b53e962cd183a/src/Menu_Item_Command.php#L57
        $static_post_menu_entry = new stdClass();
        $static_post_menu_entry->db_id = $static_post->post_id;
        $static_post_menu_entry->type = 'nav_menu_item';
        $static_post_menu_entry->title = $static_post->post_title;
        $static_post_menu_entry->url = get_post_permalink($static_post);
    } else {
        // no static page selected, get one from Wordpress defaults
        $static_post_menu_entry = new stdClass();
        $static_post_menu_entry->db_id = -99; // don't clash with existing entry
        $static_post_menu_entry->type = 'nav_menu_item';

        $language = get_current_language();

        if ($language === 'fr') {
            $static_post_menu_entry->title = "Articles";
            $static_post_menu_entry->url = site_url()."fr/?post_type=post";
        } else {
            $static_post_menu_entry->title = "Posts";
            $static_post_menu_entry->url = site_url()."/?post_type=post";
        }
    }

    $crumb_items[] = $static_post_menu_entry;

    # Then, add the current post as a child
    $current_object = get_queried_object();
    $current_item_as_menu_entry = new stdClass();
    $current_item_as_menu_entry->db_id = $current_object->ID;
    $current_item_as_menu_entry->type = 'nav_menu_item';
    $current_item_as_menu_entry->title = $current_object->post_title;
    $current_item_as_menu_entry->menu_item_parent = $static_posts_page_selected_id;

    $crumb_items[] = $current_item_as_menu_entry;

    //#NotAChoiceUnlessRefeactor
    //as $item is the current item and will be needed next, make it as awaited
    $item->db_id = $current_object->ID;

} else {
    // not in a blog post part
    $crumb_items = array();
    for ($crumb_item = $item;
        $crumb_item;
        $crumb_item = $items[(int) $crumb_item->menu_item_parent]) {
        array_unshift($crumb_items, $crumb_item);
    }

}

if ($crumb_items) {
    foreach ($crumb_items as $crumb_item) {
        if ((int) $item->db_id === (int) $crumb_item->db_id) {
            $crumbs[] = "
                  <li class=\"breadcrumb-item active\" aria-current=\"page\">
                      {$crumb_item->title}
                  </li>";
        } else {
            $crumbs[] = "
                <li class=\"breadcrumb-item\">
                    <a class=\"bread-link bread-home\" href=\"{$crumb_item->url}\" title=\"{$crumb_item->title}\">
                        {$crumb_item->title}
                    </a>
                </li>";
        }
    }
}
echo implode('', $crumbs);
echo '</ol></nav>';
?>
  <!-- end Breadcrumb -->
</div>
