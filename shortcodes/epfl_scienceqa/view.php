<?php

  $data = get_query_var('epfl_scienceqa_data'); 
  
?>
<div class="question">
  <div class="question-img">
    <picture>
      <img src="<?php echo $data->image ?>" class="img-fluid" alt="image">
    </picture>
  </div>
  <div class="question-content">
    <p class="h3"><?php echo $data->question ?></p>
    <div class="question-answers">
      <?php
        $count = 1; 
        foreach($data->answers as $answer) { 
      ?>
        <input type="radio" id="custom-radio<?php echo $count ?>" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="custom-radio<?php echo $count ?>">
          <span class="custom-control-label-content">
            <?php echo $answer ?></span>
          <span class="trapeze-horizontal d-none d-lg-block"></span>
          <span class="trapeze-vertical d-lg-none"></span>
        </label>
      <?php 
          $count++;
        } 
      ?>
    </div>
  </div>
</div>