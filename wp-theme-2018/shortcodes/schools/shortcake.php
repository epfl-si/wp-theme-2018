<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'schools' );

function schools() {

	$fields = [];

	for ($i = 1; $i <= 10; $i++) {
		$fields = array_merge(
		$fields,
		[
			array(
				'label'    => '<div class="col-6"><hr><h2>'.esc_html__('School', 'epfl').' '.$i.'</h2>'.esc_html__('Title', 'epfl').' '.$i,
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
				'addButton'   => esc_html__( 'Select Image', 'epfl' ),
				'frameTitle'  => esc_html__( 'Select Image', 'epfl' ),
				'description' => esc_html__('Recommended image size: 1920x1080', 'epfl')
			)
			]
		);
	}

	global $iconDirectory;
	shortcode_ui_register_for_shortcode(
		'epfl_faculties',
		array(
      'label' => 'Schools',
      'listItemImage' => '<img src="'.$iconDirectory.'school.png'.'">',
      'attrs' => $fields
    )
	);

}
