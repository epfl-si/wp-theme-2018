<?php

$data = get_query_var('epfl_post_teaser_data');
if (!$data) return true;
$postCount = count($data);
$gray = $data['gray'];
if (isset($data['gray'])) $postCount = $postCount - 1;
?>
  <div class="container-full mt-5<?php echo $gray ? ' bg-gray-100' : '' ?>">
    <div class="container">
      <div class="card-deck<?php echo ($postCount < 3) ? ' card-deck-line' : '' ?>">
        <?php foreach($data as $key => $post) : ?>
        <?php  $post_url = get_permalink($post); ?>
        <a href="<?php echo $post_url ?>" class="card link-trapeze-horizontal">
          <?php
            card_img_top(
              get_the_post_thumbnail($post, 'thumbnail_16_9_crop', ['class' => 'img-fluid']),
              $post_url,
              false
            );
          ?>
            <div class="card-body">
              <h3 class="card-title">
                <?php echo $post->post_title; ?>
              </h3>
              <div class="card-info">
                <span class="card-info-date"><?php echo get_the_date('d-m-Y', $post->ID); ?></span>
              </div>

              <?php
              $excerpt = epfl_excerpt($post);
              if (!empty($excerpt)): ?>
              <p>
                <?php echo $excerpt; ?>
              </p>
              <?php endif; ?>

            </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
