<?php
  require_once(get_template_directory().'/shortcodes/epfl_memento/utils.php');
  require_once(get_template_directory().'/shortcodes/epfl_memento/data.php');

  $data         = get_query_var('epfl_memento_data');
  $template     = get_query_var('epfl_memento_template');
  $memento_name = get_query_var('epfl_memento_name');

  $memento_url = "https://memento.epfl.ch/" . $memento_name;
  
  $display_first_event = ('1' === $template or '3' === $template);
  $nb_events = count($data);
?>

<?php if ("1" === $template or "2" === $template): // TEMPLATE SLIDER ?> 

<div class="container-full overflow-hidden my-3 pl-5">
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

      // if event hasn't start date and end date then no display event
      if (is_null($event->start_date) and is_null($event->end_date)) {
        continue;
      }

      $is_first_event = ($count==1);
      $is_just_finished = is_just_finished($event->end_date, $event->end_time);
      $is_inscription_required = is_inscription_required($event->invitation);
?>

<?php if ($is_first_event and $display_first_event): ?>

<div class="card-slider-cell card-slider-cell-lg">
  <a href="<?php echo esc_url($event->event_url) ?>" class="card card-gray link-trapeze-horizontal">
    <div class="card-body">
      <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');  ?>
      <h3 class="card-title"><?php echo esc_html($event->title) ?></h3>
      <p><?php echo esc_html(trim_text(strip_tags($event->description), 225)) ?></p>
      <div class="card-info">
      <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
      </div>
    </div>
  </a>
</div>

<?php else: ?>

<!-- JUST FINISHED -->

  <?php if ($is_just_finished): ?>
    <div class="card-slider-cell">
      <a href="<?php echo esc_url($event->event_url) ?>" class="card card-gray card-grayscale link-trapeze-horizontal bg-gray-100">
        <div class="card-body">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');  ?>
          <h3 class="card-title"><span class="badge badge-dark badge-sm">Just finished</span>
            <?php echo esc_html($event->title) ?>
          </h3>
          <div class="card-info">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
          </div>
        </div>
      </a>
    </div>

  <!-- END JUST FINISHED -->

  <!-- LEARN MORE & APPLY -->
  <?php elseif ($is_inscription_required): ?>
    <div class="card-slider-cell">
      <div class="card card-gray">
        <div class="card-body">
          <a href="<?php echo esc_url($event->event_url) ?>" class="card-img-top">
            <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');  ?>
          </a>
          <h3 class="card-title">
            <a href="<?php echo esc_url($event->event_url) ?>"><?php echo esc_html($event->title) ?></a>
          </h3>
          <div class="card-info">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info'); ?>
          </div>
        </div>
        <div class="card-footer mt-auto">
          <a href="<?php echo esc_url($event->event_url) ?>" class="btn btn-primary btn-sm">
            <?php esc_html_e('Learn more & apply', 'epfl');?>
          </a>
        </div>
      </div>
    </div>
  <!-- END LEARN MORE & APPLY -->

  <?php else: ?>

    <div class="card-slider-cell">
      <a href="<?php echo esc_url($event->event_url) ?>" class="card card-gray link-trapeze-horizontal">
        <div class="card-body">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-img-top');?>
          <h3 class="card-title"><?php echo esc_html($event->title) ?></h3>
          <div class="card-info">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info');?>
          </div>
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

<?php elseif ("3" === $template): // TEMPLATE LISTING ?> 

<div class="container my-3">
  <div class="row align-items-center">
    <div class="col-md-6">
      <h2><?php echo esc_html_e('Next events', 'epfl') ?></h2>
    </div>
    <div class="col-md-6 text-right">
      <a href="<?php echo esc_url($memento_url); ?>"><?php echo esc_html_e('See all events', 'epfl') ?></a>
    </div>
  </div>
  <div class="row mt-2">

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
      $visual_url = substr($event->visual_url, 0, -11) . '448x448.jpg';

?>

<?php if ($is_first_event and $display_first_event): ?> 
  <div class="col-md-6">
    <a href="<?php echo esc_url($event->event_url) ?>" class="card card-gray link-trapeze-horizontal" itemscope itemtype="http://schema.org/Event">
      <div class="card-body">
        <picture class="card-img-top">
          <img src="<?php echo esc_url($visual_url) ?>" class="img-fluid" title="<?php echo esc_attr($event->image_description) ?>" alt="<?php echo esc_attr($event->image_description) ?>" />
        </picture>
        <h3 class="card-title" itemprop="name"><?php echo esc_html($event->title) ?></h3>
        <p><?php echo esc_html(trim_text(strip_tags($event->description), 225)) ?></p>
        <div class="card-info">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-6">
    <div class="list-group">

<?php else: ?>
    
      <a href="<?php echo esc_url($event->event_url) ?>" class="list-group-item list-group-item-gray list-group-teaser link-trapeze-vertical" itemscope itemtype="http://schema.org/Event">
      <div class="list-group-teaser-container">
        <div class="list-group-teaser-thumbnail">
          <picture>
            <img src="<?php echo esc_url($visual_url) ?>" class="img-fluid" alt="<?php echo esc_attr($event->image_description) ?>" title="<?php echo esc_attr($event->image_description) ?>">
          </picture>
        </div>
        <div class="list-group-teaser-content">
          <p class="h5 card-title" itemprop="name"><?php echo esc_html($event->title) ?></p>
          <div class="card-info mt-0">
          <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
          </div>
        </div>
      </div>
      </a>

  <?php endif ?>  

  <?php if ($count === $nb_events and $display_first_event): ?>
    </div>
  </div>
  <?php endif ?>  
 
  <?php
    $count++;
  }
  ?>

</div>
</div>
<?php elseif ("4" === $template): // TEMPLATE LISTING WITHOUT HIGHLIGHT ?>

<div class="list-group">
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
      $visual_url = substr($event->visual_url, 0, -11) . '448x448.jpg';

?>

  <a href="<?php echo esc_url($event->event_url) ?>" class="list-group-item list-group-item-gray list-group-teaser link-trapeze-vertical" itemscope itemtype="http://schema.org/Event">
    <div class="list-group-teaser-container">
      <div class="list-group-teaser-thumbnail">
        <picture>
          <img src="<?php echo esc_url($visual_url) ?>" class="img-fluid" alt="<?php echo esc_attr($event->image_description) ?>" title="<?php echo esc_attr($event->image_description) ?>">
        </picture>
      </div>
      <div class="list-group-teaser-content">
        <p class="h5 card-title" itemprop="name"><?php echo esc_html($event->title) ?></p>
        <div class="card-info mt-0">
        <?php get_template_part('shortcodes/epfl_memento/templates/card-info');  ?>
        </div>
      </div>
    </div>
  </a>
  <?php
    $count++;
  }
  ?>
</div>
<?php endif ?>