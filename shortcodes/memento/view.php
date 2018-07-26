<?php
  require_once(get_template_directory().'/shortcodes/memento/utils.php');
  require_once(get_template_directory().'/shortcodes/memento/data.php');
  $data = get_data();
  
  $display_first_event = false;
  $is_first_event = get_query_var('epfl_memento_is_first_event');
  $is_just_finished = is_just_finished($data->end_date, $data->end_time);
  $is_inscription_required = is_inscription_required($data->invitation);
?>

<?php if (true === $is_first_event && true === $display_first_event): ?>

<div class="card-slider-cell card-slider-cell-lg">
  <a href="<?php echo $data->event_url ?>" class="card card-gray link-trapeze-horizontal">
    <div class="card-body">
      <?php get_template_part('shortcodes/memento/templates/card-img-top');  ?>
      <h3 class="card-title"><?php echo $data->title ?></h3>
      <p><?php echo trim_text(strip_tags($data->description), 225) ?></p>
      <?php get_template_part('shortcodes/memento/templates/card-info');  ?>
    </div>
  </a>
</div>

<?php else: ?>

<!-- JUST FINISHED -->

  <?php if (true === $is_just_finished): ?>
    <div class="card-slider-cell">
      <a href="<?php echo $data->event_url ?>" class="card card-gray card-grayscale link-trapeze-horizontal bg-gray-100">
        <div class="card-body">
          <?php get_template_part('shortcodes/memento/templates/card-img-top');  ?>
          <h3 class="card-title"><span class="badge badge-dark badge-sm">Just finished</span>
            <?php echo $data->title ?>
          </h3>
          <?php get_template_part('shortcodes/memento/templates/card-info');  ?>
        </div>
      </a>
    </div>

  <!-- END JUST FINISHED -->

  <!-- LEARN MORE & APPLY -->
  <?php elseif (true === $is_inscription_required): ?>
    <div class="card-slider-cell">
      <div class="card card-gray">
        <div class="card-body">
          <a href="<?php echo $data->event_url ?>" class="card-img-top">
            <?php get_template_part('shortcodes/memento/templates/card-img-top');  ?>
          </a>
          <h3 class="card-title">
            <a href="<?php echo $data->event_url ?>"><?php echo $data->title ?></a>
          </h3>
          <?php get_template_part('shortcodes/memento/templates/card-info');  ?>
        </div>
        <div class="card-footer mt-auto">
          <a href="<?php echo $data->event_url ?>" class="btn btn-primary btn-sm">
            <?php if (get_locale() == 'fr_FR'): ?>
              Learn more & apply
            <?php else: ?> 
              Learn more & apply
            <?php endif ?>
          </a>
        </div>
      </div>
    </div>
  <!-- END LEARN MORE & APPLY -->

  <?php else: ?>
  
    <div class="card-slider-cell">
      <a href="<?php echo $data->event_url ?>" class="card card-gray link-trapeze-horizontal">
        <div class="card-body">
          <picture class="card-img-top">
            <img src="<?php echo $data->visual_url ?>" class="img-fluid" title="<?php echo $data->image_description ?>" alt="<?php echo $data->image_description ?>" />
          </picture>
          <h3 class="card-title"><?php echo $data->title ?></h3>
          <?php get_template_part('shortcodes/memento/templates/card-info');?>
        </div>
      </a>
    </div>
    
  <?php endif ?>
<?php endif ?>