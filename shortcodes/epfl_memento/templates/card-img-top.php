<?php

require_once(get_template_directory().'/shortcodes/epfl_memento/data.php');
$data = get_event();

//display nothing if no image available
if (!$data->visual_url) return '';
?>

<picture class="card-img-top">
    <img src="<?php echo $data->visual_url ?>" class="img-fluid" title="<?php echo $data->image_description ?>" alt="<?php echo $data->image_description ?>" />
</picture>