<?php
  $data = get_query_var('epfl_hero_data');
  if (!$data) return true;
?>
<div class="container-full <?php echo $greyClasses ?>">
  <div class="hero">
    <div class="hero-content-container">
      <h1 class="hero-title"><?php echo $data['title'] ?></h1>
      <div class="hero-content">
        <?php echo $data['text'] ?>
      </div>
    </div>
    <div class="hero-img">
      <picture>
        <?php echo wp_get_attachment_image(
          $data['image'],
          'thumbnail_16_9_large', // see functions.php
          '',
          [
            'class' => 'img-fluid'
          ]
        ) ?>
      </picture>
    </div>
  </div>
</div>
