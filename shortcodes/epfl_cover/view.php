<?php
    $description = get_query_var('epfl_cover_description');
    $image = get_query_var('epfl_cover_image');
?>

<div class="container">
  <figure class="cover">
    <picture>
      <img src="<?php echo esc_url($image) ?>" class="img-fluid" alt="<?php echo esc_attr($description) ?>">
    </picture>
    <?php if ("" !== $description): ?>
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