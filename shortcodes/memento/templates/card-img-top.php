<?php

require_once(get_template_directory().'/shortcodes/memento/data.php');
$data = get_data();

?>
<picture class="card-img-top">
    <img src="<?php echo $data->visual_url ?>" class="img-fluid" title="<?php echo $data->image_description ?>" alt="<?php echo $data->image_description ?>" />
</picture>  