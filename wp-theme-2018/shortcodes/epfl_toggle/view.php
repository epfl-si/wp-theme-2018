<?php  
  $title   = get_query_var('epfl_toggle_title');
  $state   = get_query_var('epfl_toggle_state');
  $content = get_query_var('epfl_toggle_content');

  $toggle_id = md5($content . rand());
?>

<button
      class="collapse-title collapse-title-desktop <?php if ($state === 'close'): ?> collapsed <?php endif ?>"
      type="button"
      data-toggle="collapse"
      data-target="<?php echo esc_attr('#collapse-' . $toggle_id) ?>"
      aria-expanded="false"
      aria-controls="<?php echo esc_attr('#collapse-' . $toggle_id) ?>"
    >
    <?php echo esc_html($title) ?>
  </button>
  <div 
    class="collapse collapse-item collapse-item-desktop <?php if ($state === 'open'): ?> show <?php endif ?> " 
    id="<?php echo esc_attr('collapse-' . $toggle_id) ?>"
  >
    <p><?php echo wp_kses_post(do_shortcode( $content )) ?></p>
  </div>
