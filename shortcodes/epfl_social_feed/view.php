<?php
    $twitter_url      = get_query_var('epfl_social_feed_twitter_url');
    $instagram_url    = get_query_var('epfl_social_feed_instagram_url');
    $facebook_url    = get_query_var('epfl_social_feed_facebook_url');
?>

<div class="social-feed-group">
  <?php if ($twitter_url): ?>
  <div class="social-feed-container">
    <?php get_template_part('shortcodes/epfl_social_feed/twitter_view'); ?>
  </div>
  <?php endif; ?>
  <?php if ($instagram_url): ?>
  <div class="social-feed-container">
    <?php get_template_part('shortcodes/epfl_social_feed/instagram_view'); ?>
  </div>
  <?php endif; ?>
  <?php if ($facebook_url): ?>
  <div class="social-feed-container">
    <?php get_template_part('shortcodes/epfl_social_feed/facebook_view'); ?>
  </div>
  <?php endif; ?>
</div>
