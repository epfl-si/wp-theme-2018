<?php

require_once(get_template_directory().'/shortcodes/epfl_memento/data.php');
$data = get_event();

?>
<span class="card-info-date"><?php echo esc_html($data->start_date) ?></span>

<?php if ($data->start_date == $data->end_date): ?>

    <span><?php echo esc_html($data->start_time) ?></span>
    <span><?php echo esc_html($data->end_time) ?></span>
    
<?php else: ?>

    <span><?php echo esc_html($data->end_date) ?></span>

<?php endif ?>

<p>
    <?php if ($data->place_and_room !== ''): ?>
        <?php esc_html_e('Place and room', 'epfl');?>:
    <?php endif ?> 
    <b><?php echo esc_html($data->place_and_room) ?></b>
    <br>
    
    <?php if (get_locale() == 'fr_FR' && $data->category->fr_label !== ''): ?>
        Catégorie: <b><?php echo esc_html($data->category->fr_label) ?></b>
    <?php else : ?>
        <?php if ($data->category->en_label !== ''): ?>
        Category: <b><?php echo esc_html($data->category->en_label) ?></b>
        <?php endif ?> 
    <?php endif ?> 
</p>