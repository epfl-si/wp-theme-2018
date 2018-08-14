<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'faculties' );

function faculties() {

	$fields = [];

	for ($i = 1; $i <= 7; $i++) {
		$fields = array_merge(
		$fields,
		[
			array(
				'label'    => '<div class="col-6"><hr><h2>'.esc_html__('Faculty', 'epfl-shortcodes').' '.$i.'</h2>'.esc_html__('Title', 'epfl-shortcodes').' '.$i,
				'attr'     => 'title'.$i,
				'type'     => 'text'
			),
			array(
				'label'    => 'Subtitle '.$i,
				'attr'     => 'subtitle'.$i,
				'type'     => 'text'
			),
			array(
				'label'    => 'Link '.$i,
				'attr'     => 'link'.$i,
				'type'     => 'text'
			),
			array(
				'label'    => 'Image '.$i,
				'attr'     => 'image'.$i,
				'type'        => 'attachment',
				'libraryType' => array( 'image' ),
				'addButton'   => esc_html__( 'Select Image', 'epfl-shortcodes' ),
				'frameTitle'  => esc_html__( 'Select Image', 'epfl-shortcodes' ),
			)
			]
		);
	}

	global $iconDirectory;
	shortcode_ui_register_for_shortcode(
		'epfl_faculties',
		array(
      'label' => 'Faculties',
      'listItemImage' => '<img src="'.$iconDirectory.'faculty.png'.'">',
      'attrs' => $fields
    )
	);

}