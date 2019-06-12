<?php

  require_once('utils.php');

  $template              = get_query_var('epfl_news_template');
  $display_all_news_link = get_query_var('epfl_news_all_news_link');
  $data                  = get_query_var('epfl_news_data');

  $count  = 1;
  $header = false;
  $last   = count($data);

  $url_channel = epfl_news_get_url_channel($data);
 
?>

<?php if ("1" == $template): ?>
  <div class="container my-3">
<?php elseif ("4" == $template || "5" == $template || "6" == $template): ?>
    <div class="container-full my-3 pl-5">
<?php else: ?>
    <div class="container-full my-3">
<?php endif ?>
    <div class="list-group">
      <?php
        foreach($data as $news) {

          $is_first_event       = ($count==1);
          $image_description    = epfl_news_get_image_description($news);
          $category             = epfl_news_get_label_category($news);
          $publish_date         = epfl_news_get_publish_date($news);
          $subtitle             = epfl_news_get_subtitle($news);
          $visual_url           = epfl_news_get_visual_url($news);
          $short_vimeo_video_id = $news->short_vimeo_video_id;
        
          if ( !empty($short_vimeo_video_id) ) {
            $media_url = "https://player.vimeo.com/video/" . $short_vimeo_video_id . "?autoplay=1&loop=1&muted=1&background=1&quality=720";
          }
          
          if (2 == $template and 1 != $count and false == $header) {
            $header = true;
              echo '<div class="container pb-5 offset-xl-top pt-5 pt-xl-0">';
              echo '<div class="row">';
              echo '<div class="col-lg-10 offset-lg-1">';
              echo '<div class="row mb-4">';
          }

          if (("5" == $template  or "6" == $template or "4" == $template) and $is_first_event) {
            echo '<h2 class="mt-5 mb-4">';
            esc_html_e('The latest news', 'epfl');
            echo '</h2>';
            echo '<div class="row">';
          }
      ?>

<?php
  if ("1" == $template): // TEMPLATE LISTING
?>
        <a href="<?php echo esc_url($news->news_url) ?>" class="list-group-item list-group-teaser link-trapeze-vertical">
          <div class="list-group-teaser-container">
            <div class="list-group-teaser-thumbnail">
              <picture>
                <img src="<?php echo esc_url($visual_url) ?>" class="img-fluid" alt="<?php echo esc_attr($image_description) ?>" >
              </picture>
            </div>
            <div class="list-group-teaser-content">
              <p class="h5"><?php echo esc_html($news->title) ?></p>
              <p>
                <time datetime="<?php echo esc_attr($publish_date) ?>"><span class="sr-only">Published:</span><?php echo esc_html($publish_date) ?></time>
                <span class="text-muted">— <?php echo esc_html($subtitle) ?></span>
              </p>
            </div>
          </div>
        </a>

<?php
  elseif ("6" == $template or "5" == $template or "4" == $template): // TEMPLATE CARD WITH 1, 2 or 3 NEWS
?>
    <?php if ("6" == $template): ?>
    <div class="col-md-4">
    <?php elseif ("5" == $template or "4" == $template): ?>
    <div class="col-md-6">
    <?php endif ?>
      <a href="<?php echo esc_url($news->news_url) ?>" class="card link-trapeze-horizontal" itemscope itemtype="https://schema.org/NewsArticle">
        <picture class="card-img-top">
          <img src="<?php echo esc_url($visual_url) ?>" class="img-fluid" title="<?php echo esc_attr($image_description) ?>" alt="<?php echo esc_attr($image_description) ?>" />
        </picture>
        <div class="card-body">
          <h3 class="card-title" itemprop="name"><?php echo esc_html($news->title) ?></h3>
          <div class="card-info">
            <span class="card-info-date" itemprop="datePublished" content="<?php echo esc_attr($publish_date) ?>"><?php echo esc_html($publish_date) ?></span>
            <span itemprop="about"><?php echo esc_html($category) ?></span>
          </div>
          <p itemprop="description"><?php echo esc_html($subtitle) ?></p>
        </div>
      </a>
    </div>
<?php
  elseif ("3" == $template): // TEMPLATE WWW WITH 1 NEWS
?>
      <div class="fullwidth-teaser fullwidth-teaser-horizontal">
        <?php if (!empty($media_url)): ?>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php echo $media_url; ?>" frameborder="1"></iframe>
            </div>
        <?php else: ?>
          <picture>
            <img src="<?php echo esc_url($visual_url) ?>" aria-labelledby="background-label" alt="<?php echo esc_attr($image_description) ?>"/>
          </picture>
        <?php endif ?>
          <div class="fullwidth-teaser-text">
            <div class="fullwidth-teaser-header">
              <div class="fullwidth-teaser-title">
                <h3><?php echo $news->title ?></h3>
                <ul class="list-inline mt-2">
                  <li class="list-inline-item"><?php esc_html_e('News', 'epfl') ?></li>
                  <li class="list-inline-item"><?php echo esc_html($category) ?></li>
                </ul>
              </div>
              <a href="<?php echo esc_url($news->news_url) ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
                <?php esc_html_e('Read more', 'epfl');?>
                <span class="sr-only">sur Tech Transfer.</span>
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
              </a>
            </div>
            <div class="fullwidth-teaser-content">
              <p><?php echo esc_html($subtitle) ?></p>
            </div>
            <div class="fullwidth-teaser-footer">
              <a href="<?php echo esc_url($news->news_url) ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none"><?php esc_html_e('Read more', 'epfl');?></a>
            </div>
          </div>
        </div>
<?php 
  elseif ("2" == $template): // TEMPLATE WWW WITH 3 NEWS
?>
<?php if ($is_first_event): ?>

        <div class="fullwidth-teaser fullwidth-teaser-horizontal">
        <?php if (!empty($media_url)): ?>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe src="<?php echo $media_url; ?>" frameborder="1"></iframe>
          </div>
        <?php else: ?>
          <picture>
            <img src="<?php echo esc_url($visual_url) ?>" aria-labelledby="background-label" alt="<?php echo esc_attr($image_description) ?>"/>
          </picture>
        <?php endif ?>
          <div class="fullwidth-teaser-text">
            <div class="fullwidth-teaser-header">
              <div class="fullwidth-teaser-title">
                <h3><?php echo esc_html($news->title) ?></h3>
                <ul class="list-inline mt-2">
                  <li class="list-inline-item"><?php esc_html_e('News', 'epfl') ?></li>
                  <li class="list-inline-item"><?php echo esc_html($category) ?></li>
                </ul>
              </div>
              <a href="<?php echo esc_url($news->news_url) ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
                <?php esc_html_e('Read more', 'epfl');?>
                <span class="sr-only">sur Tech Transfer.</span>
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
              </a>
            </div>
            <div class="fullwidth-teaser-content">
              <p><?php echo esc_html($subtitle) ?></p>
            </div>
            <div class="fullwidth-teaser-footer">
              <a href="<?php echo esc_url($news->news_url) ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none"><?php esc_html_e('Read more', 'epfl');?></a>
            </div>
          </div>
        </div>

  <?php else: ?>

        <div class="col-md-6 d-flex">
          <a href="<?php echo esc_url($news->news_url) ?>" class="card link-trapeze-horizontal">
            <div class="card-body">
              <h3 class="card-title"><?php echo esc_html($news->title) ?></h3>
              <div class="card-info">
                <span class="card-info-date">
                  <time datetime="DATETIME HERE"><?php echo esc_html($publish_date) ?></time>
                </span>
                <span><?php esc_html_e('News', 'epfl');?></span>
                <span><?php echo esc_html($category) ?></span>
              </div>
              <p><?php echo esc_html($subtitle) ?></p>
            </div>
          </a>
        </div>

  <?php endif; ?>
<?php endif; ?>

<?php if ($template == 2 and $last == $count): ?>
      </div>
      <?php if ("true" == $display_all_news_link): ?>
      <p class="text-center">
        <a class="link-pretty" href="<?php echo $url_channel; ?>">
          <?php esc_html_e('All news', 'epfl' );?>
        </a>
      </p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if ((5 == $template or 4 == $template or 6 == $template) and $last == $count): ?>
  </div>
<?php endif; ?>

<?php
      $count++;
    } // end foreach
?>

<?php if ("true" == $display_all_news_link and 2 != $template and 4 != $template and "" != $url_channel): ?>
<p class="text-center">
  <a class="link-pretty" href="<?php echo $url_channel; ?>"><?php esc_html_e('All news', 'epfl' );?></a>
</p>
<?php endif; ?>

</div>
</div>
