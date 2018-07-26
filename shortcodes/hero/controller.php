<?php

require_once(__DIR__.'/shortcake.php');

// register
add_shortcode( 'epfl_hero', 'renderHero' );

// render
function renderHero ($args) {
  set_query_var('epfl_hero_data', $args);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Hero');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/hero/view');
  }
  return ob_get_clean();
}
