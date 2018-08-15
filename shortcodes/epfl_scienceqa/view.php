<?php
  $data = get_query_var('epfl_scienceqa_data');
  $url_form = '//qi.epfl.ch/' . $data->locale . '/question/show/' . esc_attr( $data->id ). '/';
?>
<div class="container-full">
  <div class="container">
    <div class="question">
      <div class="question-img">
        <picture>
          <img src="<?php echo $data->image ?>" class="img-fluid" alt="image">
        </picture>
      </div>
      <div class="question-content">
        <p class="h3"><?php echo $data->question ?></p>
        <form action="<?php echo $url_form ?>" method="POST">
        <div class="question-answers">
          
          <?php
            $count = 1; 
            foreach($data->answers as $answerId => $answer) { 
          ?>
            <input type="radio" id="custom-radio<?php echo $count ?>" value="<?php echo $answerId ?>" name="customRadio" class="custom-control-input">
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
        <button type="submit">
            <?php if (get_locale() == 'fr_FR'): ?>
              Votez
            <?php else: ?> 
              Vote
            <?php endif ?> 
          </button>
        </form>
      </div>
    </div>
  </div>
</div>