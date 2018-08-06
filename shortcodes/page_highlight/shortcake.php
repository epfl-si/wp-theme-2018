<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'page_highlight' );
function page_highlight() {
  $fields = [
    array(
      'label'    => esc_html__( 'Select page' , 'epfl-shortcodes'),
			'attr'     => 'page',
			'type'     => 'post_select',
			'query'    => array( 'post_type' => 'page' )
		)
  ];

global $iconDirectory;

	shortcode_ui_register_for_shortcode(
		'epfl_page_highlight',
		array(
      'label' =>  esc_html__( 'Page Highlight' , 'epfl-shortcodes'),
      'listItemImage' => '<img src="'.$iconDirectory.'page_highlight.png'.'">',
      'attrs' => $fields
    )
	);
}