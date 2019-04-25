<?php
/**
 * hide breadcrumbs on:
 *  - homepage
 *  - homepage template
 */
$currentTemplate = get_page_template_slug();

if ($currentTemplate == 'page-homepage.php') {
    return;
  }
?>
<div class="breadcrumb-container">
  <!-- Browse  -->
  <div>
    <button id="nav-toggle" class="nav-toggle btn btn-secondary">
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-browse"></use>
      </svg>
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-close"></use>
      </svg>
      <?php echo __("Browse", 'epfl') ?>
    </button>
  </div>
  <!-- end Browse -->

  <!-- Breadcrumb -->
  <?php
    // Breadcrumb
    $items = array();
    if(($menu_items = wp_get_nav_menu_items(get_current_menu_slug()))!==false)
    {
        foreach ($menu_items as $item) {
            $items[(int) $item->db_id] = $item;
        }
    }

    $item = $items ? reset(wp_filter_object_list( $items, ['object_id' => $post->ID])) : false;

    $crumbs = array();

    echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper"><ol class="breadcrumb">';
    $crumbs[] = '
        <li class="breadcrumb-item">
            <a class="bread-link bread-home" href="' . get_epfl_home_url() . '" title="home">
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-home"></use></svg>
            </a>
        </li>';

    if(function_exists('epfl_fetch_site_tags')) {
        $custom_tags = [];
        $custom_tags = epfl_fetch_site_tags();

      # custom_tags should be like [["_id", "name_en", "url_en", "name_fr", "url_fr", "type"], ...]
      if (!empty($custom_tags)) {
        $ln = get_current_language();
        $crumbs[] = "
                    <li class=\"breadcrumb-item breadcrumb-tags-wrapper\">";

        foreach($custom_tags as $tag_item) {
          if ($ln === 'fr') {
            $tag_name = $tag_item->name_fr;
            if(!empty($tag_item->url_fr)) {
              $tag_url = $tag_item->url_fr;
            } else {
              $tag_url = $tag_item->url_en;
            }
          } else {
            $tag_name = $tag_item->name_en;
            $tag_url = $tag_item->url_en;
          }

          $crumbs[] = "
              <a href=\"{$tag_url}\" class=\"tag tag-primary\">". esc_html($tag_name) . "</a>
          ";
        }
        $crumbs[] = "</li>";
      }
    }

    $crumb_items = array();
    for($crumb_item = $item;
        $crumb_item;
        $crumb_item = $items[(int) $crumb_item->menu_item_parent])
    {
        array_unshift($crumb_items, $crumb_item);
    }
    if ($crumb_items) {
      foreach($crumb_items as $crumb_item) {
          if ((int) $item->db_id === (int) $crumb_item->db_id) {
            $crumbs[] = "
                  <li class=\"breadcrumb-item active\" aria-current=\"page\">
                      {$crumb_item->title}
                  </li>";
          } else {
              $crumbs[] = "
                  <li class=\"breadcrumb-item\">
                      <a class=\"bread-link bread-home\" href=\"{$crumb_item->url}\" title=\"{$crumb_item->title}\">
                          {$crumb_item->title}
                      </a>
                  </li>";
          }
      }
    }
    echo implode('', $crumbs);
    echo '</ol></nav>';
  ?>
  <!-- end Breadcrumb -->
</div>