<?php
  $data = get_query_var('epfl_collapsable_data');
  $id = uniqid();
  $skipNext = false;
?>

<?php foreach ($data as $key => $value) : ?>

  <?php 
  // if value is empty, skip this entry
  if ($skipNext) {
    $skipNext = false;
    continue;
  }

  if (strlen($value) === 0) {
    $skipNext = true;
    continue;
  }
  ?>

  <?php if (strpos($key, 'label') === 0) : ?>
    <button
    class="collapse-title collapse-title-desktop collapsed"
    type="button"
    data-toggle="collapse"
    data-target="#<?php echo $id.'-'.substr($key,5,1) ?>"
    aria-expanded="false"
    aria-controls="<?php echo $id.'-'.substr($key,5,1) ?>"
  >
    <?php echo $value; ?>
  </button>
  <?php else: ?>
    <div class="collapse collapse-item collapse-item-desktop" id="<?php echo $id.'-'.substr($key,4,1) ?>">
    <p>
      In The Sixth Sense, Bruce Willis is in fact a ghost. (I told you XD)
    </p>
  </div>
  <?php endif; ?>

<?php endforeach; ?>
