<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'epfl_definition_list' );
function epfl_definition_list() {
  $fields = [];

  array_push($fields, [
    'label' => esc_html__('Display as a table', 'epfl'),
      'attr' => 'tabledisplay',
      'description' => esc_html__('Display the definition list as a table-like component', 'epfl'),
      'type' => 'checkbox',
  ]);

    array_push($fields, [
    'label' => esc_html__('Large display', 'epfl'),
      'attr' => 'largedisplay',
      'description' => esc_html__('Makes the dl design wider', 'epfl'),
      'type' => 'checkbox',
  ]);

  for ( $i = 0; $i < 10; $i++) {
    array_push($fields, [
      'label' => '<hr>' . '<h2>' . esc_html__('Term', 'epfl') . '</h2>',
      'attr' => 'label'.$i,
      'description' => esc_html__('Term to define', 'epfl'),
      'type' => 'text',
    ]);
    array_push($fields, [
      'label' => esc_html__('Definition', 'epfl') ,
      'attr' => 'desc'.$i,
      'description' => esc_html__('Definition of the term', 'epfl'),
      'type' => 'textarea',
    ]);
  }

  global $iconDirectory;
	shortcode_ui_register_for_shortcode(
		'epfl_definition_list',
		array(
      'label' => esc_html__( 'Definition list', 'epfl'),
      'attrs' => $fields,
      'listItemImage' => '<img src="'.$iconDirectory.'definition_list.png'.'">',
    )
	);
}
