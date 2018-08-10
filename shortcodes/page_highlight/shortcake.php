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
		),
    array(
      'label'    => esc_html__( 'Layout' , 'epfl-shortcodes'),
			'attr'     => 'layout',
      'description' => esc_html__( 'Decides where the text will be aligned, to allow the subject of the picture to be visible', 'epfl-shortcodes'),
			'type'     => 'radio',
      'options'     => array(
				array( 'value' => '', 'label' => esc_html__( 'Right', 'epfl-shortcodes') ),
				array( 'value' => 'bottom', 'label' => esc_html__( 'Bottom', 'epfl-shortcodes') ),
				array( 'value' => 'left', 'label' => esc_html__( 'Left', 'epfl-shortcodes') ),
			),
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