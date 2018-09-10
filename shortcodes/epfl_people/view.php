<?php
  $data = get_query_var('epfl_people_data');
?>

<?php 
  foreach($data->data as $d):
    foreach($d->persons as $p):

      $photo_url = "https://people.epfl.ch//private/common/photos/links/" . $p->sciper;

      // Check if photo url exist
      // FIXME: Add the photo URL in webservice
      $headers=get_headers($photo_url, 1);
      $is_photo = ($headers[0] === 'HTTP/1.1 200 OK');
     
      $room = $p->office[0]->room;
      $room_url = $p->office[0]->mapurl;
      // FIXME 
      $people_url = str_replace('https://https://', 'https://', $p->url);

?>
<div class="card">
  <div class="card-body">
    <div class="my-3 d-md-flex align-items-center">
      <?php if ($is_photo) : ?>
        <img style="width:100px;" class="img-fluid rounded-circle mr-4" src="<?php echo $photo_url; ?>" alt="<?php echo $p->firstname; ?> <?php echo $p->lastname; ?>">
      <?php endif; ?>
      <div class="w-100 mt-2 mt-md-0">
        <a class="btn btn-block btn-primary mb-2" href="mailto:<?php echo $p->mail; ?>"><?php echo $p->mail; ?></a>
        <a class="btn btn-block btn-secondary" href="tel:<?php echo $p->phone[0]; ?>"><?php echo $p->phone[0]; ?></a>
      </div>
    </div>
    <h3><a class="link-pretty" href="<?php echo $people_url; ?>"><?php echo $p->firstname; ?> <?php echo $p->lastname; ?></a></h3>
    <dl class="definition-list definition-list-grid mb-0">
      <dt>Fonction</dt>
      <dd>Journaliste, Secouriste</dd>
      <dt>Bureau</dt>
      <dd><a class="link-pretty" href="<?php echo $room_url ?>"><?php echo $room; ?></a></dd>
    </dl>
  </div>
</div>
<?php endforeach ?>
<?php endforeach ?>