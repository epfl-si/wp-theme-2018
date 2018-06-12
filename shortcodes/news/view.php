<?php
  $data = get_query_var('epfl_shortcode_news_data');
  $title = $data->title ?: 'title';
  $content = $data->subtitle ?: 'content';
  $date = $data->publish_date ?: date('d.m.Y');
  $user = $data->userId ?: '123';
  $visual = $data->visual_url ?: 'https://via.placeholder.com/570x321.jpg';
?>

<a href="#" class="news trapeze-vertical-container">
  <div class="news-container">
    <div class="news-thumbnail">
      <picture>
        <img src="<?php echo $visual ?>" class="img-fluid" alt="image description">
      </picture>
    </div>
    <div class="news-content">
      <p class="h5">
        <?php echo $title ?>
      </p>
      <p>
        <span>
          <?php echo $date ?>
        </span>
        <span class="text-muted">—
          <?php echo $content ?>
        </span>
      </p>
    </div>
  </div>
  <span class="trapeze-vertical"></span>
</a>