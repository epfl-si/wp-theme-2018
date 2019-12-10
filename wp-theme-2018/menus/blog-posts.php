<?php
/*************************
 * Utils
 **************************/
/**
 * Check if the user has set a static page (settings->Reading->Your homepage displays)
 * Return the id if this is the case, or False
 */
function has_static_posts_page_selected()
{
    $show_on_front = get_option('show_on_front');
    $front_post_id = get_option('page_for_posts');
    if ($show_on_front == 'page' && isset($front_post_id)) {
        return $front_post_id;
    }
}

/*************************
 * Hooks
 **************************/
/**
 * Add an activated entry menu for blog posts if needed. It is needed
 * when no current menu times are found and when a static post page is
 * selected in "Settings->Reading->Your homepage displays"
 */
function menu_for_blogs($items, $args)
{
    # only for blog posts
    if (get_post_type(get_queried_object_id()) != "post") {
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

add_filter('wp_nav_menu_objects', 'menu_for_blogs', 29, 2);

/**
 * Add an activated entry menu for blog posts if needed, for the hamburger menu this time.
 * It is needed when no current menu times are found and when a static post page is
 * selected in "Settings->Reading->Your homepage displays"
 */
function css_hamburger_menu_for_blogs($classes, $item, $args, $depth)
{
    # only for blog posts
    if (get_post_type(get_queried_object_id()) != "post") {
        return $classes;
    }

    # force activation of the main blog page when we are in the blog view and the entry is not already in the menu
    $static_posts_page_id = has_static_posts_page_selected();

    if (!$item->current && $static_posts_page_id) {
        if ($static_posts_page_id == $item->object_id) {
            array_push($classes, 'current-menu-item');
        }
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'css_hamburger_menu_for_blogs', 30, 4);