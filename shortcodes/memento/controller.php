<?php

function renderMemento ($events) {
  $results = $events->results;
  foreach($results as $event) {
    set_query_var('epfl_memento_data', $event);
    get_template_part('shortcodes/memento/view');
  }
}

add_action('epfl_memento_action', 'renderMemento', 0, 1);