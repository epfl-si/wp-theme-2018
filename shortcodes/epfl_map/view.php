<?php
  $query = get_query_var('epfl_map_query');
  $lang  = get_query_var('epfl_map_lang');

  $video_url = 'https://plan.epfl.ch/iframe/?q=' . $query . '&amp;lang=' . $lang . '&amp;map_zoom=10';

?>
<div class="container">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe 
      frameborder="0" 
      scrolling="no" 
      src="<?php echo esc_url($video_url) ?>" 
      class="embed-responsive-item"
      ></iframe>
  </div>
</div>