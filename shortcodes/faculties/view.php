<?php
  $data = get_query_var('epfl_faculties_data');
  if (!$data) return true;
?>
<?php if (true): ?>
  <div class="container-full p-lg-5 <?php echo $greyClasses ?>">
    <div class="row">
      <?php for($i = 1; $i <= 7; $i++): ?>
        <?php if ($data['title'.$i]) : ?>
          <?php $image = get_post($data['image'.$i]); ?>
          <div class="col-sm-4">
            <a href="<?php echo $data['link'.$i]; ?>" class="card card-overlay link-trapeze-horizontal">
              <picture class="card-img">
                <?php echo wp_get_attachment_image($data['image'.$i], 'thumbnail_16_9_crop', '', ['class' => 'img-fluid']) ?>
              </picture>
              <div class="card-img-overlay">
                <h3 class="h4 card-title">
                  <span class="text-padded"><?php echo $data['title'.$i]; ?></span>
                </h3>
                <p class="h4">
                  <strong class="text-padded"><?php echo $data['subtitle'.$i]; ?></strong>
                </p>
              </div>
            </a>
          </div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>
<?php endif; ?>
