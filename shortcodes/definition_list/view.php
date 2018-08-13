<?php
  $data = get_query_var('epfl_definition_list_data');
  $skipNext = false;
  $tabledisplay = $data['tabledisplay'];
  $largedisplay = $data['largedisplay'];

  if($largedisplay) {
    echo '<div class="container-full"> <div class="container">';
  }
?>

<dl class="definition-list<?php echo $tabledisplay ? ' definition-list-grid' : ''?>">
  <?php foreach ($data as $key => $value) {
    // if definition is empty, skip this entry
    if ($skipNext) {
      $skipNext = false;
      continue;
    }

    if (strlen($value) === 0) {
      $skipNext = true;
      continue;
    }

    if (strpos($key, 'label') === 0) {
      echo '<dt>' . $value . '</dt>'; 
    } 
    else if (strpos($key, 'desc') === 0) {
      echo '<dd>' . $value . '</dd>'; 
    }

  } //foreach
  ?>
  </dl>

  <?php 
  // close large display tags
    if($largedisplay) {
    echo '</div></div>';
  }
  ?>