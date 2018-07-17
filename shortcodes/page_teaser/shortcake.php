<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'page_teaser' );
function page_teaser() {
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
		'epfl_page_teaser',
		array(
      'label' =>  esc_html__( 'Page teaser' , 'epfl-shortcodes'),
      'listItemImage' => '<img src="'.$iconDirectory.'page_teaser.png'.'">',
      'attrs' => $fields
    )
	);
}