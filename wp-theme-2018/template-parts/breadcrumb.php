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

    // little home url (first element of the breadcrumb)
    if ( get_option('stylesheet') === 'wp-theme-light' ) {
      $little_home_url = get_site_url();
    } else {
      $little_home_url = get_epfl_home_url();
    }

    $items = array();
    if(($menu_items = wp_get_nav_menu_items(get_current_menu_slug()))!==false)
    {
        foreach ($menu_items as $item) {
            $items[(int) $item->db_id] = $item;
        }
    }

    $wp_filter_object_list = wp_filter_object_list( $items, ['object_id' => $post->ID]);

    $item = $items ? reset($wp_filter_object_list) : false;

    $crumbs = array();

    echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper"><ol class="breadcrumb">';
    $crumbs[] = '
        <li class="breadcrumb-item">
            <a class="bread-link bread-home" href="' . $little_home_url . '" title="home">
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-home"></use></svg>
            </a>
        </li>';

    // get an array of custom tags that we will show before the real breadcrumb
    /* custom_tags should be like
      array(x) {
        [0]=>
        object(stdClass)#1520 (6) {
          ["_id"]=>
          string(17) "oxpw3wpg2Pjr6evrB"
          ["url_fr"]=>
          string(34) "https://www.epfl.ch/schools/ic/fr/"
          ["url_en"]=>
          string(31) "https://www.epfl.ch/schools/ic/"
          ["name_fr"]=>
          string(2) "IC"
          ["name_en"]=>
          string(2) "IC"
          ["type"]=>
          string(7) "faculty"
        },
        {
          ...
        }
      }
    */

    $custom_tags = apply_filters('get_site_tags', '');

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
