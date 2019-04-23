<?php

/** 
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_quote_action', 'renderQuote', 10, 4);

function renderQuote($quote, $cite, $footer, $image) {

  if (is_admin()) {

    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Quote');
    get_template_part('shortcodes/placeholder');

  } else {

    // render for frontend
    set_query_var('epfl_quote_image', $image);
    set_query_var('epfl_quote', $quote);
    set_query_var('epfl_quote_cite', $cite);
    set_query_var('epfl_quote_footer', $footer);

    get_template_part('shortcodes/epfl_quote/view');

  }
}