<?php
    $twitter_url = get_query_var('epfl_social_feed_twitter_url');
    $twitter_limit = get_query_var('epfl_social_feed_twitter_limit');
    $height = get_query_var('epfl_social_feed_height');
    $width = get_query_var('epfl_social_feed_width');

    # set a min height that match the one for facebook
    #$height = intval($height) == 38 ? 366 : $height;
?>

<div class="social-feed">
  <span class="social-icon social-icon-twitter social-icon-round"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-twitter"></use></svg></span>
  <div class="social-feed-content">
    <div style="width:<?php esc_html_e($width) ?>px;">
      <a class="twitter-timeline"
        <?php if (!empty($twitter_limit) || $twitter_limit != 0): ?>
        data-tweet-limit="<?php esc_html_e($twitter_limit) ?>"
        <?php endif ?>
        data-chrome="nofooter"
        data-height="<?php esc_html_e($height) ?>"
        href="<?php echo esc_url($twitter_url) ?>">
      </a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>      
    </div>
    <div>
      <a class="btn btn-secondary mt-4" href="<?php echo esc_url($twitter_url) ?>" target="_blank"><?php esc_html_e('Follow us on Twitter', 'epfl-shortcodes'); ?></a>
    </div>
  </div>
</div>
