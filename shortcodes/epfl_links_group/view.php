<?php
    $links    = get_query_var('epfl_links_group_links');
    $main_url = get_query_var('epfl_links_group_main_url');
    $title    = get_query_var('epfl_links_group_title');
    $is_links_teaser = ("" !== $main_url);
?>
<div class="links-group <?php if ($is_links_teaser):?>links-group-teaser<?php endif; ?>">
  <h5 id="links-group-title">
    <?php if($is_links_teaser): ?>
    <a class="link-pretty" href="<?php echo $main_url; ?>"><?php echo $title; ?></a>
    <?php else: ?>
    <?php echo $title; ?>
    <?php endif; ?>
  </h5>
  <nav
    class="nav flex-column flex-wrap align-items-start"
    role="navigation"
    aria-labelledby="links-group-title"
  >
  <?php foreach($links as $link): ?>
    <a class="nav-link link-pretty" href="<?php echo $link['url']; ?>"><?php echo $link['label']; ?></a>
  <?php endforeach ?>
  </nav>
</div>