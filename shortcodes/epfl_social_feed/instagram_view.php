<?php
    global $wp_embed;

    $instagram_url = esc_url(get_query_var('epfl_social_feed_instagram_url'));

    # height is useless for instagram, as it is fixed
    # $height = get_query_var('epfl_social_feed_height');

    $instagram_shortcode = '[embed]' . $instagram_url . '[/embed]';
?>

<div class="social-feed">
  <span class="social-icon social-icon-instagram social-icon-round">
    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-instagram"></use></svg>
  </span>

  <div class="social-feed-content">
    <div>
    <?php echo $wp_embed->run_shortcode($instagram_shortcode); ?>
    </div>
    <div>
      <a class="btn btn-secondary mt-4" href="<?php echo $instagram_url ?>" target="_blank"><?php esc_html_e('View this post on Instagram', 'epfl-shortcodes'); ?></a>
    </div>
  </div>
</div>
