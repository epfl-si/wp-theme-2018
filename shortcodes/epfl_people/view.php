<?php
  require_once('utils.php');
  $persons = get_query_var('epfl_people_persons');
  # $nb_column can be 1, 3 or 'list'
  $nb_column = get_query_var('epfl_people_nb_columns');
?>
<div class="container my-3">
  <?php if ($nb_column === 'list'): ?>
  <div class="contact-list">
    <?php
      foreach($persons as $index => $person):
        $photo_url  = epfl_people_get_photo($person);
        $phones     = epfl_people_get_phones($person);
        $functions  = epfl_people_get_functions($person);
        $rooms      = epfl_people_get_rooms($person);
        $room_url   = epfl_people_get_room_url($rooms[0]);
        $people_url = epfl_people_get_people_url($person);
    ?>
    <div class="contact-list-row" itemscope itemtype="http://schema.org/Person">
        <div class="contact-list-avatar" itemprop="image">
        <?php if ($photo_url): ?>
          <picture>
            <img src="<?php echo esc_url($photo_url) ?>" style="width:1.9rem;" class="img-fluid rounded-circle" alt="<?php echo esc_attr($person->prenom) ?> <?php echo esc_attr($person->nom) ?>">
          </picture>
          <?php endif; ?>
        </div>
        <a href="<?php echo esc_url($people_url) ?>" class="contact-list-item" itemprop="name"><?php echo esc_attr($person->prenom) ?> <?php echo esc_attr($person->nom) ?></a>
        <p class="contact-list-item m-0 text-muted" itemprop="jobTitle"><?php echo esc_html($functions[0]) ?></p>
        <a class="contact-list-item text-muted" href="mailto:<?php echo esc_attr($person->email) ?>" itemprop="email"><?php echo esc_attr($person->email) ?></a>
        <a class="contact-list-item text-muted" href="tel:<?php echo esc_html($phones[0]) ?>" itemprop="telephone"><?php if ($phones[0]): ?>+41 21 69 <b><?php echo esc_html($phones[0]) ?></b><?php endif ?></a>
        <a class="contact-list-item text-muted" href="<?php echo esc_url($room_url) ?>" itemprop="workLocation"><?php echo esc_html($rooms[0]) ?></a>
    </div>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
    <?php if ($nb_column === '3'): ?>
    <div class="card-deck">
    <?php endif; ?>
    <?php
      foreach($persons as $index => $person):
        $photo_url  = epfl_people_get_photo($person);
        $phones     = epfl_people_get_phones($person);
        $functions  = epfl_people_get_functions($person);
        $rooms      = epfl_people_get_rooms($person);
        $room_url   = epfl_people_get_room_url($rooms[0]);
        $people_url = epfl_people_get_people_url($person);
    ?>
      <div class="card">
        <div class="card-body">
          <div class="my-3 align-items-center">
            <?php /* this inline style can be removed next time we apply a new Styleguide version */ ?>
            <img style="height:8rem;" class="img-fluid rounded-circle mb-2 person-card-avatar" src="<?php echo ($photo_url ? esc_url($photo_url) : bloginfo('template_url').'/assets/images/defaults/person-avatar-default-small.png') ?>" alt="<?php echo esc_attr($person->prenom) ?> <?php echo esc_attr($person->nom) ?>">
          </div>
          <h3><a class="link-pretty" href="<?php echo esc_url($people_url) ?>"><?php echo esc_html($person->prenom) ?> <?php echo esc_html($person->nom) ?></a></h3>
          <dl class="definition-list definition-list-grid mb-0">
            <?php if ($functions[0]): ?>
            <dt><?php esc_html_e('Position', 'epfl') ?></dt>
            <dd><?php echo esc_html($functions[0]) ?></dd>
            <?php endif; ?>
            <?php if ($rooms[0]): ?>
            <dt><?php esc_html_e('Office', 'epfl') ?></dt>
            <dd><a class="link-pretty" href="<?php echo esc_url($room_url) ?>"><?php echo esc_html($rooms[0]) ?></a></dd>
            <?php else: ?>
            <?php /* Quickfix until fixed in Styleguide */ ?>
            <dt></dt>
            <dd>&nbsp;</dd>
            <?php endif; ?>
          </dl>
          <div class="w-100 mt-2 mt-md-0">
              <?php if ($person->email): ?>
              <a class="btn btn-block btn-primary mb-2" href="mailto:<?php echo esc_attr($person->email) ?>"><?php echo esc_html($person->email) ?></a>
              <?php endif ?>
              <?php if ($phones[0]): ?>
              <a class="btn btn-block btn-secondary" href="tel:+412169<?php echo esc_html($phones[0]) ?>">+41 21 69 <?php echo esc_html($phones[0]) ?></a>
              <?php endif ?>
            </div>
        </div>
      </div>
        <?php if($index % $nb_column == 0): ?></div"><?php endif; ?>
      <?php endforeach; ?>
      <?php for($i=$index+1; $i % $nb_column != 0; $i++): ?>
      <div class="">
      </div>
      <?php endfor; ?>
    <?php if ($nb_column === '3'): ?>
    </div>
    <?php endif; ?>
  <?php endif; ?>
</div>
