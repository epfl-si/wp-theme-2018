<?php

function card_img_top($img, $url, $islink = true){

  //display nothing if no image available
  if (!$img) return '';
  ?>

  <?php if ($islink): ?>
    <a href="<?php echo $url; ?>" class="card-img-top">
      <picture class="card-img-top">
        <?php echo $img; ?>
      </picture>
    </a>
  <?php else: ?>
    <picture class="card-img-top">
      <?php echo $img; ?>
    </picture>
  <?php endif; ?>

<?php } ?>