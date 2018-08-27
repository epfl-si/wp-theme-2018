<?php

/** 
 * 1 (3rd argument) is the priority, higher means executed first
 * 3 (4rth argument) is number of arguments the function can accept
 **/
add_action('epfl_event_action', 'renderMemento', 1, 3);

function renderMemento($events, $template, $memento) {
  ob_start();

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Memento');
    get_template_part('shortcodes/placeholder');

  } else {

    $results = $events->results;
    set_query_var('epfl_memento_template', $template);
    set_query_var('epfl_memento_name', $memento);
    set_query_var('epfl_memento_data', $results);
    get_template_part('shortcodes/epfl_memento/view');  
    
  }
  return ob_end_flush();
}