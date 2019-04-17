<?php
  $query = get_query_var('epfl_map_query');
  $lang  = get_query_var('epfl_map_lang');

  $map_url = 'https://plan.epfl.ch/iframe/?q=' . $query . '&amp;lang=' . $lang . '&amp;map_zoom=10';

?>
<div class="container my-3">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe 
      frameborder="0" 
      scrolling="no" 
      src="<?php echo esc_url($map_url) ?>" 
      class="embed-responsive-item"
      ></iframe>
  </div>
</div>