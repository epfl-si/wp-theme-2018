<?php 
  $data = get_query_var('epfl_shortcode_news_data');
  $title = $data->title ?: 'title';
  $content = $data->body ?: 'content';
  $date = $data->date ?: '00.00.0000';
  $user = $data->userId ?: '123';
?>

<a href="#" class="news trapeze-vertical-container">
  <div class="news-container">
    <div class="news-thumbnail">
      <picture>
        <source media="(min-width: 1140px)" srcset="https://via.placeholder.com/570x321.jpg 1x,https://via.placeholder.com/1140x641.jpg 2x">
        <source media="(min-width: 960px)" srcset="https://via.placeholder.com/570x321.jpg 1x,https://via.placeholder.com/1140x641.jpg 2x">
        <source media="(min-width: 720px)" srcset="https://via.placeholder.com/480x270.jpg 1x,https://via.placeholder.com/960x540.jpg 2x">
        <source media="(min-width: 541px)" srcset="https://via.placeholder.com/720x405.jpg 1x,https://via.placeholder.com/1440x810.jpg 2x">
        <source media="(max-width: 540px)" srcset="https://via.placeholder.com/540x304.jpg 1x,https://via.placeholder.com/1080x608.jpg 2x">
        <img src="https://via.placeholder.com/570x321.jpg" class="img-fluid" alt="image description">
      </picture>
    </div>
    <div class="news-content">
      <p class="h5">
        <?php echo $title ?>
      </p>
      <p>
        <span>#
          <?php echo $user ?> |
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