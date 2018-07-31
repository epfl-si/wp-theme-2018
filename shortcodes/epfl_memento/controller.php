<?php

/** 
 * 1 is the priority, higher means executed first
 * 2 is number of arguments the function can accept
 **/
add_action('epfl_event_action', 'renderMemento', 1, 3);

function renderMemento($events, $template, $memento) {
  ob_start();

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Memento');
    get_template_part('shortcodes/placeholder');

  } else {

    $results = $events->results;

    $is_calendar = false;
    if (true == $is_calendar) {
      echo '<div class="bg-gray-100 py-5 mb-3">';
      echo '  <div class="datepicker-wrapper">';
      echo '    <input type="text" class="datepicker-fancy">';
      echo '    <span class="nextMonthLabel"></span>';
      echo '    <span class="prevMonthLabel"></span>';
      echo '  </div>';
      echo '</div>';
    }

    echo '<div class="container-full">';
    echo '  <div class="container">';
    echo '    <div class="card-slider-wrapper">';
    echo '      <div class="card-slider">';
    
    if (!(bool) $results) {
      if (get_locale() == 'fr_FR') {
        echo '<div><h3>aucun événement programmé</h3></div>';
      } else {
        echo '<div><h3>no scheduled events</h3></div>';
      }
    }
    
    $count=1;
    foreach($results as $event) {
      set_query_var('epfl_memento_template', $template);
      set_query_var('epfl_memento_is_first_event', $count==1);
      set_query_var('epfl_memento_data', $event);
      get_template_part('shortcodes/epfl_memento/view');  
      $count++;
    }
    echo '      </div>';

    set_query_var('epfl_memento_name', $memento);
    get_template_part('shortcodes/epfl_memento/templates/card-slider-footer');
    
    echo '    </div>';
    echo '  </div>';
    echo '</div>';    

    
  }
  return ob_end_flush();
}