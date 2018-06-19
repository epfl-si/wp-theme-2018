<?php

require_once(__DIR__.'/shortcake.php');

// register
function register_shortcodes() {
	add_shortcode( 'epfl_page_teaser', 'renderPageTeaser' );
}

// render
function renderPageTeaser ($args) {
  $pageId = $args['page'];
  $page = get_post($pageId);
  set_query_var('epfl_page_teaser_data', $page);

  ob_start();
    get_template_part('shortcodes/page_teaser/view');
  return ob_get_clean();
}
