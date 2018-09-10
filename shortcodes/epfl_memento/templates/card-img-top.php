<?php

require_once(get_template_directory().'/shortcodes/epfl_memento/data.php');
$data = get_event();

$visual_url = substr($data->visual_url, 0, -11) . '448x448.jpg';

//display nothing if no image available
if (!$data->visual_url) return '';
?>

<picture class="card-img-top">
    <img src="<?php echo $visual_url ?>" class="img-fluid" title="<?php echo $data->image_description ?>" alt="<?php echo $data->image_description ?>" />
</picture>