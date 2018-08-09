<?php

function renderBreadcrumbItem(
  $title ='default',
  $link = false,
  $active = false,
  $isHome = false) {
    $baseClass = 'breadcrumb-item';
    $activeClass = 'active';
    $activeAccessibility = 'aria-current="page"';
    $homeIcon = '<use xlink:href="#icon-home"></use></svg>';
    $homeClasses = 'd-xl-none';

    $computedClasses = $baseClass;
    $computedClasses .= $active ? ' '.$activeClass : '';
    $computedClasses .= $ishome ? ' '.$homeClasses : '';

    ob_start();

    if ($active) {

      echo '<li class="'.$baseClass.' '.$activeClass.'" '.$activeAccessibility.'>';
      echo $title;
      echo '</li>';

    } else if ($isHome) {

      echo '<li class="'.$baseClass.' '.$homeClasses.'" '.$activeAccessibility.'>';
      echo $homeIcon;
      echo '<a href="'.$link.'">';
      echo $title;
      echo '</a>';
      echo '</li>';
      

    } else {

      echo '<li class="'.$baseClass.'">';
      echo '<a href="'.$link.'">';
      echo $title;
      echo '</a>';
      echo '</li> ';

    }
    echo ob_get_clean();
}
