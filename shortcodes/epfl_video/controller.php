<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_video_action', 'renderVideo', 10, 1);

function renderVideo ($url) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Video');
    get_template_part('shortcodes/placeholder');

  } else {
    
    set_query_var('epfl_video_url', $url);
    get_template_part('shortcodes/epfl_video/view');
  }
}
