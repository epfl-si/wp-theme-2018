<?php

/**
 * From a post, build an "not in db" menu entry
 */
function build_new_item_menu_from_post( $item, $parent_menu_entry_id, $items ) {
	$menu_entry = new stdClass();
    $menu_entry->ID = get_a_free_id($items);
    $menu_entry->db_id = $menu_entry->ID;

    $menu_entry->object_id = $item->ID;
    $menu_entry->title = ! empty( $item->post_title ) ? $item->post_title : '';
    $menu_entry->url = ! empty( get_post_permalink($item) ) ? get_post_permalink($item) : '';
    $menu_entry->menu_item_parent = $parent_menu_entry_id;

    $menu_entry->classes = [];
    $menu_entry->type = 'post_type';  // don't set nav_menu_item -> problems
    $menu_entry->post_parent = 'post_type';
    $menu_entry->xfn = '';
    $menu_entry->menu_order = 0;
    $menu_entry->object = 'post';
    $menu_entry->target = '';

    return $menu_entry;
}

/**
 * Build an "not in db" menu entry
 * This menu entry will be labeled as "Posts" or "Articles" in french, and
 * serve as a fallback if we don't any satisfaying menu entry for posts
 */
function build_a_fallback_posts_menu_item($items) {
    $fallback_posts_menu_entry = new stdClass();
    $fallback_posts_menu_entry->ID = get_a_free_id($items);
    $fallback_posts_menu_entry->db_id = $fallback_posts_menu_entry->ID;

    $fallback_posts_menu_entry->menu_item_parent = 0;

    $fallback_posts_menu_entry->object_id = null;
    $fallback_posts_menu_entry->classes = [];
    $fallback_posts_menu_entry->type = 'post_type';
    $fallback_posts_menu_entry->post_parent = 'post_type';
    $fallback_posts_menu_entry->xfn = '';
    $fallback_posts_menu_entry->menu_order = null;  // menu_order set to something = break
    $fallback_posts_menu_entry->object = 'post';
    $fallback_posts_menu_entry->target = '';

    $language = get_current_language();
    $particule = '';

    if (function_exists('pll_default_language')) {
        // check if we need the particule or the default page
        if ($language != pll_default_language()) {
            $particule = '/' . $language;
        }
    }

    if ( $language === 'fr' ) {
        $fallback_posts_menu_entry->title = "Articles";
        $fallback_posts_menu_entry->url = site_url() . $particule . "/?post_type=post";
    } else {
        $fallback_posts_menu_entry->title = "Posts";
        $fallback_posts_menu_entry->url = site_url(). $particule . "/?post_type=post";
    }

    return $fallback_posts_menu_entry;
}

function get_a_free_id($items) {
    // get a free id in all database, not only $items
    // as we don't want to clash with other db entries
    global $wpdb;

    $querystr = "
        SELECT * FROM $wpdb->posts ORDER BY id DESC LIMIT 0, 1
    ";
    $hightest_id = 1;
    $hightest_id_array = $wpdb->get_results($querystr, OBJECT);
    if (!empty($hightest_id_array)) {
        $hightest_id = (int)$hightest_id_array[0]->ID;
        $hightest_id += 1;
    }

    // take on that is not already in $items
    $wp_filter_object_list = [$hightest_id];

    while (!empty($wp_filter_object_list)) {
        $hightest_id += 1;
        $wp_filter_object_list = wp_filter_object_list($items, ['ID' => $hightest_id]);
    }

    return (int) $hightest_id;
}

/**
 *
 * From a menu_entry, set the parent to the current homepage if we aim to be root
 * Add the homepage if it is missing as menu entry
 * if no current homepage is set, then leave it at root
 * @return the modified menu entry
 *
 */
