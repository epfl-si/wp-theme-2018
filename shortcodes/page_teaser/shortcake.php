<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'page_teaser' );
function page_teaser() {
  $fields = array();

  array_push($fields,
    [
      'label' => esc_html__('Gray background', 'epfl-shortcodes') ,
      'attr' => 'gray',
      'type' => 'checkbox',
      'description' => esc_html__('Change the background to gray', 'epfl-shortcodes')
    ]);

  for($i; $i < 3; $i++) {
    array_push($fields, array(
      'label'    => esc_html__( 'Select page' , 'epfl-shortcodes'),
			'attr'     => 'page'.$i,
			'type'     => 'post_select',
			'query'    => array( 'post_type' => 'page' )
		));
  }

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