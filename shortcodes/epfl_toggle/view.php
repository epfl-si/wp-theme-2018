<?php  
  $data = get_query_var('epfl_toggle_data');
  
  foreach ($data as $key => $value) : 
    if (strlen($value['desc']) === 0 and strlen($value['label']) === 0) {  
      continue;
    }
?>
  <button
      class="collapse-title collapse-title-desktop collapsed"
      type="button"
      data-toggle="collapse"
      data-target="<?php echo esc_attr('#collapse-' . $key) ?>"
      aria-expanded="false"
      aria-controls="<?php echo esc_attr('#collapse-' . $key) ?>"
    >
    <?php echo esc_html($value['label']) ?>
  </button>
  <div 
    class="collapse collapse-item collapse-item-desktop <?php if ($value['state'] === 'open'): ?> show <?php endif ?> " 
    id="<?php echo esc_attr('collapse-' . $key) ?>"
  >
    <p><?php echo wp_kses_post(urldecode($value['desc'])) ?></p>
  </div>
<?php endforeach; ?>
