<?php
  $url = get_query_var('epfl_video_url');
?>

<div class="container my-3">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe src="<?php echo esc_url($url) ?>" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media" frameborder="0" class="embed-responsive-item"></iframe>
  </div>
</div>
