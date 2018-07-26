<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'epfl_collapsable' );
function epfl_collapsable() {
  $fields = [];
  for ( $i = 0; $i < 10; $i++) {
    array_push($fields, [ 
      'label' => '<hr><hr><h3>' . esc_html__('Title', 'epfl-shortcodes') . '</h3>',
      'attr' => 'label'.$i,
      'description' => esc_html__('The title of the collapsable', 'epfl-shortcodes'),
      'type' => 'text',
    ]);
    array_push($fields, [
      'label' => '<h2>' .esc_html__('Description', 'epfl-shortcodes') . '</h2>' ,
      'attr' => 'desc'.$i,
      'description' => esc_html__('Content shown when collapsable is opened', 'epfl-shortcodes'),
      'type' => 'textarea',
    ]);
  }

  global $iconDirectory;
	shortcode_ui_register_for_shortcode(
		'epfl_collapsable',
		array(
      'label' => esc_html__( 'Collapsable', 'epfl-shortcodes'),
      'attrs' => $fields,
      'listItemImage' => '<img src="'.$iconDirectory.'toggle.png'.'">',
    )
	);
}