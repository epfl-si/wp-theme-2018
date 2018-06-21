<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'hero' );

function hero() {

	// see documentation:
	// https://github.com/wp-shortcake/shortcake/blob/master/dev.php

  $fields = [
		array(
			'label'    => 'Title',
			'attr'     => 'title',
			'type'     => 'text'
		),
		array(
			'label'    => 'Text',
			'attr'     => 'text',
			'type'     => 'textarea'
		),
		array(
			'label'    => 'Image',
			'attr'     => 'image',
			'type'        => 'attachment',
			'libraryType' => array( 'image' ),
			'addButton'   => esc_html__( 'Select Image', 'shortcode-ui-example', 'shortcode-ui' ),
			'frameTitle'  => esc_html__( 'Select Image', 'shortcode-ui-example', 'shortcode-ui' ),
		)
	];

	shortcode_ui_register_for_shortcode(
		'epfl_hero',
		array(
      'label' => 'Hero',
      'listItemImage' => 'dashicons-images-alt',
      'attrs' => $fields
    )
	);

}