<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_links_group_action', 'renderLinksGroup', 10, 1);

function renderLinksGroup ($args) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Links group');
    get_template_part('shortcodes/placeholder');

  } else {

    set_query_var('epfl_links_group_main_url', $args['main_url']);
    set_query_var('epfl_links_group_title', $args['title']);

    unset($args['main_url']);
    unset($args['title']);

    $links = [];
    foreach ($args as $key => $value) {
      $field_key = substr($key, -1);
      $field_name = substr($key, 0, -1);  
      $links[$field_key][$field_name] = $value;
    }
    set_query_var('epfl_links_group_links', $links);
    
    get_template_part('shortcodes/epfl_links_group/view');
  }
}