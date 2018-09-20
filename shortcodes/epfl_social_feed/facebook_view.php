<?php
    $facebook_url = get_query_var('epfl_social_feed_facebook_url');
    $height = get_query_var('epfl_social_feed_height');
?>

<div class="social-feed">
  <span class="social-icon social-icon-facebook social-icon-round">
    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-facebook"></use></svg>
  </span>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <div class="social-feed-content fb-page" style="height:auto;"
       data-href="<?php echo $facebook_url ?>"
       data-tabs="timeline"
       data-small-header="true"
       data-adapt-container-width="false"
       data-height="<?php echo $height ?>"
       data-hide-cover="true"
       data-hide-cta="true"
       data-show-facepile="false">
       <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
    <div>
      <a class="btn btn-secondary mt-4" href="<?php echo $facebook_url ?>" target="_blank">Likez notre page Facebook</a>
    </div>
  </div>
</div>
