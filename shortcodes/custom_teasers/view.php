<?php 
$data = get_query_var('epfl_custom_teasers_data');
if (!$data) return true;

$greyClasses = '';
if ($data['graybackground'] === 'true') $greyClasses = 'bg-gray-100 py-4 my-4';
?>
<div class="container-full p-lg-5 <?php echo $greyClasses ?>">
  <div class="container">
    <h3 class="h6 mb-3"><?php echo $data['titlesection'] ?: 'Section title'; ?></h3>

    <div class="row">

      <?php 
      for($i = 1; $i < 4; $i++):
        if ($data['title'.$i]) :
        $image = get_post($data['image'.$i]);
      ?>
      <div class="col-md-4 d-flex">
        <div class="card">
        <?php if ($data['image'.$i]): ?>
          <a href="<?php echo $data['url'.$i] ?: '#' ?>" class="card-img-top">
            <picture>
            <?php echo wp_get_attachment_image(
              $data['image'.$i],
              'thumbnail_16_9_crop', // see functions.php
              '',
              [
                'class' => 'img-fluid',
                'title' => $image->post_excerpt
              ]
              ) ?>
            </picture>
          </a>
          <?php endif; ?>
          <div class="card-body">
            <h3 class="card-title">
              <a href="<?php echo $data['url'.$i] ?: '#' ?>"><?php echo $data['title'.$i] ?: 'Title' ?></a>
            </h3>
            <p><?php echo $data['excerpt'.$i] ?: '' ?></p>
          </div>
          <div class="card-footer mt-auto">
            <a href="<?php echo $data['url'.$i] ?: '#' ?>" class="btn btn-secondary btn-sm"><?php echo $data['buttonlabel'.$i] ?: 'See more' ?></a>
          </div>
        </div>
      </div>
      <?php
        endif;
        endfor;
      ?>

    </div>
  </div>
</div>
