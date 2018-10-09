<?php
  $title = get_query_var( 'epfl_placeholder_title', 'no title given' )
?>
<script type="text/css"></script>
<div class="placeholder">
  <div class="content">
    <h5>&#60;Shortcode&#62;</h5>
    <h3><?php echo __($title, 'epfl') ?></h3>
  </div>
</div>
