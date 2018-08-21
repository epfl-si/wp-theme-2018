<?php

/** 
 * 1 (3rd argument) is the priority, higher means executed first
 * 1 (4rth argument) is number of arguments the function can accept
 **/
add_action('epfl_scienceqa_action', 'renderEpflScienceQA', 1, 1);

function renderEpflScienceQA($item) {
  ob_start();

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'EPFL Science Q&A');
    get_template_part('shortcodes/placeholder');

  } else {
    
    set_query_var('epfl_scienceqa_data', $item);
    get_template_part('shortcodes/epfl_scienceqa/view');  
  
  }
  return ob_end_flush();
}
