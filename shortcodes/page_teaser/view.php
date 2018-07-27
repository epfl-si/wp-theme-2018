<?php 
require_once(__DIR__.'/templates/card-img-top.php');

$data = get_query_var('epfl_page_teaser_data');
if (!$data) return true;
//$content = explode('<!--more-->', $page->post_content)[0];
?>
  <div class="container-full bg-gray-100 py-5 my-5">
    <div class="container">
      <div class="card-deck">
        <?php foreach($data as $page):?>
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

            <p>The EPFL favors closer ties to industry leading research in order to best meet the scientific, technological and
              societal</p>
          </div>
          <!-- <div class="card-footer mt-auto">
            <a href="<?php echo $page_url; ?>" class="btn btn-secondary btn-sm">Voir</a>
          </div> -->
        </div>

        <?php endforeach ?>
      </div>
    </div>
  </div>