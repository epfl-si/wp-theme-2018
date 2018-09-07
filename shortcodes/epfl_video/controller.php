<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_video_action', 'renderVideo', 10, 3);

function renderVideo ($url, $width, $height) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Video');
    get_template_part('shortcodes/placeholder');

  } else {
    
    set_query_var('epfl_video_url', $url);
    set_query_var('epfl_video_width', $width);
    set_query_var('epfl_video_height', $height);
    get_template_part('shortcodes/epfl_video/view');
  }
}
