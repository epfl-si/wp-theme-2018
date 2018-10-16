<?php
    $description = get_query_var('epfl_cover_description');
    $image = get_query_var('epfl_cover_image');
?>

<div class="container my-3">
  <figure class="cover">
    <picture>
      <?php echo wp_get_attachment_image(
        $image,
        'thumbnail_16_9_crop', // see functions.php
        '',
        [
          'class' => 'img-fluid',
          'alt' => esc_attr($description)
        ]
        ) ?>
      </picture>
    <?php if (!empty($description)): ?>
    <figcaption>
      <button
        aria-hidden="true"
        type="button"
        class="btn-circle"
        data-toggle="popover"
        data-content="<?php echo esc_attr($description) ?>"
      >
        <svg class="icon" aria-hidden="true"><use xlink:href="#icon-info"></use></svg>
        <svg class="icon icon-rotate-90" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
      </button>
      <p class="sr-only"><?php echo esc_html($description) ?></p>
      </figcaption>
      <?php endif ?>
  </figure>
</div>