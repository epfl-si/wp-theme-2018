<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'epfl_introduction' );
function epfl_introduction() {
  $fields = [
    [
      'label' => '<h3>' . esc_html__('Title', 'epfl-shortcodes') . '</h3>',
      'attr' => 'title',
      'type' => 'text',
    ],
    [
      'label' => '<h2>' .esc_html__('Content', 'epfl-shortcodes') . '</h2>' ,
      'attr' => 'content',
      'type' => 'textarea',
    ],
    [
      'label' => esc_html__('Gray background', 'epfl-shortcodes') ,
      'attr' => 'gray',
      'type' => 'checkbox',
      'description' => esc_html__('Change the background to gray', 'epfl-shortcodes')
    ]
  ];

  global $iconDirectory;
	shortcode_ui_register_for_shortcode(
		'epfl_introduction',
		array(
      'label' => esc_html__( 'Introduction', 'epfl-shortcodes'),
      'attrs' => $fields,
      'listItemImage' => '<img src="'.$iconDirectory.'introduction.png'.'">',
    )
	);
}