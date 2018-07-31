<?php

function card_img_top($img, $url){

  //display nothing if no image available
  if (!$img) return '';
  ?>
  <a href="<?php echo $url; ?>" class="card-img-top">
    <picture class="card-img-top">
      <?php echo $img; ?>
    </picture>
  </a>

<?php } ?>