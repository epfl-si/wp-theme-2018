<?php
    $description = get_query_var('epfl_cover_description');
    $image = get_query_var('epfl_cover_image');
?>

<div class="container">
  <figure class="cover">
    <picture>
      <img src="<?php echo $image; ?>" class="img-fluid" alt="<?php echo $description; ?>">
    </picture>
    <figcaption>
      <button
        aria-hidden="true"
        type="button"
        class="btn-circle"
        data-toggle="popover"
        data-content="<?php echo $description; ?>"
      >
        <svg class="icon" aria-hidden="true"><use xlink:href="#icon-info"></use></svg>
        <svg class="icon icon-rotate-90" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
      </button>
      <p class="sr-only"><?php echo $description; ?></p>
      </figcaption>
  </figure>
</div>