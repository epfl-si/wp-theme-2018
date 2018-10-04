<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_social_feed_action', 'renderSocialFeed', 10, 1);

function setQueryVars($args, $named_arg, $default='') {
  if (array_key_exists($named_arg, $args) && !empty($args[$named_arg])) {
    set_query_var('epfl_social_feed_'.$named_arg, $args[$named_arg]);
  }
}

function renderSocialFeed ($args) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Social feed');
    get_template_part('shortcodes/placeholder');
  } else {
    setQueryVars($args, 'twitter_url');
    setQueryVars($args, 'twitter_limit');
    setQueryVars($args, 'instagram_url');
    setQueryVars($args, 'facebook_url');
    setQueryVars($args, 'height', '347');

    get_template_part('shortcodes/epfl_social_feed/view');
  }
}
