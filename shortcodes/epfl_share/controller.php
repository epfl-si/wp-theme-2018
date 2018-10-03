<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_share_action', 'renderShare', 10, 3);

function renderShare($post_title, $target_url, $target_url_encoded) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Share buttons');
    get_template_part('shortcodes/placeholder');
  } else {
    // render for frontend
    set_query_var('epfl_share_post_title', $post_title);
    set_query_var('epfl_share_target_url', $target_url);
    set_query_var('epfl_share_target_url_encoded', $target_url_encoded);
    get_template_part('shortcodes/epfl_share/view');
  }
}
