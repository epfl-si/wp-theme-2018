<?php

/** 
 * 1 is the priority, higher means executed first
 * 2 is number of arguments the function can accept
 **/
add_action('epfl_event_action', 'renderMemento', 1, 2);

function renderMemento($events, $template) {
  ob_start();

  /*print "<pre>"; var_dump($events->results); print "</pre>";
  print "<pre>"; var_dump($template); print "</pre>";*/

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Memento');
    get_template_part('shortcodes/placeholder');

  } else {
    $count=1;
    $results = $events->results;
    echo '<div class="container-full">';
    echo '  <div class="container">';
    echo '    <div class="card-slider-wrapper">';
    echo '      <div class="card-slider">';

    foreach($results as $event) {

      if ($count==1) {
        set_query_var('epfl_memento_first_event', $event);
        get_template_part('shortcodes/memento/first_event');  
      } else {
        set_query_var('epfl_memento_data', $event);
        get_template_part('shortcodes/memento/view');  
      }
      $count++;

    }
    echo '      </div>';
    echo '      <div class="card-slider-footer">';
    echo '        <div>';
    echo '          <button role="button" id="card-slider-prev" class="card-slider-btn link-trapeze-horizontal disabled">';
    echo '            <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-left"></use></svg>';
    echo '          </button>';
    echo '          <button role="button" id="card-slider-next" class="card-slider-btn link-trapeze-horizontal">';
    echo '            <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>';
    echo '          </button>';
    echo '        </div>';
    echo '      <div>';
    echo '      <a href="#">Voir l’agenda complet des événements</a>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';    
  }
  return ob_end_flush();
}