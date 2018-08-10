<?php

require_once(__DIR__.'/breadcrumb_item.php');

// Breadcrumb
function generate_breadcrumb($theme_location = 'menu-1', $separator = ''){

    $items = wp_get_nav_menu_items($theme_location);
    _wp_menu_item_classes_by_context( $items ); // Set up the class variables, including current-classes
    $crumbs = array();

    echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper">';
    $crumbs[] = '
        <li class="breadcrumb-item">
            <a class="bread-link bread-home" href="' . get_home_url() . '" title="home">
                <svg class="icon"><use xlink:href="#icon-home"></use></svg>
            </a>
        </li>';

    foreach($items as $item) {
        if ($item->current_item_ancestor || $item->current) {
            $crumbs[] = "
                <li class=\"breadcrumb-item\">
                    <a class=\"bread-link bread-home\" href=\"{$item->url}\" title=\"{$item->title}\">
                        {$item->title}
                    </a>
                </li>";
        }
    }
    echo implode($separator, $crumbs);
    echo '</nav>';
}