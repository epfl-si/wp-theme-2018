<?php

require_once(__DIR__.'/shortcake.php');

// register
add_shortcode( 'epfl_custom_teasers', 'renderCustomCards' );

// render
function renderCustomCards ($args) {
  set_query_var('epfl_custom_teasers_data', $args);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Custom teasers');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/custom_teasers/view');
  }
  return ob_get_clean();
}
