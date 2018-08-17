<?php
  $template = get_query_var('epfl_news_template');
  $data = get_query_var('epfl_news_data');

  if (get_locale() == 'fr_FR') {
    $image_description = $data->fr_description;
  } else {
    $image_description = $data->en_description;
  }
  
  $publish_date = new DateTime($data->publish_date);
  $publish_date = $publish_date->format('d.m.y');
?>

<a href="<?php echo $data->news_url ?>" class="list-group-item list-group-teaser link-trapeze-vertical">
  <div class="list-group-teaser-container">
    <div class="list-group-teaser-thumbnail">
      <picture>
        <img src="<?php echo $data->visual_url ?>" class="img-fluid" alt="<?php echo $image_description ?>" >
      </picture>
    </div>
    <div class="list-group-teaser-content">
      <p class="h5"><?php echo $data->title ?></p>
      <p>
        <time datetime="<?php echo $data->publish_date ?>"><span class="sr-only">Published:</span><?php echo $data->publish_date ?></time>
        <span class="text-muted">— <?php echo $data->subtitle ?></span>
      </p>
    </div>
  </div>
</a>