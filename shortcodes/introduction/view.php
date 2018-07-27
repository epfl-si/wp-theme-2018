<?php
  $data = get_query_var('epfl_introduction_data');
  $gray = $data->gray;
  var_dump($data);
?>
<div class="introduction">
  <div class="container<?php echo $gray ? ' bg-gray-100' : '' ?>">
    <div class="row">
      <div class="col-md-8 offset-md-2">
          <h2><?php echo $data->title ?></h2>
          <p><?php echo $data->content ?></p>
      </div>
    </div>
  </div>
</div>
