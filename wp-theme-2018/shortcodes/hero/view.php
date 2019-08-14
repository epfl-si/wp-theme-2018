<?php
  $data = get_query_var('epfl_hero_data');
  if (!$data) return true;
?>
<div class="container-full <?php echo $greyClasses ?> my-3">
  <div class="hero">
    <div class="hero-content-container">
      <h1 class="hero-title"><?php echo $data['title'] ?></h1>
      <?php if (array_key_exists('text', $data) && !empty($data['text'])): ?>
      <div class="hero-content">
        <p><?php echo $data['text'] ?></p>
      </div>
      <?php endif; ?>
    </div>
    <div class="hero-img">
      <picture>
        <?php echo wp_get_attachment_image(
          $data['image'],
          'thumbnail_16_9_large_80p', // see functions.php
          '',
          [
            'class' => 'img-fluid'
          ]
        ) ?>
      </picture>
    </div>
  </div>
</div>
