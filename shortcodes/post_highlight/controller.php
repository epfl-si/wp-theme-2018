<?php

require_once(__DIR__.'/shortcake.php');

// add shortcode
add_shortcode( 'epfl_post_highlight', 'renderPostHighlight' );

// render
function renderPostHighlight ($args) {
  $postId = $args['post'];
  $post = get_post($postId);
  set_query_var('epfl_post_highlight_data', $post);

  ob_start();
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Post highlight');
    get_template_part('shortcodes/placeholder');
  } else {
    // render shortcode
    get_template_part('shortcodes/post_highlight/view');
  }
  return ob_get_clean();
}
