<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_contact_action', 'renderContact', 10, 1);

function renderContact($args) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Contact');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_contact-data', $args);
    get_template_part('shortcodes/epfl_contact/view');
  }
}
