<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_cover_action', 'renderCover', 10, 2);

function renderCover ($image, $description) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Cover');
    get_template_part('shortcodes/placeholder');

  } else {

    // render for frontend
    set_query_var('epfl_cover_image', $image);
    set_query_var('epfl_cover_description', $description);
    get_template_part('shortcodes/epfl_cover/view');

  }
}