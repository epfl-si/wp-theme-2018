<?php
  $template = get_query_var('epfl_news_template');
  $display_all_news_link = get_query_var('epfl_news_all_news_link');
  
  $data = get_query_var('epfl_news_data');

  $count = 1;
  $header = false;
  $last = count($data);

  $url_channel = "";
  if (count($data) > 0) {
    $channel = $data[0]->channel->name;
    $url_channel = "https://actu.epfl.ch/search/" . $channel;
  }
?>

<?php if ("1" == $template): ?>
  <div class="container">
<?php else: ?>
  <div class="container-full">
<?php endif ?>
    <div class="list-group">
      <?php
        foreach($data as $news) {

          $is_first_event = ($count==1);

          if (get_locale() == 'fr_FR') {
            $image_description = $news->fr_description;
          } else {
            $image_description = $news->en_description;
          }

          if (get_locale() == 'fr_FR') {
            $category = $news->category->fr_label;
          } else {
            $category = $news->category->en_label;
          }

          $publish_date = new DateTime($news->publish_date);
          $publish_date = $publish_date->format('d.m.y');
          $subtitle = strip_tags($news->subtitle);

          $visual_url = substr($news->visual_url, 0, -11) . '1296x728.jpg';

          if ($template == 2 and $count != 1 and $header == false) {

            $header = true;
              echo '<div class="container pb-5 offset-xl-top pt-5 pt-xl-0">';
              echo '<div class="row">';
              echo '<div class="col-lg-10 offset-lg-1">';
              echo '<div class="row mb-4">';
          }
      ?>

<?php
  if ("1" == $template): // TEMPLATE LISTING
?>
        <a href="<?php echo $news->news_url ?>" class="list-group-item list-group-teaser link-trapeze-vertical">
          <div class="list-group-teaser-container">
            <div class="list-group-teaser-thumbnail">
              <picture>
                <img src="<?php echo $visual_url ?>" class="img-fluid" alt="<?php echo $image_description ?>" >
              </picture>
            </div>
            <div class="list-group-teaser-content">
              <p class="h5"><?php echo $news->title ?></p>
              <p>
                <time datetime="<?php echo $publish_date ?>"><span class="sr-only">Published:</span><?php echo $publish_date ?></time>
                <span class="text-muted">— <?php echo $subtitle ?></span>
              </p>
            </div>
          </div>
        </a>
<?php
  elseif ("3" == $template): // TEMPLATE WWW WITH 1 NEWS
?>

        <div class="fullwidth-teaser fullwidth-teaser-horizontal">
          <picture>
            <img src="<?php echo $visual_url ?>" aria-labelledby="background-label" alt="<?php echo $image_description ?>"/>
          </picture>
          <div class="fullwidth-teaser-text">
            <div class="fullwidth-teaser-header">
              <div class="fullwidth-teaser-title">
                <h3><?php echo $news->title ?></h3>
                <ul class="list-inline mt-2">
                  <li class="list-inline-item"><?php esc_html_e('News', 'epfl');?></li>
                  <li class="list-inline-item"><?php echo $category ?></li>
                </ul>
              </div>
              <a href="<?php echo $news->news_url ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
                <?php esc_html_e('Read more', 'epfl');?>
                <span class="sr-only">sur Tech Transfer.</span>
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
              </a>
            </div>
            <div class="fullwidth-teaser-content">
              <p><?php echo $subtitle ?></p>
            </div>
            <div class="fullwidth-teaser-footer">
              <a href="<?php echo $news->news_url ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none"><?php esc_html_e('Read more', 'epfl');?></a>
            </div>
          </div>
        </div>
<?php 
  elseif ("2" == $template): // TEMPLATE WWW WITH 3 NEWS
?>
<?php if (true === $is_first_event): ?>

        <div class="fullwidth-teaser fullwidth-teaser-horizontal">
          <picture>
            <img src="<?php echo $visual_url ?>" aria-labelledby="background-label" alt="<?php echo $image_description ?>"/>
          </picture>
          <div class="fullwidth-teaser-text">
            <div class="fullwidth-teaser-header">
              <div class="fullwidth-teaser-title">
                <h3><?php echo $news->title ?></h3>
                <ul class="list-inline mt-2">
                  <li class="list-inline-item"><?php esc_html_e('News', 'epfl');?></li>
                  <li class="list-inline-item"><?php echo $category ?></li>
                </ul>
              </div>
              <a href="<?php echo $news->news_url ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
                <?php esc_html_e('Read more', 'epfl');?>
                <span class="sr-only">sur Tech Transfer.</span>
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
              </a>
            </div>
            <div class="fullwidth-teaser-content">
              <p><?php echo $subtitle ?></p>
            </div>
            <div class="fullwidth-teaser-footer">
              <a href="<?php echo $news->news_url ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none"><?php esc_html_e('Read more', 'epfl');?></a>
            </div>
          </div>
        </div>

  <?php else: ?>

        <div class="col-md-6 d-flex">
          <a href="<?php echo $news->news_url ?>" class="card link-trapeze-horizontal">
            <div class="card-body">
              <h3 class="card-title"><?php echo $news->title ?></h3>
              <div class="card-info">
                <span class="card-info-date">
                  <time datetime="DATETIME HERE"><?php echo $publish_date ?></time>
                </span>
                <span><?php esc_html_e('News', 'epfl');?></span>
                <span><?php echo $category ?></span>
              </div>
              <p><?php echo $subtitle ?></p>
            </div>
          </a>
        </div>

  <?php endif; ?>
<?php endif; ?>

<?php if ($template == 2 and $last == $count): ?>
      </div>
      <?php if ("true" == $display_all_news_link): ?>
      <p class="text-center">
        <a class="link-pretty" href="https://actu.epfl.ch/search/mediacom/">
          <?php esc_html_e('All news', 'epfl' );?>
        </a>
      </p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php
      $count++;
    } // end foreach
?>

<?php if ("true" == $display_all_news_link and $template != 2 and "" != $channel): ?>
<p class="text-center">
  <a class="link-pretty" href="<?php echo $url_channel; ?>"><?php esc_html_e('All news', 'epfl' );?></a>
</p>
<?php endif; ?>

</div>
</div>