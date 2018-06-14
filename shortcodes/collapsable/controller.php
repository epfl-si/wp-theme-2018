<?php

// add shortcode
add_action( 'init', function() {
  add_shortcode( 'epfl_collapsable', 'renderCollapasable' );
});

// render
function renderCollapasable ($args) {
  set_query_var('epfl_collapsable_data', $args);

  ob_start();
    get_template_part('shortcodes/collapsable/view');
  return ob_get_clean();
}

// register shortcake UI
add_action( 'register_shortcode_ui', 'epfl_collapsable' );
function epfl_collapsable() {
  $fields = [];
  for ( $i = 0; $i < 10; $i++) {
    array_push($fields, [ 
      'label' => '<h3>' . esc_html__('Title', 'epfl-collapsable') . '</h3>',
      'attr' => 'label'.$i,
      'type' => 'text',
    ]);
    array_push($fields, [
      'label' => esc_html__('Description', 'epfl-collapsable') ,
      'attr' => 'desc'.$i,
      'type' => 'textarea',
    ]);
  }

	shortcode_ui_register_for_shortcode(
		'epfl_collapsable',
		array(
      'label' => 'Add collapsable shortcode',
      'attrs' => $fields,
      'listItemImage' => 'dashicons-editor-justify',
    )
	);
}
