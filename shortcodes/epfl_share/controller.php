<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_share_2018', 'renderShare', 10, 2);

function renderShare($image, $description) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Share buttons');
    get_template_part('shortcodes/placeholder');
  } else {
    // render for frontend
    get_template_part('shortcodes/epfl_share/view');
  }
}
