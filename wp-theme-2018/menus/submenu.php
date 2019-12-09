<?php
add_filter( 'wp_nav_menu_objects', 'menu_for_blogs', 29, 2 );
add_filter( 'wp_nav_menu_objects', 'submenu_limit', 30, 2 );

/**
 * Check if the user has set a static page (settings->Reading->Your homepage displays)
 * Return the id if this is the case, or False
  */

function has_static_posts_page_selected() {
  $show_on_front = get_option('show_on_front');
  $front_post_id = get_option('page_for_posts');
  if ($show_on_front == 'page' && isset($front_post_id)) {
    return $front_post_id;
  }
}

/**
 * Add an activated entry menu for blog posts if needed. It is needed
 * when no current menu times are found and when a static post page is
 * selected in "Settings->Reading->Your homepage displays"
 */
function menu_for_blogs( $items, $args ) {
  # only for blog posts
  if (get_post_type(get_queried_object_id()) != "post") {
    return $items;
  }

  # force activation of the main blog page when we are in the blog view and the entry is not already in the menu
  $static_posts_page_id = has_static_posts_page_selected();
  $current_menu_item = reset(wp_filter_object_list( $items, array( 'current' => true ) ));

  if ( !$current_menu_item && $static_posts_page_id ) {
    $static_posts_page = reset(wp_filter_object_list( $items, array( 'object_id' => $static_posts_page_id ) ));
    if ($static_posts_page) array_push($static_posts_page->classes, 'active');
  }

  return $items;
}

/**
 * function submenu_limit
 *
 * This function will filter any menu which has $args->submenu set.
 * Then it will check for $args->submenu_type:
 * 'siblings' -> display only actual menu item siblings
 * 'children' -> display only current menu item and it's direct children
 * 'all' -> display all siblings AND direct children
 * @param array $items all the menu items
 * @param $args all menu arguments
 * @return void
 */
function submenu_limit( $items, $args ) {
    //return $items;
    if ( empty( $args->submenu ) ) {
        return $items;
    }

    $submenu_type = $args->submenu_type ?: 'all';

    $current_menu_item = reset(wp_filter_object_list( $items, array( 'current' => true ) ));
    if ($current_menu_item) array_push($current_menu_item->classes, 'active');

    $selectedIds = [];

    if ($submenu_type == 'children'){
      // filter children
      $selectedIds = submenu_get_direct_children_ids( $current_menu_item->ID , $items );
      // allow current menu item to be display with it's children
      array_push($selectedIds, $current_menu_item->ID);
    }
    else if ($submenu_type == 'siblings') {

      $parent_menu_item = reset(wp_filter_object_list( $items, array( 'current_item_parent' => true ) ));
      $selectedIds = submenu_get_direct_children_ids( $parent_menu_item->ID ?: 0 , $items );

    } else if ($submenu_type == 'all') {
      $parent_menu_item = reset(wp_filter_object_list( $items, array( 'current_item_parent' => true ) ));
      $siblings = submenu_get_direct_children_ids( $parent_menu_item && $parent_menu_item->ID ? $parent_menu_item->ID : 0 , $items );
      $children = submenu_get_direct_children_ids( $current_menu_item && $current_menu_item->ID ? $current_menu_item->ID : 0 , $items );
      $selectedIds = array_merge($siblings, $children);
    }

    foreach ( $items as $key => $item ) {
      if ( ! in_array( $item->ID, $selectedIds ) ) {
        unset( $items[$key] );
      }
    }

    return $items;
}

/**
 * function submenu_get_direct_children_ids
 *
 * @param [type] $id the actual menu item
 * @param [type] $items all the menu items
 * @return array of directly related children menu items
 */
function submenu_get_direct_children_ids( $id, $items ) {

  $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );

  return $ids;
}

/**
 * function submenu_get_recursive_children_ids
 *
 * @param [type] $id the actual menu item
 * @param [type] $items all the menu items
 * @return array of all the menu item childrens
 */
function submenu_get_recursive_children_ids( $id, $items ) {

  $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );

  foreach ( $ids as $id ) {
    $ids = array_merge( $ids, submenu_get_children_ids( $id, $items ) );
  }

  return $ids;
}
