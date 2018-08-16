<?php 
/**
 * hide breadcrumbs on:
 *  - homepage
 *  - post listing page
 *  - page with no parent
 */
if (
  is_front_page()
) {
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
    $items = wp_get_nav_menu_items('menu-1');
    _wp_menu_item_classes_by_context( $items ); // Set up the class variables, including current-classes
    $crumbs = array();

    echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper"><ul class="p-0 m-0">';
    $crumbs[] = '
        <li class="breadcrumb-item">
            <a class="bread-link bread-home" href="' . get_home_url() . '" title="home">
                <svg class="icon"><use xlink:href="#icon-home"></use></svg>
            </a>
        </li>';

    foreach($items as $item) {
        if ($item->current_item_ancestor) {
            $crumbs[] = "
                <li class=\"breadcrumb-item\">
                    <a class=\"bread-link bread-home\" href=\"{$item->url}\" title=\"{$item->title}\">
                        {$item->title}
                    </a>
                </li>";
        } else if ($item->current) {
          $crumbs[] = "
                <li class=\"breadcrumb-item active\">
                    {$item->title}
                </li>";
        }
    }
    echo implode('', $crumbs);
    echo '</ul></nav>';
  ?>
  <!-- end Breadcrumb -->
</div>