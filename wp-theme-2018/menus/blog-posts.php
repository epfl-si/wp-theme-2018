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
 * From a target object id (can be a post, a term, ...), build an "not in db" menu entry
 */
function build_a_root_posts_menu_item_from_scratch($items) {
    $default_posts_menu_entry = new stdClass();
    $default_posts_menu_entry->ID = get_a_free_id($items);
    $default_posts_menu_entry->db_id = $default_posts_menu_entry->ID;
    $default_posts_menu_entry->menu_item_parent = 0;

    $default_posts_menu_entry->object_id = null;
    $default_posts_menu_entry->classes = [];
    $default_posts_menu_entry->type = 'post_type';
    $default_posts_menu_entry->post_parent = 'post_type';
    $default_posts_menu_entry->xfn = '';
    $default_posts_menu_entry->menu_order = null;  // menu_order set to something = break
    $default_posts_menu_entry->object = 'post';
    $default_posts_menu_entry->target = '';

    $language = get_current_language();

    if ( $language === 'fr' ) {
        $default_posts_menu_entry->title = "Articles";
        $default_posts_menu_entry->url = site_url()."/fr/?post_type=post";
    } else {
        $default_posts_menu_entry->title = "Posts";
        $default_posts_menu_entry->url = site_url()."/?post_type=post";
    }

    return $default_posts_menu_entry;
}

function get_a_free_id($items) {
    // get a free id in all database, not only $items

    //return 1;

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
 * Getting the parent of a blog menu item can be tricky,
 * as the user may have already chosen the place in the menu,
 * or selected a front blog page without putting it in the menu.
 * Here we select or add to $items the parent entry.
 *
 * Return the correct parent menu entry, created from scratch
 * or already existing.
 */
function set_best_parent_for_blog_entry(&$items) {
    $static_posts_page_selected_id = has_static_posts_page_selected();
    $translated_static_posts_page_selected_id = null;

    if ( $static_posts_page_selected_id ) {
        # get the good translated version, if any
        $translated_static_posts_page_selected_id;

        /* If Polylang installed */
	    if( function_exists('pll_get_post') ) {
            $translated_static_posts_page_selected_id = pll_get_post($static_posts_page_selected_id);
        }

        $static_posts_page_selected_id = $translated_static_posts_page_selected_id;
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
        }
    } else {
        # we don't have a selected posts page, so do it with a default
        $static_post_menu_item = build_a_root_posts_menu_item_from_scratch($items);//$get_currently_viewed_element_id);
        array_unshift($items, $static_post_menu_item);  // add it at top
    }

    return $static_post_menu_item;
}

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
    elseif (is_archive()) {

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
        // for all other cases, like page or menu editor...
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


/**
 * Non-test and non-functionnal, keeping for later
 * Add an activated entry menu for blog posts if needed. It is needed
 * when no current menu times are found and when a static post page is
 * selected in "Settings->Reading->Your homepage displays"
 */
function menu_for_blogs($items, $args)
{
    # force activation of the main blog page when we are in the blog view and the entry is not already in the menu
    $static_posts_page_id = has_static_posts_page_selected();
    $current_menu_item = reset(wp_filter_object_list($items, array('current' => true)));

    if ($current_menu_item) {
        array_push($current_menu_item->classes, 'active');
    }

    if (!$current_menu_item && $static_posts_page_id) {
        $static_posts_page = reset(wp_filter_object_list($items, array('object_id' => $static_posts_page_id)));
        if ($static_posts_page) {
            array_push($static_posts_page->classes, 'active');
        }
    }

    return $items;
}

# Deactivated, but keep it as sample in case want it later
#add_filter('wp_nav_menu_objects', 'menu_for_blogs', 31, 2);
