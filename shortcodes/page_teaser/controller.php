<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_shortcode( 'epfl_page_teaser', 'renderPageTeaser' );

// render
function renderPageTeaser ($args) {
  foreach($args as $key => $arg) {
    if (strpos($key, 'page') !== 0) continue;
    $args[$key] = get_post($arg);
  }
  set_query_var('epfl_page_teaser_data', $args);

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
