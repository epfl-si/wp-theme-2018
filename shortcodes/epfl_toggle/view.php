<?php  

  $data = get_query_var('epfl_toggle_data');
  $fields = array();

  foreach ($data as $key => $value) {
      
    $toggle_key = substr($key, -1);
    $field_name = substr($key, 0, -1);

    $fields[$toggle_key][$field_name] = $value;

  }
?>

<?php foreach ($fields as $key => $value) : ?>

  <?php 

  if (strlen($value['desc']) === 0 and strlen($value['label']) === 0) {  
    continue;
  }
  
  ?>

    <button
      class="collapse-title collapse-title-desktop collapsed"
      type="button"
      data-toggle="collapse"
      data-target="<?php echo '#collapse-' . $key ?>"
      aria-expanded="false"
      aria-controls="<?php echo '#collapse-' . $key ?>"
    >
    <?php echo $value['label']; ?>
  </button>

    <div class="collapse collapse-item collapse-item-desktop <?php if ($value['state'] === 'open'): ?> show <?php endif; ?> " id="<?php echo 'collapse' . '-' . $key ?>">
    <p>
    <?php echo urldecode($value['desc'])  ; ?>
    </p>
  </div>


<?php endforeach; ?>
