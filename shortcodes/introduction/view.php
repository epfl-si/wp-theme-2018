<?php
  $data = get_query_var('epfl_introduction_data');
  $gray = $data['gray'];
?>
  <div class="container-full">
    <div class="introduction<?php echo $gray ? ' bg-gray-100' : '' ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h2>
              <?php echo $data['title'] ?>
            </h2>
            <p>
              <?php echo $data['content'] ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
