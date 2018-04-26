<?php

// ============================
// News
// ============================
function renderNews ($news) {
  echo '<div class="news-listing">';
  foreach($news as $new) {
    set_query_var('epfl_shortcode_news_data', $new);
    get_template_part('shortcodes/views/news');
  }
  echo '</div>';
}
add_filter('epfl_shortcode_news', 'renderNews');


// ============================
// Fullwidth page teaser
// ============================

// register shortcode
add_action( 'init', 'register_shortcodes' );
function register_shortcodes() {
	add_shortcode( 'epfl-shortcode-teaser-page-fullwidth', 'renderTeaserPageFulldwidth' );
}

// render shortcode
function renderTeaserPageFulldwidth ($args) {
  $pageId = $args['page'];
  $page = get_post($pageId);
  set_query_var('epfl_shortcode_teaser_page_fullwidth', $page);
  get_template_part('shortcodes/views/teaser','page-fullwidth');
}

// register shortcake field for shortcode administration
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