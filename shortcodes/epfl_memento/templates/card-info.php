<?php

require_once(get_template_directory().'/shortcodes/epfl_memento/data.php');
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
        <?php if ($data->place_and_room !== ''): ?>
            <?php if (get_locale() == 'fr_FR'): ?> 
            Lieu et salle:
            <?php else: ?> 
            Place and room: 
            <?php endif ?> 
        <?php endif ?> 
        <b><?php echo $data->place_and_room ?></b>
        <br>
        
        <?php if (get_locale() == 'fr_FR' && $data->category->fr_label !== ''): ?>
            Catégorie: <b><?php echo $data->category->fr_label ?></b>
        <?php else : ?>
            <?php if ($data->category->en_label !== ''): ?>
            Category: <b><?php echo $data->category->en_label ?></b>
            <?php endif ?> 
        <?php endif ?> 
    </p>
</div>