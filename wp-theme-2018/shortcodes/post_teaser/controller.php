<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_shortcode( 'epfl_post_teaser', 'renderpostTeaser' );

// render
function renderpostTeaser ($args) {
  foreach($args as $key => $arg) {
    if (strpos($key, 'post') !== 0) continue;
    $args[$key] = get_post($arg);
  }
  set_query_var('epfl_post_teaser_data', $args);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Post teaser');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/post_teaser/view');
  }
  return ob_get_clean();
}
