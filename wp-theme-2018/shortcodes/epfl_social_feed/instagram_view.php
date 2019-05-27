<?php
    global $wp_embed;

    $instagram_url = (get_query_var('epfl_social_feed_instagram_url'));

    # height is useless for instagram, as it is fixed
    # $height = get_query_var('epfl_social_feed_height');

    $instagram_shortcode = '[embed]' . esc_url($instagram_url) . '[/embed]';
    $width = get_query_var('epfl_social_feed_width');
?>

<div class="social-feed">
  <span class="social-icon social-icon-instagram social-icon-round">
    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-instagram"></use></svg>
  </span>

  <div class="social-feed-content">
    <div style="width:<?php esc_html_e($width) ?>px;">
    <?php echo $wp_embed->run_shortcode($instagram_shortcode); ?>
    </div>
    <div>
      <a class="btn btn-secondary mt-4" href="<?php echo esc_url($instagram_url) ?>" target="_blank"><?php esc_html_e('View this post on Instagram', 'epfl'); ?></a>
    </div>
  </div>
</div>
