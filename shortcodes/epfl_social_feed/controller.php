<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/

add_action('epfl_social_feed_action', 'renderSocialFeed', 10, 1);

function renderSocialFeed ($args) {
  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Social Feed');
    get_template_part('shortcodes/placeholder');
  } else {
    if (array_key_exists('twitter_url', $args) && !empty($args['twitter_url'])) {
      set_query_var('epfl_social_feed_twitter_url', $args['twitter_url']);
    }

    if (array_key_exists('instagram_url', $args) && !empty($args['instagram_url'])) {
      set_query_var('epfl_social_feed_instagram_url', $args['instagram_url']);
    }

    if (array_key_exists('facebook_url', $args) && !empty($args['facebook_url'])) {
      set_query_var('epfl_social_feed_facebook_url', $args['facebook_url']);
    }

    if (array_key_exists('height', $args) && !empty($args['height'])) {
      set_query_var('epfl_social_feed_height', $args['height']);
    } else {
      set_query_var('epfl_social_feed_height', '347');
    }

    get_template_part('shortcodes/epfl_social_feed/view');
  }
}