<?php
$data = get_query_var('epfl_custom_teasers_data');
if (!$data) return true;

$elementCount = 0;
for($i = 1; $i < 4; $i++){
  if (strlen($data['title'.$i]) > 0) {
    $elementCount++;
  }
}

$greyClasses = '';
if ($data['graybackground'] === 'true') $greyClasses = 'bg-gray-100 py-4 mt-4';
?>
<div class="container-full p-lg-5 <?php echo $greyClasses ?>">
  <div class="container">
    <h3 class="h6 mb-3<?php echo ($elementCount < 3) ? ' text-center' : '' ?>"><?php echo $data['titlesection'] ?: 'Section title'; ?></h3>

    <div class="card-deck <?php echo ($elementCount < 3) ? ' card-deck-line' : '' ?>">

      <?php
      for($i = 1; $i < 4; $i++):
        if ($data['title'.$i]) :
        $image = get_post($data['image'.$i]);
      ?>
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
      <?php
        endif;
        endfor;
      ?>

    </div>
  </div>
</div>
