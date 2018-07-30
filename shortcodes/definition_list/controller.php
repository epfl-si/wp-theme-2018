<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_action( 'init', function() {
  add_shortcode( 'epfl_definition_list', 'renderDefinitionList' );
});

function renderDefinitionList ($args) {
  set_query_var('epfl_definition_list_data', $args);

  ob_start();

  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Definition list');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/definition_list/view');
  }

  return ob_get_clean();
}
