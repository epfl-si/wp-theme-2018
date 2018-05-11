<?php

function renderNews ($news) {
  ob_start();

  echo '<div class="news-listing">';
  foreach($news as $new) {
    set_query_var('epfl_shortcode_news_data', $new);
    get_template_part('shortcodes/news/view');
  }
  echo '</div>';

  return ob_flush();
}

add_action('epfl_shortcode_news', 'renderNews', 0, 1);