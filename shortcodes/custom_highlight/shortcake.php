<?php

// register shortcake UI
add_action( 'register_shortcode_ui', 'custom_highlight' );
function custom_highlight() {
  $fields = [
		array(
      'label'    => '<hr><h2>'.esc_html__('Title', 'epfl-shortcodes').'</h2> ',
      'attr'     => 'title',
      'type'     => 'text'
    ),
    array(
      'label'    => esc_html__('description', 'epfl-shortcodes'),
      'attr'     => 'description',
      'type'     => 'textarea'
    ),
    array(
      'label'    => esc_html__('Link', 'epfl-shortcodes'),
      'attr'     => 'link',
      'type'     => 'text'
    ),
    array(
      'label'    => esc_html__('Button label', 'epfl-shortcodes'),
      'attr'     => 'buttonlabel',
      'type'     => 'text'
    ),
    array(
      'label'    => esc_html__('Image', 'epfl-shortcodes'),
      'attr'     => 'image',
      'type'        => 'attachment',
      'libraryType' => array( 'image' ),
      'addButton'   => esc_html__( 'Select Image', 'epfl-shortcodes', 'shortcode-ui' ),
      'frameTitle'  => esc_html__( 'Select Image', 'epfl-shortcodes', 'shortcode-ui' ),
    ),
    array(
      'label'    => esc_html__( 'Layout' , 'epfl-shortcodes'),
			'attr'     => 'layout',
      'description' => esc_html__( 'Decides where the text will be aligned, to allow the subject of the picture to be visible', 'epfl-shortcodes'),
			'type'     => 'radio',
      'options'     => array(
				array( 'value' => '', 'label' => esc_html__( 'Right', 'epfl-shortcodes') ),
				array( 'value' => 'bottom', 'label' => esc_html__( 'Bottom', 'epfl-shortcodes') ),
				array( 'value' => 'left', 'label' => esc_html__( 'Left', 'epfl-shortcodes') ),
			)
    )
	];

global $iconDirectory;

	shortcode_ui_register_for_shortcode(
		'epfl_custom_highlight',
		array(
      'label' =>  esc_html__( 'Custom Highlight' , 'epfl-shortcodes'),
      'listItemImage' => '<img src="'.$iconDirectory.'page_highlight.png'.'">',
      'attrs' => $fields
    )
	);
}