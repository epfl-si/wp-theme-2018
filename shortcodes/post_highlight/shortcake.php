<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'post_highlight' );
function post_highlight() {
  $fields = [
    array(
      'label'    => esc_html__( 'Select post' , 'epfl-shortcodes'),
			'attr'     => 'post',
			'type'     => 'post_select',
			'query'    => array( 'post_type' => 'post' )
		)
  ];

global $iconDirectory;

	shortcode_ui_register_for_shortcode(
		'epfl_post_highlight',
		array(
      'label' =>  esc_html__( 'Post highlight' , 'epfl-shortcodes'),
      'listItemImage' => '<img src="'.$iconDirectory.'page_highlight.png'.'">',
      'attrs' => $fields
    )
	);
}