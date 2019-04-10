<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_labs_search_action', 'renderLabsSearch', 10, 1);

function add_jquery() {
  wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'add_jquery' );

add_action('wp_ajax_labs_search_form', 'labs_search_form_submitted');
add_action('wp_ajax_nopriv_labs_search_form', 'labs_search_form_submitted');

/**
 * render the shortcode, mainly a form and his table
 */
function renderLabsSearch($predefined_tags) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Laboratories search');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_labs-predefined_tags', $predefined_tags);
    get_template_part('shortcodes/epfl_labs_search/view');
  }
}

/**
 * React to a submitted form
 */
function labs_search_form_submitted() {
  check_ajax_referer( 'epfl_labs_search' );
  $search_text = $_GET['labs_search_text'];
  $predefined_tags = $_GET['labs_search_predefined_tags'];

  if (empty($search_text) && empty($predefined_tags)) {
    wp_send_json_success('');
  }

  if (has_action("epfl_labs_search_action_callback"))
  {
    $sites = apply_filters('epfl_labs_search_action_callback', $search_text, $predefined_tags);
    wp_send_json_success($sites);
  } else {
    wp_send_json_error('The callback is missing for the search action');
  }
}

