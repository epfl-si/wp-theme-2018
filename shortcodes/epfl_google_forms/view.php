<?php  
  $src     = get_query_var('epfl_google_forms_src');
  $width   = get_query_var('epfl_google_forms_width');
  $height  = get_query_var('epfl_google_forms_height');
?>

<div class="container my-3">
    <iframe src="<?php echo esc_url($src); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" frameborder="0" marginheight="0" marginwidth="0">
        <?php echo __("Loading...", "epfl");?>
    </iframe>
</div>
