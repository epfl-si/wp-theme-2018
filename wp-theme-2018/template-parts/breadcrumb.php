<?php

require_once __DIR__ . '/../menus/blog-posts.php';

$currentTemplate = get_page_template_slug();

function get_rendered_crumb_item($crumb_item, $is_active=False) {
    if ( $is_active ) {
        return "
        <li class=\"breadcrumb-item active\" aria-current=\"page\">
            {$crumb_item->title}
        </li>";

    } else {
        return "
        <li class=\"breadcrumb-item\">
            <a class=\"bread-link bread-home\" href=\"{$crumb_item->url}\" title=\"{$crumb_item->title}\">
                {$crumb_item->title}
            </a>
        </li>";
    }
}

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

# are we doing posts ?
if ( is_single() && 'post' == get_post_type() ) {
    # only do something if the current post is not already in the menu
    if( empty( wp_filter_object_list($items, ['object_id' => $current_id]) ) ) {
        # add manually the entry then
        $current_object = get_queried_object();
        $current_item_as_menu_entry = new stdClass();
        $current_item_as_menu_entry->db_id = max(array_keys($items)) + 1; # find a free id
        $current_item_as_menu_entry->object_id = $current_id;
        $current_item_as_menu_entry->type = 'nav_menu_item';
        $current_item_as_menu_entry->title = $current_object->post_title;
        $items[$current_item_as_menu_entry->db_id] = $current_item_as_menu_entry;

        # let's find the best parent for this blog post
        $static_posts_page_selected_id = has_static_posts_page_selected();
        if ( $static_posts_page_selected_id ) {
            # check if this static posts page is in the menu, because we need it now
            $static_post_page = reset(wp_filter_object_list($items, ['object_id' => $static_posts_page_selected_id]));
            if( empty( $static_post_page ) ) {
                # static post page is not in the menu, add it manually
                $static_post = get_post($static_posts_page_selected_id);
                # yep, we have to transform the post page to a menu item here, as we a
                # Example found here :
                # https://github.com/wp-cli/entity-command/blob/95f2a07fdfa107aaa778711a4b5b53e962cd183a/src/Menu_Item_Command.php#L57
                $static_post_menu_entry = new stdClass();
                $static_post_menu_entry->db_id = max(array_keys($items)) + 1; # find a free id
                $static_post_menu_entry->object_id = $static_posts_page_selected_id;
                $static_post_menu_entry->type = 'nav_menu_item';
                $static_post_menu_entry->title = $static_post->post_title;
                $static_post_menu_entry->url = get_post_permalink($static_post);

                $items[$static_post_menu_entry->db_id] = $static_post_menu_entry;

                # making it a child of the selected posts page is nice
                $items[$current_item_as_menu_entry->db_id]->menu_item_parent = $static_post_menu_entry->db_id;
            } else {
                # make the current post a child of the selected posts page
                $items[$current_item_as_menu_entry->db_id]->menu_item_parent = $static_post_page->db_id;
            }
        } else {
            # we don't have a selected posts page, so do it with a default and make it the first element
            $default_posts_menu_entry = new stdClass();
            $default_posts_menu_entry->db_id = max(array_keys($items)) + 1; # find a free id
            $default_posts_menu_entry->type = 'nav_menu_item';
            $default_posts_menu_entry->menu_item_parent = 0;

            $language = get_current_language();

            if ($language === 'fr') {
                $default_posts_menu_entry->title = "Articles";
                $default_posts_menu_entry->url = site_url()."fr/?post_type=post";
            } else {
                $default_posts_menu_entry->title = "Posts";
                $default_posts_menu_entry->url = site_url()."/?post_type=post";
            }
            $items = [];  # empty all we got, the two lines under are enough
            $crumbs[] = get_rendered_crumb_item($default_posts_menu_entry, False);
            $crumbs[] = get_rendered_crumb_item($current_item_as_menu_entry, True);
        }
    }
}

# we need to find the current object in the menu
$current_objects = wp_filter_object_list($items, ['object_id' => $current_id]);
$item = $items ? reset($current_objects) : false;

$crumb_items = array();
# from the current element, go up until the root
for ($crumb_item = $item;
    $crumb_item;
    $crumb_item = $items[(int) $crumb_item->menu_item_parent]) {
    array_unshift($crumb_items, $crumb_item);
}

if ($crumb_items) {
    foreach ($crumb_items as $crumb_item) {
        if ((int) $item->db_id === (int) $crumb_item->db_id) {
            $crumbs[] = get_rendered_crumb_item($crumb_item, True);
        } else {
            $crumbs[] = get_rendered_crumb_item($crumb_item, False);
        }
    }
}
echo implode('', $crumbs);
echo '</ol></nav>';
?>
  <!-- end Breadcrumb -->
</div>
