<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_action( 'init', function() {
  add_shortcode( 'epfl_introduction', 'renderIntroduction' );
});

function renderIntroduction ($args) {
  set_query_var('epfl_introduction_data', $args);

  ob_start();

  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Introduction');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/introduction/view');
  }

  return ob_get_clean();
}
