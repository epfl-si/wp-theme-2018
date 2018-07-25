<?php
  $data = get_query_var('epfl_memento_data');
  
  $title = $data->title ?: 'title';
  $slug = $data->slug ?: 'slug';
  $event_url = $data->event_url ?: 'event_url';
  $visual_url = $data->visual_url ?: 'https://via.placeholder.com/570x321.jpg';
  $lang = $data->lang ?: 'lang';
  $start_date = $data->start_date ?: 'start_date';
  $end_date = $data->end_date ?: 'end_date';
  $start_time = $data->start_time ?: 'start_time';
  $end_time = $data->end_time ?: 'end_time';
  $description = $data->description ?: 'description';
  $image_description = $data->image_description;
  $creation_date = $data->creation_date ?: 'creation_date';
  $last_modification_date = $data->last_modification_date ?: 'last_modification_date';
  $canceled = $data->canceled ?: 'canceled';
  $cancel_reason = $data->cancel_reason ?: 'cancel_reason';
  $place_and_room = $data->place_and_room ?: 'place_and_room';
  $url_place_and_room = $data->url_place_and_room ?: 'url_place_and_room';
  $speaker = $data->speaker ?: 'speaker';
  $organizer = $data->organizer ?: 'organizer';
  $contact = $data->contact ?: 'contact';
  $is_internal = $data->is_internal ?: 'is_internal';
  $theme = $data->theme ?: 'theme';
  $vulgarization = $data->vulgarization ?: 'vulgarization';
  $invitation = $data->invitation ?: 'invitation';
  $keywords = $data->keywords ?: 'keywords';
  $file = $data->file ?: 'file';
  $icalendar_url = $data->icalendar_url ?: 'icalendar_url';
  $category = $data->category ?: 'category';
?>
<div class="card-slider-cell">
  <a href="<?php echo $event_url ?>" class="card card-gray card-grayscale link-trapeze-horizontal bg-gray-100">
    <div class="card-body">
      <picture class="card-img-top">
        <img src="<?php echo $visual_url ?>" class="img-fluid" title="<?php echo $image_description ?>" alt="<?php echo $image_description ?>" />
      </picture>    
      <h3 class="card-title"><span class="badge badge-dark badge-sm">Just finished</span>
        <?php echo $title ?>
      </h3>
      <div class="card-info">
        <span class="card-info-date"><?php echo $start_data ?></span>
        <span><?php echo $start_time ?></span>
        <span><?php echo $end_time ?></span>
        <p>Lieu : <b><?php echo $place_and_room ?></b><br>Organisé par <b><?php echo $organizer ?></b><br></p>
      </div>
    </div>
  </a>
</div>