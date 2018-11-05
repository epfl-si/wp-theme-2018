<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_people_action', 'renderPeople', 10, 2);

function renderPeople ($persons, $nb_columns) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'People');
    get_template_part('shortcodes/placeholder');

  } else {

    set_query_var('epfl_people_persons', $persons);
    set_query_var('epfl_people_nb_columns', $nb_columns);
    get_template_part('shortcodes/epfl_people/view');

  }
}
