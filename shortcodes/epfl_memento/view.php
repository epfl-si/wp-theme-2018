<?php
  require_once(get_template_directory().'/shortcodes/epfl_memento/utils.php');
  require_once(get_template_directory().'/shortcodes/epfl_memento/data.php');
  $data = get_query_var('epfl_memento_data');
  $template = get_query_var('epfl_memento_template');
  $display_first_event = ('1' === $template);
?>

<div class="container-full overflow-hidden">
  <div class="container">
    <div class="card-slider-wrapper">
      <div class="card-slider">

    <?php
    if (!(bool) $data) {
      echo '<div><h3>';
      esc_html_e('No scheduled events', 'epfl');
      echo '</h3></div>';
    }

    $count=1;
    foreach($data as $event) {
      set_query_var('epfl_event', $event);
      $is_first_event = ($count==1);
      $is_just_finished = is_just_finished($event->end_date, $event->end_time);
      $is_inscription_required = is_inscription_required($event->invitation);
?>

<?php if (true === $is_first_event && true === $display_first_event): ?>

<div class="card-slider-cell card-slider-cell-lg">
  <a href="<?php echo $event->event_url ?>" class="card card-gray link-trapeze-horizontal">
    <div class="card-body">
      <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');  ?>
      <h3 class="card-title"><?php echo $event->title ?></h3>
      <p><?php echo trim_text(strip_tags($event->description), 225) ?></p>
      <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
    </div>
  </a>
</div>

<?php else: ?>

<!-- JUST FINISHED -->

  <?php if (true === $is_just_finished): ?>
    <div class="card-slider-cell">
      <a href="<?php echo $event->event_url ?>" class="card card-gray card-grayscale link-trapeze-horizontal bg-gray-100">
        <div class="card-body">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');  ?>
          <h3 class="card-title"><span class="badge badge-dark badge-sm">Just finished</span>
            <?php echo $event->title ?>
          </h3>
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
        </div>
      </a>
    </div>

  <!-- END JUST FINISHED -->

  <!-- LEARN MORE & APPLY -->
  <?php elseif (true === $is_inscription_required): ?>
    <div class="card-slider-cell">
      <div class="card card-gray">
        <div class="card-body">
          <a href="<?php echo $event->event_url ?>" class="card-img-top">
            <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');  ?>
          </a>
          <h3 class="card-title">
            <a href="<?php echo $event->event_url ?>"><?php echo $event->title ?></a>
          </h3>
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
        </div>
        <div class="card-footer mt-auto">
          <a href="<?php echo $event->event_url ?>" class="btn btn-primary btn-sm">
            <?php esc_html_e('Learn more & apply', 'epfl');?>
          </a>
        </div>
      </div>
    </div>
  <!-- END LEARN MORE & APPLY -->

  <?php else: ?>

    <div class="card-slider-cell">
      <a href="<?php echo $event->event_url ?>" class="card card-gray link-trapeze-horizontal">
        <div class="card-body">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');?>
          <h3 class="card-title"><?php echo $event->title ?></h3>
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info');?>
        </div>
      </a>
    </div>

  <?php endif ?>
<?php endif ?>

<?php
$count++;

}
?>
    </div>
    <?php
    get_template_part('shortcodes/epfl_memento/templates/card-slider-footer');
    ?>
    </div>
  </div>
</div>
