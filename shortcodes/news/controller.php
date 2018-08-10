<?php

add_action('epfl_news_action', 'renderNews', 10, 4);

function renderNews ($title, $actus, $template, $stickers) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'News');
    get_template_part('shortcodes/placeholder');
  } else {
    $results = $actus->results;
    echo '<div class="container-full">';
    echo '<div class="container">';
    echo '<div class="list-group my-5">';

    foreach($results as $new) {
      set_query_var('epfl_news_data', $new);
      get_template_part('shortcodes/news/view');
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
}