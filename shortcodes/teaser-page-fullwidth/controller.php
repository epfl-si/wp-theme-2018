
<?php

// register 
function register_shortcodes() {
	add_shortcode( 'epfl-shortcode-teaser-page-fullwidth', 'renderTeaserPageFulldwidth' );
}

// render
function renderTeaserPageFulldwidth ($args) {
  $pageId = $args['page'];
  $page = get_post($pageId);
  set_query_var('epfl_shortcode_teaser_page_fullwidth', $page);
  get_template_part('shortcodes/teaser-page-fullwidth/view');
}

// register shortcake UI
add_action( 'register_shortcode_ui', 'teaser_page_fullwidth' );
function teaser_page_fullwidth() {
  $fields = [
    array(
      'label'    => 'Select page',
			'attr'     => 'page',
			'type'     => 'post_select',
			'query'    => array( 'post_type' => 'page' )
		)
  ];
	shortcode_ui_register_for_shortcode(
		'epfl-shortcode-teaser-page-fullwidth',
		array(
      'label' => 'Page teaser fullwidth',
      'attrs' => $fields
    )
	);
}