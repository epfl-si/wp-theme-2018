<?php
  $data = get_query_var('epfl_cards');

  if (!$data) return true;

  $elementCount = 0;
  for($i = 1; $i < 4; $i++){
    if (strlen(sanitize_text_field($data['title'.$i])) > 0) {
      $elementCount++;
    }
  }
?>
<?php if ($elementCount > 1): ?>
<div class="container my-3">
  <div class="card-deck <?php echo ($elementCount < 3) && ($elementCount > 1) ? ' card-deck-line' : '' ?>">
<?php endif ?>
    <?php
    for($i = 1; $i < 4; $i++):
      if ($data['title'.$i]) :
      $image = get_post($data['image'.$i]);
    ?>
    <div class="card">
      <?php if ($data['image'.$i]): ?>
      <a href="<?php echo esc_url($data['url'.$i]) ?: '#' ?>" class="card-img-top">
        <picture class="card-img-top">
        <?php echo wp_get_attachment_image(
          $data['image'.$i],
          'thumbnail_16_9_crop', // see functions.php
          '',
          [
            'class' => 'img-fluid',
            'title' => $image->post_excerpt
          ]
          ) ?>
        </picture>
      </a>
      <?php endif; ?>
        <div class="card-body">
          <div class="card-title"><a href="<?php echo esc_url($data['url'.$i]) ?: '#' ?>" class="h3"><?php echo esc_html($data['title'.$i]) ?: '' ?></a></div>
          <p><?php echo wp_kses_post(urldecode($data['content'.$i])) ?: '' ?></p>
        </div>
      </div>
    <?php
      endif;
      endfor;
    ?>
<?php if ($elementCount > 1): ?>
  </div>
</div>
<?php endif ?>
