<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'custom_teasers' );
function custom_teasers() {

	// see documentation:
	// https://github.com/wp-shortcake/shortcake/blob/master/dev.php

  $fields = [
		array(
					'label'    => '<hr><h2>Section title '.$i.'</h2> '.$i,
					'attr'     => 'titlesection',
					'type'     => 'text'
				),
		array(
			'label'    => 'Grey background',
			'attr'     => 'graybackground',
			'type'     => 'checkbox'
		)
	];

	for ($i = 1; $i < 4; $i++) {
		$fields = array_merge(
			$fields,
			[
				array(
					'label'    => '<div class="col-6"><hr><h2>'.esc_html__('Teaser', 'epfl').' '.$i.'</h2> '.esc_html__('Title', 'epfl').' '.$i,
					'attr'     => 'title'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => esc_html__('Excerpt', 'epfl').' '.$i,
					'attr'     => 'excerpt'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => esc_html__('Url', 'epfl').' '.$i,
					'attr'     => 'url'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => esc_html__('Button label', 'epfl').' '.$i,
					'attr'     => 'buttonlabel'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => esc_html__('Image', 'epfl').' '.$i,
					'attr'     => 'image'.$i,
					'type'        => 'attachment',
					'libraryType' => array( 'image' ),
					'addButton'   => esc_html__( 'Select Image', 'epfl', 'shortcode-ui' ),
					'frameTitle'  => esc_html__( 'Select Image', 'epfl', 'shortcode-ui' ),
				)
			]
		);
	}

	global $iconDirectory;

	shortcode_ui_register_for_shortcode(
		'epfl_custom_teasers',
		array(
      'label' =>  esc_html__('Custom teasers', 'epfl'),
      'listItemImage' => '<img src="'.$iconDirectory.'custom_teasers.png'.'">',
      'attrs' => $fields
    )
	);

}
