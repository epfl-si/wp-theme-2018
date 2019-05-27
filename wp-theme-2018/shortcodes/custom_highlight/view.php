<?php
$data = get_query_var('epfl_custom_highlight_data');

// manage layout
$classes = '';
if ($data['layout'] == 'bottom') $classes = 'fullwidth-teaser-horizontal';
if ($data['layout'] == 'left') $classes = 'fullwidth-teaser-left';
if ($data['layout'] == '') $classes = 'fullwidth-teaser-right';
?>

<div class="container-full">
  <div class="fullwidth-teaser my-3  <?php echo $classes; ?>">
    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="cover">
      <!-- <picture> -->
        <?php // get/slice image informations
        $image_src = wp_get_attachment_image_src($data['image'], 'thumbnail_16_9_large')[0]; // see functions.php
        $image_caption = wp_get_attachment_caption($data['image']);
        $image_alt = get_post_meta($data['image'] , '_wp_attachment_image_alt', true);
         ?>
        <img src="<?php echo $image_src ?>" alt="<?php echo $image_alt ?>" />
      <!-- </picture> -->
      <?php if ($image_caption): ?>
        <figcaption>
          <button aria-hidden="true" type="button" class="btn-circle" data-toggle="popover" data-content="<?php echo $image_caption ?>">
            <svg class="icon" aria-hidden="true"><use xlink:href="#icon-info"></use></svg>
            <svg class="icon icon-rotate-90" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
          </button>
          <p class="sr-only"><?php echo $image_caption ?></p>
        </figcaption>
      <?php endif; ?>
    </figure>
    <div class="fullwidth-teaser-text">

      <div class="fullwidth-teaser-header">
        <div class="fullwidth-teaser-title">
          <h3>
            <?php echo $data['title'] ?>
          </h3>
        </div>
        <a href="<?php echo $data['link'] ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block"><?php echo $data['buttonlabel'] ?: __('See more', 'epfl') ?></a>
      </div>

      <?php if (!empty($data['description'])): ?>
        <div class="fullwidth-teaser-content">
          <p>
            <?php echo $data['description'] ?>
          </p>
        </div>
      <?php endif; ?>

      <div class="fullwidth-teaser-footer">
        <a href="<?php echo $data['link'] ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none"><?php echo $data['buttonlabel'] ?: __('See more', 'epfl') ?></a>
      </div>
    </div>
  </div>
</div>
