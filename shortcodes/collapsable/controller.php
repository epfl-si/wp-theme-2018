<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_action( 'init', function() {
  add_shortcode( 'epfl_collapsable', 'renderCollapsable' );
});

function renderCollapsable ($args) {
  set_query_var('epfl_collapsable_data', $args);

  ob_start();

  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Collapsable');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/collapsable/view');
  }

  return ob_get_clean();
}
