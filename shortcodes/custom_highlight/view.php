<?php 
$data = get_query_var('epfl_custom_highlight_data');

// manage layout
$classes = '';
if ($data['layout'] == 'bottom') $classes = 'fullwidth-teaser-horizontal';
if ($data['layout'] == 'left') $classes = 'fullwidth-teaser-left';

?>

<div class="container-full">
  <div class="fullwidth-teaser mt-5  <?php echo $classes; ?>">
    <picture>
      <?php echo wp_get_attachment_image(
        $data['image'],
        'thumbnail_16_9_large', // see functions.php
        '',
        [
          'class' => 'img-fluid'
        ]
      ) ?>
      <img src="<?php echo $data['image'] ?>" aria-labelledby="background-label" alt="An image description"
      />
    </picture>

    <div class="fullwidth-teaser-text">

      <div class="fullwidth-teaser-header">
        <div class="fullwidth-teaser-title">
          <h3>
            <?php echo $data['title'] ?>
          </h3>
        </div>
        <a href="<?php echo $data['link'] ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block"><?php echo $data['buttonlabel'] ?: 'En savoir plus' ?></a>
      </div>

      <?php if (!empty($data['description'])): ?>
        <div class="fullwidth-teaser-content">
          <p>
            <?php echo $data['description'] ?>
          </p>
        </div>
      <?php endif; ?>

      <div class="fullwidth-teaser-footer">
        <a href="<?php echo $data['link'] ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none"><?php echo $data['buttonlabel'] ?: 'En savoir plus' ?></a>
      </div>
    </div>
  </div>
</div>