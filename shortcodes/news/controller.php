<?php

function renderNews ($news) {
  echo '<div class="news-listing">';
  foreach($news as $new) {
    set_query_var('epfl_shortcode_news_data', $new);
    get_template_part('shortcodes/news/view');
  }
  echo '</div>';
}

add_filter('epfl_shortcode_news', 'renderNews');