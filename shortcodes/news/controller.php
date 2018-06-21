<?php

function renderNews ($news) {
  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'News');
    get_template_part('shortcodes/placeholder');
  } else {
    $results = $news->results;
    echo '<div class="container-full">';
    echo '<div class="container">';
    echo '<div class="news-listing my-5">';
    foreach($results as $new) {
      set_query_var('epfl_news_data', $new);
      get_template_part('shortcodes/news/view');
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  return ob_end_flush();
}