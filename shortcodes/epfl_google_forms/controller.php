<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_google_forms_action', 'renderGoogleForms', 10, 4);

function renderGoogleForms ( $src, $width, $height, $loading) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'GoogleForms');
    get_template_part('shortcodes/placeholder');

  } else {

    set_query_var('epfl_google_forms_src', $src);
    set_query_var('epfl_google_forms_width', $width);
    set_query_var('epfl_google_forms_height', $height);
    set_query_var('epfl_google_forms_loading', $loading);
    get_template_part('shortcodes/epfl_google_forms/view');
  }
}
