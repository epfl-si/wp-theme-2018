<?php
  $url    = get_query_var('epfl_video_url');
  $width  = get_query_var('epfl_video_width');
  $height = get_query_var('epfl_video_height');
?>

<div class="container">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe src="<?php echo $url ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media" frameborder="0" class="embed-responsive-item"></iframe>
  </div>
</div>
