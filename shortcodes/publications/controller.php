<?php
require_once(__DIR__.'/render.php');

add_filter('epfl_infoscience_search_action', 'renderPublicationsSearchResult', 1, 5);

function renderPublicationsSearchResult($grouped_by_publications,
                                 $url,
                                 $format,
                                 $summary,
                                 $thumbnail) {
  if (is_admin()) {
    ob_start();                                     
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Infoscience search');
    get_template_part('shortcodes/placeholder');
    return ob_end_flush();
  } else {
    $page = ClassesInfoscience2018Render::render($grouped_by_publications,
                                                 $url,
                                                 $format,
                                                 $summary,
                                                 $thumbnail);

    return $page;
  }
}

