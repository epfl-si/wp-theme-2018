<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'custom_highlight' );
function custom_highlight() {
  $fields = [
		array(
      'label'    => '<hr><h2>'.esc_html__('Title', 'epfl').'</h2> ',
      'attr'     => 'title',
      'type'     => 'text'
    ),
    array(
      'label'    => esc_html__('description', 'epfl'),
      'attr'     => 'description',
      'type'     => 'textarea'
    ),
    array(
      'label'    => esc_html__('Link', 'epfl'),
      'attr'     => 'link',
      'type'     => 'text'
    ),
    array(
      'label'    => esc_html__('Button label', 'epfl'),
      'attr'     => 'buttonlabel',
      'type'     => 'text'
    ),
    array(
      'label'    => esc_html__('Image', 'epfl'),
      'attr'     => 'image',
      'type'        => 'attachment',
      'libraryType' => array( 'image' ),
      'addButton'   => esc_html__( 'Select Image', 'epfl', 'shortcode-ui' ),
      'frameTitle'  => esc_html__( 'Select Image', 'epfl', 'shortcode-ui' ),
    ),
    array(
      'label'    => esc_html__( 'Layout' , 'epfl'),
			'attr'     => 'layout',
      'description' => esc_html__( 'Decides where the text will be aligned, to allow the subject of the picture to be visible', 'epfl'),
			'type'     => 'radio',
      'options'     => array(
				array( 'value' => '', 'label' => esc_html__( 'Right', 'epfl') ),
				array( 'value' => 'bottom', 'label' => esc_html__( 'Bottom', 'epfl') ),
				array( 'value' => 'left', 'label' => esc_html__( 'Left', 'epfl') ),
			)
    )
	];

global $iconDirectory;

	shortcode_ui_register_for_shortcode(
		'epfl_custom_highlight',
		array(
      'label' =>  esc_html__( 'Custom Highlight' , 'epfl'),
      'listItemImage' => '<img src="'.$iconDirectory.'page_highlight.png'.'">',
      'attrs' => $fields
    )
	);
}
