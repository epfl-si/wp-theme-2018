<?php
require_once(__DIR__.'/render.php');

add_filter('epfl_infoscience_search_action', 'renderPublicationsSearchResult', 1, 6);

function renderPublicationsSearchResult($grouped_by_publications,
                                 $url,
                                 $format,
                                 $summary,
                                 $thumbnail,
                                 $debug_template) {
        $page = ClassesInfoscience2018Render::render($grouped_by_publications,
        $url,
        $format,
        $summary,
        $thumbnail,
        $debug_template);

        return $page;
}
?>
