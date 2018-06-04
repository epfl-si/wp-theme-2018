<?php 
$page = get_query_var('epfl_shortcode_teaser_page_fullwidth');
  if (!$page) return true;
$content = explode('<!--more-->', $page->post_content)[0];
?>

<div class="fullwidth-teaser mb-5">
  <picture>
    <img src="<?php echo get_the_post_thumbnail_url($page) ?>" aria-labelledby="background-label" alt="An image description"/>
  </picture>

  <div class="fullwidth-teaser-text">

    <div class="fullwidth-teaser-header">
      <div class="fullwidth-teaser-title">
        <h3><?php echo $page->post_title; ?></h3>
      </div>
      <a href="<?php echo get_permalink($page); ?>" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block">En savoir plus</a>
    </div>

    <div class="fullwidth-teaser-content">
      <p><?php echo $content ?></p>
    </div>

    <div class="fullwidth-teaser-footer">
      <a href="<?php echo get_permalink($page); ?>" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">En savoir plus</a>
    </div>
  </div>
</div>