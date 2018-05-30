<?php

function renderNews ($news) {
  echo '<div class="news-listing">';
  foreach($news as $new) {
    set_query_var('epfl_shortcode_news_data', $new);
    get_template_part('shortcodes/news/view');
  }
  echo '</div>';
}

add_action('epfl_shortcode_news', 'renderNews', 0, 1);