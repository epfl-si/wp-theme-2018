<?php
/*************************
 * Utils
 **************************/

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

/**
 * Check if the user has set a static page (settings->Reading->Your homepage displays)
 * Return the id if this is the case, or False
 */
function has_static_posts_page_selected()
{
    static $static_posts_page_id = null;  # cache it because the db hit

    if (is_null($static_posts_page_id)){
        $show_on_front = get_option('show_on_front');
        $front_post_id = get_option('page_for_posts');
        if ($show_on_front == 'page' && isset($front_post_id)) {
            $static_posts_page_id = $front_post_id;
        } else {
            $static_posts_page_id = False;
        }
    }
    return $static_posts_page_id;
}

/**
 * on a blog page, we need the parent
 * @param object $items An array of menu item post objects.
 *
 */
function get_parent_menu_entry_for_blogs( $items ) {
    # let's find the best parent for a blog post
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
            $static_post_menu_entry->db_id = get_a_free_id($items);
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
        $default_posts_menu_entry->db_id = get_a_free_id($items);
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
    }
}

function build_new_item_menu_from_post( $item, $parent_menu_entry_id, $items ) {
	$menu_entry = new stdClass();

    $menu_entry->object_id = $item->ID;
    $menu_entry->title = ! empty( $item->post_title ) ? $item->post_title : '';
    $menu_entry->url = ! empty( get_post_permalink($item) ) ? get_post_permalink($item) : '';
    $menu_entry->menu_item_parent = $parent_menu_entry_id;
    $menu_entry->db_id = get_a_free_id($items);
    $menu_entry->ID = $menu_entry->db_id;

    $menu_entry->classes = [];
    $menu_entry->type = 'post_type';
    $menu_entry->post_parent = 'post_type';
    $menu_entry->xfn = '';
    $menu_entry->menu_order = 0;
    $menu_entry->object = 'post';
    $menu_entry->target = '';

    return $menu_entry;
}

function build_a_static_post_menu_item_from_nothing($items) {
    $default_posts_menu_entry = new stdClass();
    $default_posts_menu_entry->db_id = get_a_free_id($items);
    $default_posts_menu_entry->ID = $default_posts_menu_entry->db_id;
    $default_posts_menu_entry->type = 'post_type';
    $default_posts_menu_entry->menu_item_parent = 0;

    $language = get_current_language();

    if ($language === 'fr') {
        $default_posts_menu_entry->title = "Articles";
        $default_posts_menu_entry->url = site_url()."fr/?post_type=post";
    } else {
        $default_posts_menu_entry->title = "Posts";
        $default_posts_menu_entry->url = site_url()."/?post_type=post";
    }

    return $default_posts_menu_entry;
}

function get_a_free_id($items) {
    if (!empty($items)) {
        return max(array_keys($items)) + 1; # find a free id
    } else {
        return 1;
    }
}

/*************************
 * Hooks
 **************************/

/**
 * Build a custom entry menu for blog
 * @param array  $items An array of menu item post objects.
 * @param object $menu  The menu object.
 * @param array  $args  An array of arguments used to retrieve menu item objects.
 *
 */
