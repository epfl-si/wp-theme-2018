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
    echo '<div class="list-group">';

    $count=1;
    $header = false;
    $last = count($results);

    foreach($results as $new) {
      
      if ($template == 2 and $count != 1 and $header == false) {

        $header = true;
        echo '<div class="container pb-5 offset-xl-top pt-5 pt-xl-0">';
        echo '<div class="row">';
        echo '<div class="col-lg-10 offset-lg-1">';
        echo '<div class="row mb-4">';
      }

      set_query_var('epfl_news_is_first_news', $count==1);
      set_query_var('epfl_news_template', $template);
      set_query_var('epfl_news_data', $new);
      get_template_part('shortcodes/epfl_news/view');
      
      if ($template == 2 and $last == $count) {
        echo '</div>';
        echo '<p class="text-center">';
        echo '<a class="link-pretty" href="https://actu.epfl.ch/search/mediacom/">';
        if (get_locale() == 'fr_FR') {
          echo 'Toutes les actualités';
        } else {
          echo 'All news';
        }
        echo '</a>';
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }

      $count++;

    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
}
