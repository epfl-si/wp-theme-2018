<?php
$quote  = get_query_var('epfl_quote');
$cite   = get_query_var('epfl_quote_cite');
$footer = get_query_var('epfl_quote_footer');
$image  = get_query_var('epfl_quote_image');
?>
<div class="row my-3">
  <div class="col-6 offset-3 col-sm-4 offset-sm-4 col-md-2 offset-md-0 text-center text-md-right">
    <picture>
      <?php echo wp_get_attachment_image(
        $image,
        'thumbnail_square_crop', // see functions.php
        '',
        [
          'class' => 'img-fluid rounded-circle',
          'alt' => esc_attr($cite)
        ]
        ) ?>
    </picture>
  </div>
  <blockquote class="blockquote mt-3 col-md-10 border-0">
    <p class="mb-0"><?php echo esc_attr($quote); ?></p>
    <footer class="blockquote-footer"><cite title="<?php echo esc_attr($cite); ?>"><?php echo esc_html($cite); ?></cite>, <?php echo esc_html($footer); ?></footer>
  </blockquote>
</div>