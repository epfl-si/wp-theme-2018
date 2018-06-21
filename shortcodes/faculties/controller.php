<?php

require_once(__DIR__.'/shortcake.php');

// register
add_shortcode( 'epfl_faculties', 'renderFaculties' );

// render
function renderFaculties ($args) {
  set_query_var('epfl_faculties_data', $args);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Faculties');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/faculties/view');
  }
  return ob_get_clean();
}
