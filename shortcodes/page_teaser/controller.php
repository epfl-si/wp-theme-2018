<?php

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

// register shortcake UI
add_action( 'register_shortcode_ui', 'page_teaser' );
function page_teaser() {
  $fields = [
    array(
      'label'    => 'Select page',
			'attr'     => 'page',
			'type'     => 'post_select',
			'query'    => array( 'post_type' => 'page' )
		)
  ];
	shortcode_ui_register_for_shortcode(
		'epfl-page-teaser',
		array(
      'label' => 'Page teaser',
      'listItemImage' => 'dashicons-format-aside',
      'attrs' => $fields
    )
	);
}
