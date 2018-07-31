<?php 
$post = get_query_var('epfl_post_highlight_data');
  if (!$post) return true;
?>
<div class="container-full">
  <div class="fullwidth-teaser mb-5">
  <?php if (has_post_thumbnail( $post )) : ?>
    <picture>
      <img src="<?php echo get_the_post_thumbnail_url($post) ?>" aria-labelledby="background-label" alt="An image description"
      />
    </picture>
    <?php endif; ?>

    <div class="fullwidth-teaser-text">

      <div class="fullwidth-teaser-header">
        <div class="fullwidth-teaser-title">
          <h3>
            <?php echo $post->post_title; ?>
          </h3>
        </div>
        <a href="<?php echo get_permalink($post); ?>" aria-label="Link to read more of that post" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block">Lire l'article</a>
      </div>

      <?php
        $excerpt = get_the_excerpt();
        if (!empty($excerpt)):
      ?>
        <div class="fullwidth-teaser-content">
          <p>
            <?php echo $excerpt; ?>
          </p>
        </div>
      <?php endif; ?>

      <div class="fullwidth-teaser-footer">
        <a href="<?php echo get_permalink($post); ?>" aria-label="Link to read more of that post" class="btn btn-primary btn-block d-xl-none">Lire l'article</a>
      </div>
    </div>
  </div>
</div>