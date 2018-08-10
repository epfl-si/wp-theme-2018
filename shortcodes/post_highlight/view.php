<?php 
$data = get_query_var('epfl_post_highlight_data');
$page = get_post($data['post']);
  if (!$post) return true;

// manage layout
$classes = '';
if ($data['layout'] == 'bottom') $classes = 'fullwidth-teaser-horizontal';
if ($data['layout'] == 'left') $classes = 'fullwidth-teaser-left';

?>
<div class="container-full">
  <div class="fullwidth-teaser mb-5 <?php echo $classes; ?>">
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
        <a href="<?php echo get_permalink($post); ?>" aria-label="Link to read more of that post" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block"><?php echo esc_html__( "Lire l'article", 'epfl-shortcodes' ) ?></a>
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
        <a href="<?php echo get_permalink($post); ?>" aria-label="Link to read more of that post" class="btn btn-primary btn-block d-xl-none"><?php echo esc_html__( "Lire l'article", 'epfl-shortcodes' ) ?></a>
      </div>
    </div>
  </div>
</div>