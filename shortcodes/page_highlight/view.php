<?php
$data = get_query_var('epfl_page_highlight_data');
$page = get_post($data['page']);
  if (!$page) return true;

// get excerpt
$content = reset(explode('<!--more-->', $page->post_content));

// manage layout
$classes = '';
if ($data['layout'] == 'bottom') $classes = 'fullwidth-teaser-horizontal';
if ($data['layout'] == 'left') $classes = 'fullwidth-teaser-left';

?>

<div class="container-full">
  <div class="fullwidth-teaser mt-5 <?php echo $classes; ?>">
  <?php if (has_post_thumbnail( $page )) : ?>
    <picture>
      <img src="<?php echo get_the_post_thumbnail_url($page) ?>" aria-labelledby="background-label" alt="An image description"
      />
    </picture>
    <?php endif; ?>

    <div class="fullwidth-teaser-text">

      <div class="fullwidth-teaser-header">
        <div class="fullwidth-teaser-title">
          <h3>
            <?php echo $page->post_title; ?>
          </h3>
        </div>
        <a href="<?php echo get_permalink($page); ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block"><?php esc_html_e( "Read more", 'epfl' ) ?></a>
      </div>

      <?php if (!empty($content)): ?>
        <div class="fullwidth-teaser-content">
          <p>
            <?php echo epfl_excerpt($page); ?>
          </p>
        </div>
      <?php endif; ?>

      <div class="fullwidth-teaser-footer">
        <a href="<?php echo get_permalink($page); ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none"><?php esc_html_e( "Read more", 'epfl' ) ?></a>
      </div>
    </div>
  </div>
</div>
