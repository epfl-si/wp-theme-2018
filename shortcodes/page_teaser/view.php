<?php

$data = get_query_var('epfl_page_teaser_data');
if (!$data) return true;
$pagesCount = count($data) - 1;
$gray = $data['gray'];
?>
  <div class="container-full py-5 mt-5<?php echo $gray ? ' bg-gray-100' : '' ?>">
    <div class="container">
      <div class="card-deck<?php echo ($pagesCount < 3) ? ' card-deck-line' : '' ?>">
        <?php foreach($data as $key => $page) : ?>
        <?php
        if (strpos($key, 'page') !== 0) continue; ?>
        <div class="card">
          <?php
          $page_url = get_permalink($page);
            card_img_top(
              get_the_post_thumbnail($page, 'thumbnail_16_9_crop', ['class' => 'img-fluid']),
              $page_url
            );
          ?>
          <div class="card-body">
            <div class="card-title">
              <a href="<?php echo $page_url; ?>" class="h3"><?php echo $page->post_title; ?></a>
            </div>
            <?php
              $excerpt = epfl_excerpt($page);
              if (!empty($excerpt)):
            ?>
              <p>
                <?php echo $excerpt; ?>
              </p>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
