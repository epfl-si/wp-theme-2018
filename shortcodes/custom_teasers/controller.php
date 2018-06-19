<?php

require_once(__DIR__.'/shortcake.php');

// register
add_shortcode( 'epfl_custom_teasers', 'renderCustomCards' );


// render
function renderCustomCards ($args) {
  set_query_var('epfl_custom_teasers_data', $args);

  ob_start();
  get_template_part('shortcodes/custom_teasers/view');
  return ob_get_clean();
}
