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
      Browse
    </button>
  </div>
  <!-- end Browse -->

  <!-- Breadcrumb -->
  <?php
    // Breadcrumb
    $items = array();
    foreach (wp_get_nav_menu_items(get_current_menu_slug()) as $item) {
        $items[(int) $item->db_id] = $item;
    }

    $item = $items ? reset(wp_filter_object_list( $items, ['object_id' => $post->ID])) : false;

    $crumbs = array();

    echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper"><ul class="p-0 m-0">';
    $crumbs[] = '
        <li class="breadcrumb-item">
            <a class="bread-link bread-home" href="' . get_home_url() . '" title="home">
                <svg class="icon"><use xlink:href="#icon-home"></use></svg>
            </a>
        </li>';

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
                  <li class=\"breadcrumb-item active\">
                      {$item->title}
                  </li>";
          } else {
              $crumbs[] = "
                  <li class=\"breadcrumb-item\">
                      <a class=\"bread-link bread-home\" href=\"{$item->url}\" title=\"{$item->title}\">
                          {$crumb_item->title}
                      </a>
                  </li>";
          }
      }
    }
    echo implode('', $crumbs);
    echo '</ul></nav>';
  ?>
  <!-- end Breadcrumb -->
</div>
