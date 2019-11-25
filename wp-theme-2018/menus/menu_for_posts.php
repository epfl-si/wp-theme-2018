<?php


//var_dump( $current_post );

function has_static_posts_page_selected() {
  // Check if the user has set a static page (settings->Reading->Your homepage displays)
  // Return the id if this is the case, or False
  $show_on_front = get_option('show_on_front');
  $front_post_id = get_option('page_for_posts');
  var_dump($show_on_front);
  var_dump($front_post_id);
  if ($show_on_front == 'page' && isset($front_post_id)) {
    return $front_post_id;
  }
}

//var_dump(has_static_posts_page_selected());
