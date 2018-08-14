<!-- archives -->
<h3 class="h5 font-weight-normal mt-4"><?php echo esc_html__( 'Archives', 'epfl-shortcodes' ) ?></h3>
<?php 
  wp_get_archives([
    'type' => 'yearly',
    'show_post_count' => true,
    'format' => 'custom',
    'before' => '<hr class="my-1"/>',
    'echo' => true
  ]);  
?>
<!-- end archives -->