function provide_custom_nav_menu_items_for_blog($items, $menu, $args = array()) {

    // only for blog post
    if (! (is_single() && 'post' == get_post_type() ) ) {
        return $items;
    }

    $current_post = get_post();

    // only if the blog post is not in the menu already
    if( !empty( wp_filter_object_list($items, ['object_id' => $current_post->ID]) ) ) {
        return $items;
    }

    // ok, we are operating on an orphean blog entry, let's build a nice menu for him

    # let's find the best parent for this blog entry
    $static_posts_page_selected_id = has_static_posts_page_selected();

    if ( $static_posts_page_selected_id ) {  // a selected posts page, how nice !
        # check if this static posts page is in the menu, because we need it now
        $static_post_page_filtered = wp_filter_object_list($items, ['object_id' => $static_posts_page_selected_id]);
        $static_post_menu_item = reset($static_post_page_filtered);

        if( empty( $static_post_menu_item ) ) {
            # static post page is not in the menu, add it manually at root
            $static_post = get_post($static_posts_page_selected_id);
            $static_post_menu_item = build_new_item_menu_from_post($static_post, 0, $items);  // 0 = make it root

            $items[] = $static_post_menu_item;
        } else {
            if (!in_array("current-menu-parent", $static_post_menu_item->classes)) {
                array_push($static_post_menu_item->classes, 'current-menu-parent');
            }
        }
    } else {
        # we don't have a selected posts page, so do it with a default and make it the first element
        $static_post_menu_item = build_a_static_post_menu_item_from_nothing($items);

        if (!in_array("current-menu-parent", $static_post_menu_item->classes)) {
            array_push($static_post_menu_item->classes, 'current-menu-parent');
        }

        $items[] = $static_post_menu_item;
    }

    # add the current blog post as a selected child and return the full items
    $current_post_menu_item = build_new_item_menu_from_post($current_post, $static_post_menu_item->ID, $items);
    $current_post_menu_item->current = True;

    $items[] = $current_post_menu_item;

    # on all parent items of the current post, make them current-menu-ancestor
    $current_parent_item = $current_post_menu_item;

    while ($current_parent_item) {
        $last_current_parent_item = $current_parent_item;  // keep the last for next part
        if (!in_array("current-menu-ancestor", $current_parent_item->classes)) {
            array_push($current_parent_item->classes, 'current-menu-ancestor');
        }

        $current_parent_items = wp_filter_object_list($items, ['ID' => $current_parent_item->menu_item_parent]);
        $current_parent_item = reset($current_parent_items);
    }

    // set the first as parent
    if (!in_array("current-menu-parent", $last_current_parent_item->classes)) {
        #array_push($last_current_parent_item->classes, 'current-menu-parent');
    }

    return $items;
}

add_filter('wp_get_nav_menu_items', 'provide_custom_nav_menu_items_for_blog', 29, 2);

/**
 * Remove tag class for body in pages like /tag/*,
 * as the styleguide use it already for something else
 */
add_filter('body_class', function (array $classes) {
    if (in_array('tag', $classes)) {
      unset( $classes[array_search('tag', $classes)] );
    }
  return $classes;
});

/**
 * Add an activated entry menu for blog posts if needed. It is needed
 * when no current menu times are found and when a static post page is
 * selected in "Settings->Reading->Your homepage displays"
 */
function menu_for_blogs($items, $args)
{
    # only for blog posts
    if (!(is_single() && 'post' == get_post_type() ) ) {
        return $items;
    }

    # force activation of the main blog page when we are in the blog view and the entry is not already in the menu
    $static_posts_page_id = has_static_posts_page_selected();
    $current_menu_item = reset(wp_filter_object_list($items, array('current' => true)));

    if (!$current_menu_item && $static_posts_page_id) {
        $static_posts_page = reset(wp_filter_object_list($items, array('object_id' => $static_posts_page_id)));
        if ($static_posts_page) {
            array_push($static_posts_page->classes, 'active');
        }
    }

    return $items;
}

#add_filter('wp_nav_menu_objects', 'menu_for_blogs', 29, 2);

/**
 * Add an activated entry menu for blog posts if needed, for the hamburger menu this time.
 * It is needed when no current menu times are found and when a static post page is
 * selected in "Settings->Reading->Your homepage displays"
 */
function css_hamburger_menu_for_blogs($classes, $item, $args, $depth)
{
    // only for blog post
    if (! ( is_single() && 'post' == get_post_type() ) ) {
        return $items;
    }

    # force activation of the main blog page when we are in the blog view and the entry is not already in the menu
    $static_posts_page_id = has_static_posts_page_selected();

    if ($item->current) {
        #var_dump($item);
        #var_dump("current");
        #array_push($classes, 'current-menu-item');
    } else {
        #var_dump("not current");
    }

    if (!$item->current && $static_posts_page_id) {
        if ($static_posts_page_id == $item->object_id) {
            //array_push($classes, 'current-menu-item');
            //array_push($classes, 'current-page-parent');
            //array_push($classes, 'current-menu-parent');
        }
    }

    return $classes;
}

#add_filter('nav_menu_css_class', 'css_hamburger_menu_for_blogs', 30, 4);
