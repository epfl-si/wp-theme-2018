<?php
  $data = get_query_var('epfl_cards');
  $gray_wrapper = $data['gray_wrapper'];

  if (!$data) return true;

  $elementCount = 0;
  for($i = 1; $i < 4; $i++){
    if (strlen(esc_html($data['title'.$i])) > 0) {
      $elementCount++;
    }
  }
?>

<div class="container-full py-3<?php echo ($gray_wrapper) ? ' bg-gray-100' : '' ?>">
  <div class="card-deck <?php echo ($elementCount < 3) && ($elementCount > 1) ? ' card-deck-line' : '' ?>">
    <?php
    for($i = 1; $i < 4; $i++):
      $title = esc_html($data['title'.$i]);

      if (strlen($title) > 0) :  # show the card only if the title is set
        $image_id = $data['image'.$i];
        $image_post = get_post($image_id);
        $url = esc_url($data['link'.$i]);
        $content = urldecode($data['content'.$i]);
    ?>
    <div class="card">
      <?php if ($image_id): ?>
        <?php if ($url): ?>
      <a href="<?php echo $url ?>" class="card-img-top">
        <?php else: ?>
      <div class="card-img-top">
        <?php endif; ?>
        <picture>
        <?php echo wp_get_attachment_image(
          $image_id,
          'thumbnail_16_9_large', // see functions.php
          '',
          [
            'class' => 'img-fluid',
            'title' => $image_post->post_excerpt
          ]
          ) ?>
        </picture>
        <?php if ($url): ?>
      </a>
        <?php else: ?>
      </div>
        <?php endif; ?>
      <?php endif; ?>
        <div class="card-body">
          <?php if ($url): ?>
          <div class="card-title"><a href="<?php echo $url ?>" class="h3"><?php echo $title ?></a></div>
          <?php else: ?>
          <div class="card-title"><div class="h3"><?php echo $title ?></div></div>
          <?php endif; ?>
          <p><?php echo $content ?></p>
        </div>
      </div>
    <?php
      endif;
      endfor;
    ?>
  </div>
</div>
