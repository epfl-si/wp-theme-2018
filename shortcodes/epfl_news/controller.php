<?php

/** 
 * 10 (3rd argument) is the priority, higher means executed first
 * 4 (4rth argument) is number of arguments the function can accept
 **/
add_action('epfl_news_action', 'renderNews', 10, 4);

function renderNews ($title, $actus, $template, $stickers) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'News');
    get_template_part('shortcodes/placeholder');

  } else {

    $results = $actus->results;

    set_query_var('epfl_news_template', $template);
    set_query_var('epfl_news_data', $results);
    get_template_part('shortcodes/epfl_news/view');

  }
}
