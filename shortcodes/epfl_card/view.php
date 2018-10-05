<?php
  $data = get_query_var('epfl_cards');

  if (!$data) return true;

  $elementCount = 0;
  for($i = 1; $i < 4; $i++){
    if (strlen($data['title'.$i]) > 0) {
      $elementCount++;
    }
  }
?>
<div class="container my-3">
  <div class="card-deck <?php echo ($elementCount < 3) ? ' card-deck-line' : '' ?>">
    <?php
    for($i = 1; $i < 4; $i++):
      if ($data['title'.$i]) :
      $image = get_post($data['image'.$i]);
    ?>
    <a href="<?php echo $data['url'.$i] ?: '#' ?>" class="card link-trapeze-horizontal">
    <?php if ($data['image'.$i]): ?>
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
    <?php endif; ?>
      <div class="card-body">
        <h3 class="card-title"><?php echo $data['title'.$i] ?: 'Title' ?></h3>
        <p><?php echo wp_kses_post(urldecode($data['content'.$i])) ?: '' ?></p>
      </div>
    </a>
    <?php
      endif;
      endfor;
    ?>
  </div>
</div>


<?php /*
<div class="card-deck<?php echo ($elementCount < 3) ? ' card-deck-line' : '' ?>">
  <a href="<?php echo esc_url($link) ?>" class="card link-trapeze-horizontal">
    <?php if ($image): ?> 
    <picture class="card-img-top">
      <img src="<?php echo esc_url($image) ?>" class="img-fluid" title="<?php echo esc_attr($title) ?>" alt="<?php echo esc_attr($title) ?>" />
    </picture>
    <?php endif ?>
    <div class="card-body">
      <h3 class="card-title"><?php echo esc_html($title) ?></h3>
      <p><?php echo esc_html($text) ?></p>
    </div>
  </a>
</div>
*/?>