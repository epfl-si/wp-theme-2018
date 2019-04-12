<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_labs_search_action', 'renderLabsSearch', 10, 2);

wp_enqueue_script( 'epfl-listjs', __DIR__. '/lib/list.js', ['jquery'], 1.5, true);

/**
 * render the shortcode, mainly a form and his table
 */
function renderLabsSearch($sites, $predefined_tags) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Laboratories search');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_labs-sites', $sites);
    set_query_var('epfl_labs-predefined_tags', $predefined_tags);
    get_template_part('shortcodes/epfl_labs_search/view');
  }
}
