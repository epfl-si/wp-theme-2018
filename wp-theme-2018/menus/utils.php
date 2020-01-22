<?php
/*************************
 * Utils
 **************************/

// for reference, is it too wide, don't use
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

/**
 * Get the element viewed, depending if this is an archive or a post
 * @return the id of the element viewed, or false if no element
 */
function get_currently_viewed_element_id() {
	$id = false;

	if (is_archive()) {  // archive return a get_post(),
						 // but it's the not the currently viewed element. So check first
		$get_queried_object = get_queried_object();
		if ($get_queried_object && property_exists($get_queried_object, 'term_id')) {
			return $get_queried_object->term_id;
		}
	} else {
		$id = get_the_ID();
    }

	return $id;
}

/**
 * From a list of menu items, get the one that concerns $element_id
 */
function get_menu_entry_from_element_id($menu_items, $element_id) {
	$items = wp_filter_object_list($menu_items, ['object_id' => $element_id]);
	return reset($items);
}

/**
 * From a list of menu items, get the one with "current" set
 */
function get_current_menu_entry($menu_items) {
    $items = wp_filter_object_list($menu_items, ['current' => True]);

    if (count($items) > 1) {
        error_log("Warning, multiple menu entries are set to 'current', fix your code");
    }

	return reset($items);
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

function error_log_useful_debugging_information() {
    error_log("has_the_blog_post_selected: " . var_export(has_static_posts_page_selected(), True));
    error_log("is_home: " . var_export(is_home(), True));
    error_log("is_archive: " . var_export(is_archive(), True));
    error_log("is_single: " . var_export(is_single(), True));
    error_log("is_singular: " . var_export(is_singular(), True));
    error_log("is_page: " . var_export(is_page(), True));
    error_log("get_post: " . var_export(get_post() ? "true" : "false", True));
    error_log("get_post->post_title: " . var_export(get_post()->post_title, True));
    error_log("get_queried_object: " . var_export(get_queried_object()? "true" : "false", True));
    if (get_queried_object()) {
        error_log("get_queried_object->*dynamic_title*: " . var_export(get_queried_object()->cat_name, True));
    }
    error_log("get_currently_viewed_element_id: " . var_export(get_currently_viewed_element_id(), True));
    $items = wp_get_nav_menu_items(get_current_menu_slug());
    error_log("has_post_a_menu_entry: " . var_export(get_menu_entry_from_element_id($items, get_currently_viewed_element_id())? "true" : "false", True));

    error_log("menu has a current entry: " . var_export(get_current_menu_entry($items)? "true" : "false", True));

    // list filters
    //global $wp_filter;
    //error_log("filters: " . var_export( $wp_filter['wp_get_nav_menu_items'], True));

    // Useful little line
    //var_dump(array_map(create_function('$o', 'return $o->title;'), $items));  // deprecated
    //var_dump(array_map(function($o) {return $o->title;}, $items));
}