function set_homepage_or_root($menu_entry, &$items) {

    $home_page_id = has_home_page_selected();
    $translated_static_home_page_selected_id = null;

    if ( $home_page_id ) {
        # get the good translated version, if any, and if Polylang installed
        if( function_exists('pll_get_post') ) {
            $translated_static_home_page_selected_id = pll_get_post($home_page_id);
            $home_page_id = $translated_static_home_page_selected_id;
        }

        if ( $home_page_id && !empty($items) ) {  // a selected homepage and a menu, how nice !
            # check if this homepage menu entry page is in the menu, because we need it now
            $selected_home_page_filtered = wp_filter_object_list($items, ['object_id' => $home_page_id]);
            $selected_homepage_menu_entry = reset($selected_home_page_filtered);

            # create the homepage entry menu if it is missing in the menu
            if ( empty( $selected_homepage_menu_entry ) ) {
                # homepage not in the menu, add it manually at root
                $home_page_post = get_post($home_page_id);

                if ( is_null( $home_page_post ) ) { // no page for homepage, we can not do anything
                    return;
                }

                // create the homepage menu entry at root, like the user should at least have done
                $selected_homepage_menu_entry = build_new_item_menu_from_post($home_page_post, 0, $items);  // 0 = make it root
                $items[] = $selected_homepage_menu_entry;
            }

            // attach the provided menu_entry, as the homepage is in the menu now
            $menu_entry->menu_item_parent = $selected_homepage_menu_entry->ID;
            return $menu_entry;
        }
    }

    // for all other case, return as is
    return $menu_entry;
}


 /**
 * Getting the parent of a blog menu item can be tricky,
 * as the site may have different states:
 * - the post is already in the menu
 * - a selected homepage (that we want at the the parent if we can)
 *   - in the menu
 *   - not in the menu
 * - a front blog page is selected
 *   - in the menu,
 *   - not in the menu
 *
 * In this function we select and, if necessery, add to $items the parent entry.
 *
 * @return the correct parent menu entry, created from scratch
 * or already existing, and setted at the good position in the menu hierarchy
 */
function set_best_parent_for_blog_entry(&$items) {
    $static_posts_page_selected_id = has_static_posts_page_selected();
    $translated_static_posts_page_selected_id = null;

    if ( $static_posts_page_selected_id ) {
        # get the good translated version, if any
        # and if Polylang is installed
	    if( function_exists('pll_get_post') ) {
            $translated_static_posts_page_selected_id = pll_get_post($static_posts_page_selected_id);
            $static_posts_page_selected_id = $translated_static_posts_page_selected_id;
        }
    }

    if ( $static_posts_page_selected_id && !empty($items) ) {  // a selected posts page and a menu, how nice !
        # check if this static posts page is in the menu, because we need it now
        $static_post_page_filtered = wp_filter_object_list($items, ['object_id' => $static_posts_page_selected_id]);
        $static_post_menu_item = reset($static_post_page_filtered);

        if ( empty( $static_post_menu_item ) ) {
            # static post page is not in the menu, add it manually at root
            $static_post = get_post($static_posts_page_selected_id);
            $static_post_menu_item = build_new_item_menu_from_post($static_post, 0, $items);  // 0 = make it root
            array_unshift($items, $static_post_menu_item);  // add it at top
            set_homepage_or_root($static_post_menu_item, $items);
        }
    } else {
        # we don't have a selected posts page, so do it with a default
        $static_post_menu_item = build_a_fallback_posts_menu_item($items);//$get_currently_viewed_element_id);
        array_unshift($items, $static_post_menu_item);  // add it at top
        set_homepage_or_root($static_post_menu_item, $items);
    }

    return $static_post_menu_item;
}

/**
 * The hamburger menu need to have a structure like this:
 * current-menu-ancestor (x times)
 * |
 * - current-menu-parent (only one)
 *   |
 *   - current-menu-item (only one)
 *
 * if you fail to get this right, you may say some artefacts and strange behavior
 * Dont forget to look into the div nav-container, as it follows the rules too, but is out of scope
 */
