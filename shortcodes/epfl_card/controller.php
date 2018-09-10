<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_card_action', 'renderCard', 10, 4);

function renderCard ($title, $text, $link, $image) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Card');
    get_template_part('shortcodes/placeholder');

  } else {

    set_query_var('epfl_card_title', $title);
    set_query_var('epfl_card_text', $text);
    set_query_var('epfl_card_link', $link);
    set_query_var('epfl_card_image', $image);
    get_template_part('shortcodes/epfl_card/view');

  }
}
