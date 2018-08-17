<?php
  $template = get_query_var('epfl_news_template');
  $data = get_query_var('epfl_news_data');
  $is_first_event = get_query_var('epfl_news_is_first_news');

  if (get_locale() == 'fr_FR') {
    $image_description = $data->fr_description;
  } else {
    $image_description = $data->en_description;
  }
  
  $publish_date = new DateTime($data->publish_date);
  $publish_date = $publish_date->format('d.m.y');
  $subtitle = str_ireplace('<p>', '', $data->subtitle);
?>

<?php 
  if ("1" == $template):
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
        <time datetime="<?php echo $publish_date ?>"><span class="sr-only">Published:</span><?php echo $publish_date ?></time>
        <span class="text-muted">— <?php echo $subtitle ?></span>
      </p>
    </div>
  </div>
</a>

<?php 
  elseif ("2" == $template):
?>

  <?php if (true === $is_first_event): ?>

  <div class="fullwidth-teaser fullwidth-teaser-horizontal">
    <picture>
      <img src="<?php echo $data->visual_url ?>" aria-labelledby="background-label" alt="<?php echo $image_description ?>"/>
    </picture>
    <div class="fullwidth-teaser-text">
      <div class="fullwidth-teaser-header">
        <div class="fullwidth-teaser-title">
          <h3><?php echo $data->title ?></h3>
          <ul class="list-inline mt-2">
            <li class="list-inline-item">Actualités</li>
            <li class="list-inline-item">Biologie</li>
          </ul>
        </div>
        <a href="#" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
          Lire l'article
          <span class="sr-only">sur Tech Transfer.</span>
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
        </a>
      </div>
      <div class="fullwidth-teaser-content">
        <p><?php echo $subtitle ?></p>
      </div>
      <div class="fullwidth-teaser-footer">
        <a href="#" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">En savoir plus</a>
      </div>
    </div>
  </div>

  <?php else: ?>

  <div class="col-md-6 d-flex">
    <a href="#" class="card link-trapeze-horizontal">
      <div class="card-body">
        <h3 class="card-title"><?php echo $data->title ?></h3>
        <div class="card-info">
          <span class="card-info-date">
            <time datetime="DATETIME HERE"><?php echo $publish_date ?></time>
          </span>
          <span>Actualité</span>
          <span>Nanotechnologies</span>
        </div>
        <p><?php echo $subtitle ?></p>
      </div>
    </a>
  </div>

  <?php endif; ?>
<?php endif; ?>