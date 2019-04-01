<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_labs_search_action', 'renderLabsSearch', 10, 0);

wp_enqueue_script('jquery');

add_action('wp_ajax_labs_search_form', 'labs_search_form_submitted');
add_action('wp_ajax_nopriv_labs_search_form', 'labs_search_form_submitted');

function labs_search_form_submitted() {
  check_ajax_referer( 'epfl_labs_search' );
  wp_send_json_success($_GET['labs_search_text']);
}

function renderLabsSearch() {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Laboratories search');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_labs-query', $query);
    get_template_part('shortcodes/epfl_labs_search/view');
  }
}
