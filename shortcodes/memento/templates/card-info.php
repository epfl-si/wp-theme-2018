<?php

require_once(get_template_directory().'/shortcodes/memento/data.php');
$data = get_data();

?>
<div class="card-info">
    <span class="card-info-date"><?php echo $data->start_date ?></span>

    <?php if ($data->start_date == $data->end_date): ?>
    
        <span><?php echo $data->start_time ?></span>
        <span><?php echo $data->end_time ?></span>
        
    <?php else: ?>
    
        <span><?php echo $data->end_date ?></span>

    <?php endif ?>
    
    <p>
        <?php if (get_locale() == 'fr_FR'): ?> 
            Lieu :
        <?php else: ?> 
            Place : 
        <?php endif ?> 
        <b><?php echo $data->place_and_room ?></b>
        <br>
        <?php if (get_locale() == 'fr_FR'): ?>
        Organisé par 
        <?php else: ?>
        Organized by 
        <?php endif ?> 
        <b><?php echo $data->organizer ?></b><br>
    </p>
</div>