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
    <?php if ($data->speaker !== ''): ?>
        <?php esc_html_e('With', 'epfl');?>:
    <b><?php echo strip_tags($data->speaker) ?></b>
    <br>
    <?php endif ?>

    <?php if ($data->place_and_room !== ''): ?>
        <?php esc_html_e('Place and room', 'epfl');?>:
    <b><?php echo esc_html($data->place_and_room) ?></b>
    <br>
    <?php endif ?>
    
    <?php if (get_current_language() == 'fr' and $data->category->fr_label !== ''): ?>
        <?php echo esc_html__('Category', 'epfl') ?>: <b><?php echo esc_html($data->category->fr_label) ?></b>
    <?php elseif ($data->category->en_label !== ''): ?>
        <?php echo esc_html_e('Category', 'epfl') ?>: <b><?php echo esc_html($data->category->en_label) ?></b>
    <?php endif ?> 
</p>