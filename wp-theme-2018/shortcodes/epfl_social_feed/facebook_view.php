<?php
    $facebook_url = get_query_var('epfl_social_feed_facebook_url');
    $height = get_query_var('epfl_social_feed_height') + 11; # add 11px to match the twitter height
    $width = get_query_var('epfl_social_feed_width');
?>

<div class="social-feed">
  <span class="social-icon social-icon-facebook social-icon-round">
    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-facebook"></use></svg>
  </span>
  <div id="fb-root"></div>
  <div class="social-feed-content">
      <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
      <div class="fb-page" style="height:auto;width:<?php esc_html_e($width) ?>px;"
          data-href="<?php echo esc_url($facebook_url) ?>"
          data-tabs="timeline"
          data-small-header="true"
          data-adapt-container-width="false"
          data-height="<?php esc_html_e($height)?>"
          data-width="<?php esc_html_e($width)?>"
          data-hide-cover="true"
          data-hide-cta="true"
          data-show-facepile="false">
          <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
      </div>
    <div>
      <a class="btn btn-secondary mt-4" href="<?php echo esc_url($facebook_url) ?>" target="_blank"><?php esc_html_e('Like our page on Facebook', 'epfl'); ?></a>
    </div>
  </div>
</div>
