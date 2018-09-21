<?php  
  $title   = get_query_var('epfl_toggle_title');
  $state   = get_query_var('epfl_toggle_state');
  $content = get_query_var('epfl_toggle_content');
?>

<button
      class="collapse-title collapse-title-desktop collapsed"
      type="button"
      data-toggle="collapse"
      data-target="<?php echo esc_attr('#collapse-' . $title) ?>"
      aria-expanded="false"
      aria-controls="<?php echo esc_attr('#collapse-' . $title) ?>"
    >
    <?php echo esc_html($title) ?>
  </button>
  <div 
    class="collapse collapse-item collapse-item-desktop <?php if ($state === 'open'): ?> show <?php endif ?> " 
    id="<?php echo esc_attr('collapse-' . $title) ?>"
  >
    <p><?php echo wp_kses_post(do_shortcode( $content )) ?></p>
  </div>
