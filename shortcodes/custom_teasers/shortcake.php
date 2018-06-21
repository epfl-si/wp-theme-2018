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
					'label'    => '<div class="col-6"><hr><h2>Teaser '.$i.'</h2> Title '.$i,
					'attr'     => 'title'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => 'Excerpt '.$i,
					'attr'     => 'excerpt'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => 'Url '.$i,
					'attr'     => 'url'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => 'Button label '.$i,
					'attr'     => 'buttonlabel'.$i,
					'type'     => 'text'
				),
				array(
					'label'    => 'Image '.$i,
					'attr'     => 'image'.$i,
					'type'        => 'attachment',
					'libraryType' => array( 'image' ),
					'addButton'   => esc_html__( 'Select Image', 'shortcode-ui-example', 'shortcode-ui' ),
					'frameTitle'  => esc_html__( 'Select Image', 'shortcode-ui-example', 'shortcode-ui' ),
				)
			]
			);
	}

	global $iconDirectory;

	shortcode_ui_register_for_shortcode(
		'epfl_custom_teasers',
		array(
      'label' => 'Custom teasers',
      'listItemImage' => '<img src="'.$iconDirectory.'custom_teasers.png'.'">',
      'attrs' => $fields
    )
	);

}