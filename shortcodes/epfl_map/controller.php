<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_map_action', 'renderMap', 10, 2);

function renderMap ($query, $lang) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Map');
    get_template_part('shortcodes/placeholder');

  } else {

    set_query_var('epfl_map_query', $query);
    set_query_var('epfl_map_lang', $lang);
  
    get_template_part('shortcodes/epfl_map/view');

  }
}