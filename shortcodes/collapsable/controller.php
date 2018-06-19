<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_action( 'init', function() {
  add_shortcode( 'epfl_collapsable', 'renderCollapasable' );
});

// render
function renderCollapasable ($args) {
  set_query_var('epfl_collapsable_data', $args);

  ob_start();
    get_template_part('shortcodes/collapsable/view');
  return ob_get_clean();
}
