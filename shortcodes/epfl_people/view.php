<?php
  require_once('utils.php');
  $persons = get_query_var('epfl_people_persons');
?>

<?php 
  foreach($persons as $person):
    $photo_url  = epfl_people_get_photo($person);
    $phones     = epfl_people_get_phones($person);
    $functions  = epfl_people_get_functions($person);
    $rooms      = epfl_people_get_rooms($person);
    $room_url   = epfl_people_get_room_url($rooms[0]);
    $people_url = epfl_people_get_people_url($person);
?>
<div class="card">
  <div class="card-body">
    <div class="my-3 d-md-flex align-items-center">
      <?php if ($photo_url): ?>
        <img style="width:100px;" class="img-fluid rounded-circle mr-4" src="<?php echo esc_url($photo_url) ?>" alt="<?php echo esc_attr($person->prenom) ?> <?php echo esc_attr($person->nom) ?>">
      <?php endif; ?>
      <div class="w-100 mt-2 mt-md-0">
        <?php if ($person->email): ?>
        <a class="btn btn-block btn-primary mb-2" href="mailto:<?php echo esc_attr($person->email) ?>"><?php echo esc_html($person->email) ?></a>
        <?php endif ?> 
        <?php if ($phones[0]): ?>
        <a class="btn btn-block btn-secondary" href="tel:<?php echo esc_html($phones[0]) ?>"><?php echo esc_html($phones[0]) ?></a>
        <?php endif ?>
      </div>
    </div>
    <h3><a class="link-pretty" href="<?php echo esc_url($people_url) ?>"><?php echo esc_html($person->prenom) ?> <?php echo esc_html($person->nom) ?></a></h3>
    <dl class="definition-list definition-list-grid mb-0">
      <dt>Fonction</dt>
      <dd><?php echo esc_html($functions[0]) ?></dd>
      <dt>Bureau</dt>
      <dd><a class="link-pretty" href="<?php echo esc_url($room_url) ?>"><?php echo esc_html($rooms[0]) ?></a></dd>
    </dl>
  </div>
</div>

<?php endforeach ?>