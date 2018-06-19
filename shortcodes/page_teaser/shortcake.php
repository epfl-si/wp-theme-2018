<?php

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
		'epfl_page_teaser',
		array(
      'label' => 'Page teaser',
      'listItemImage' => 'dashicons-format-aside',
      'attrs' => $fields
    )
	);
}