function set_menu_items_classes_for_hamburger(&$items) {
    # get current
    $wp_filter_object_list = wp_filter_object_list( $items, ['current' => True]);
    $current_menu_entry = reset($wp_filter_object_list);

    if (!$current_menu_entry) {
        return;
    }

    if (!property_exists($current_menu_entry, 'classes')) {
        $current_menu_entry->classes = [];
    }
    if (!in_array('current-menu-item', $current_menu_entry->classes)) {
        array_push($current_menu_entry->classes, 'current-menu-item');
    }

    if (!property_exists($current_menu_entry, 'menu_item_parent') ||
        (int) $current_menu_entry->menu_item_parent == 0) {
        return;
    }

    // go to the parent directly
    $current_menu_entries = wp_filter_object_list($items, ['ID' => $current_menu_entry->menu_item_parent]);
    $current_menu_entry = reset($current_menu_entries);

    $first_iteration = True;

    # from current, get back the tree, parent, then ancestors
    while ($current_menu_entry) {
        $class_needed = $first_iteration ? 'current-menu-parent' : 'current-menu-ancestor';

        if (!property_exists($current_menu_entry, 'classes')) {
            $current_menu_entry->classes = [];
        }

        if (!in_array($class_needed, $current_menu_entry->classes)) {
            array_push($current_menu_entry->classes, $class_needed);
        }

        $current_menu_entries = wp_filter_object_list($items, ['ID' => $current_menu_entry->menu_item_parent]);
        $current_menu_entry = reset($current_menu_entries);
        $first_iteration = False;
    }
}

/*************************
 * Hooks
 **************************/

/**
 * Build a custom entry menu hierarchy for blog post, blog post list (WP: is_home()) or archives page (WP: is_archive()).
 * @param array  $items An array of menu item post objects.
 * @param object $menu  The menu object.
 * @param array  $args  An array of arguments used to retrieve menu item objects.
 *
 */
function provide_custom_nav_menu_items_for_blog($items, $menu, $args = array()) {

    if ( is_page() ) {  // leave the page "as is"
        return $items;
    }

    // is the current viewed element already in the menu ?
    $current_menu_entry = get_menu_entry_from_element_id($items, get_currently_viewed_element_id());
    if ($current_menu_entry) {
        $current_menu_entry->current = True;
        return $items;
    }

    // let's build a nice menu for all the cases where the blog entry has not his place in the menu
    if (is_single() && 'post' == get_post_type()) {
        $parent_menu_item = set_best_parent_for_blog_entry($items);
        $current_post_menu_item = build_new_item_menu_from_post(get_post(), $parent_menu_item->ID, $items);
        $current_post_menu_item->current = True;
        $items[] = $current_post_menu_item;
        set_menu_items_classes_for_hamburger($items);

        return $items;
    }
    elseif (is_archive() || get_queried_object()) {

        $parent_menu_item = set_best_parent_for_blog_entry($items);
        $current_post_menu_item = build_new_item_menu_from_post(get_post(), $parent_menu_item->ID, $items);
        $parent_menu_item->current = True;  // make it current selected element
        //$parent_menu_item->current_item_parent = True;
        set_menu_items_classes_for_hamburger($items);

        return $items;
    }
    elseif (is_home()) {
        $parent_menu_item = set_best_parent_for_blog_entry($items);

        $parent_menu_item->current = True;  // make it current selected element

        set_menu_items_classes_for_hamburger($items);

        return $items;
    } else {
        // for all other cases, menu editor...
        return $items;
    }
}

add_filter('wp_get_nav_menu_items', 'provide_custom_nav_menu_items_for_blog', 29, 2);

/**
 * Remove tag class for body in pages like /tag/*.
 * As the styleguide use it already for something else,
 * it breaks the design of <body>
 */
add_filter('body_class', function (array $classes) {
    if (in_array('tag', $classes)) {
      unset( $classes[array_search('tag', $classes)] );
    }
  return $classes;
});
