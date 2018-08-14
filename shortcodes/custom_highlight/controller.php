<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_shortcode( 'epfl_custom_highlight', 'renderCustomHighlightTeaser' );

// render
function renderCustomHighlightTeaser ($args) {
  set_query_var('epfl_custom_highlight_data', $args);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Custom teaser');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/custom_highlight/view');
  }
  return ob_get_clean();
}
