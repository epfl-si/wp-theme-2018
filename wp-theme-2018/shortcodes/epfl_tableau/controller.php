<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_tableau_action', 'renderTableau', 10, 3);

function renderTableau($url, $width, $height) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Tableau');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_tableau-url', $url);
    set_query_var('epfl_tableau-width', $width);
    set_query_var('epfl_tableau-height', $height);
    get_template_part('shortcodes/epfl_tableau/view');
  }
}
