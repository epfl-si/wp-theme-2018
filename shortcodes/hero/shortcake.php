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
			'addButton'   => esc_html__( 'Select Image', 'epfl' ),
			'frameTitle'  => esc_html__( 'Select Image', 'epfl' ),
		)
	];

	global $iconDirectory;

	shortcode_ui_register_for_shortcode(
		'epfl_hero',
		array(
      'label' =>  esc_html__( 'Hero' , 'epfl'),
      'listItemImage' => '<img src="'.$iconDirectory.'hero.png'.'">',
      'attrs' => $fields
    )
	);

}
