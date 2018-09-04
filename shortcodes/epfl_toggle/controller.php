<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_toggle_action', 'renderToggle', 10, 1);

function renderToggle ($args) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Toggle');
    get_template_part('shortcodes/placeholder');

  } else {

    $fields = array();
    foreach ($args as $key => $value) {
      $toggle_key = substr($key, -1);
      $field_name = substr($key, 0, -1);  
      $fields[$toggle_key][$field_name] = $value;
    }
    set_query_var('epfl_toggle_data', $fields);
    get_template_part('shortcodes/epfl_toggle/view');
  }
}
