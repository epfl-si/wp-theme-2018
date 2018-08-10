<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_shortcode( 'epfl_page_highlight', 'renderPageHighlightTeaser' );

// render
function renderPageHighlightTeaser ($args) {
  set_query_var('epfl_page_highlight_data', $args);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Page highlight');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/page_highlight/view');
  }
  return ob_get_clean();
}
