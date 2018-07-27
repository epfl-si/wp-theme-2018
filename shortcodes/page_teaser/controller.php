<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_shortcode( 'epfl_page_teaser', 'renderPageTeaser' );

// render
function renderPageTeaser ($args) {
  $pages = array();
  foreach($args as $arg) {
    array_push($pages, get_post($arg));
  }
  set_query_var('epfl_page_teaser_data', $pages);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Page teaser');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/page_teaser/view');
  }
  return ob_get_clean();
}
