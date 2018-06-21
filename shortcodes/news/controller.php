<?php

function renderNews ($news) {
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

add_action('epfl_news_action', 'renderNews', 0, 1);