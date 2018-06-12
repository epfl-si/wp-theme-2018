<?php

function renderNews ($news) {
  $results = $news->results;
  echo '<div class="news-listing my-5">';
  foreach($results as $new) {
    set_query_var('epfl_shortcode_news_data', $new);
    get_template_part('shortcodes/news/view');
  }
  echo '</div>';
}

add_action('epfl_news_action', 'renderNews', 0, 1);