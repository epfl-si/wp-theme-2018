<?php
    $title = get_query_var('epfl_card_title');
    $text  = get_query_var('epfl_card_text');
    $link  = get_query_var('epfl_card_link');
    $image = get_query_var('epfl_card_image');
?>

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