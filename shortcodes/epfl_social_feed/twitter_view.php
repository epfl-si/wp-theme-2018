<?php
    /*
    Paths :
    - oEmbed :     {
        "provider_name": "Twitter",
        "provider_url": "http:\/\/www.twitter.com\/",
        "endpoints": [
            {
                "schemes": [
                    "https:\/\/twitter.com\/*\/status\/*",
                    "https:\/\/*.twitter.com\/*\/status\/*"
                ],
                "url": "https:\/\/publish.twitter.com\/oembed"
            }
        ]
    },
    - API JSON : https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-user_timeline
    */

    $twitter_url = get_query_var('epfl_social_feed_twitter_url');
    $height = get_query_var('epfl_social_feed_height');
?>

<div class="social-feed">
  <span class="social-icon social-icon-twitter social-icon-round">
  <svg class="icon" aria-hidden="true"><use xlink:href="#icon-twitter"></use></svg>
  </span>
  <div class="social-feed-content">
    <div>
      <a class="twitter-timeline"
        data-tweet-limit=""
        data-chrome="nofooter transparent"
        data-height="<?php echo $height ?>"
        data-width="550"
        href="<?php echo $twitter_url ?>">
      </a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div>
      <a class="btn btn-secondary mt-4" href="<?php echo $twitter_url ?>" target="_blank">Nous rejoindre sur Twitter</a>
    </div>
  </div>
</div>
