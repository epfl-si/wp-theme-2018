<?php
    $data = get_query_var('epfl_contact-data');
    $gray_wrapper = $data['gray_wrapper'];
?>

<div class="container <?php echo ($gray_wrapper) ? 'bg-gray-100 py-2 my-5' : 'my-3'; ?>">
  <?php if ($gray_wrapper): ?><div class="bg-white p-4 p-md-5"><?php endif; ?>
    <div class="row">
      <div class="col-md-6">
        <h3>Contact</h3>
        <p><?php esc_html_e($data['introduction']) ?></p>

        <?php for ($i=1; $i < 5; $i++): ?>
          <?php if ($data['timetable'.$i]): ?>
        <div class="card card-body card-sm mb-2 flex-row flex-wrap justify-content-between justify-content-sm-start">
          <div class="mr-3 w-sm-50"><?php echo $data['timetable'.$i] ?></div>
        </div>
        <?php
        endif;
        endfor;
        ?>
        <?php for ($i=1; $i < 4; $i++): ?>
          <?php if ($data['information'.$i]): ?>
        <p><?php echo urldecode($data['information'.$i]) ?: '' ?></p>
        <?php if ($data['information'.($i+1)]): ?>
        <hr>
        <?php endif; ?>
        <?php
        endif;
        endfor;
        ?>
      </div>
      <?php
      # bad quickfix that disallow INN011 as a place
      # because INN011 was a value in shortcake and not a placeholder
      # meaning some contact shortcode have this value but don't want to show a map
      if ($data['map_query'] && $data['map_query'] != 'INN011'):
      ?>
      <div class="col-md-6 d-flex flex-column">
        <?php echo do_shortcode( '[epfl_map lang="' .pll_current_language(). '" query="'. $data['map_query'] .'"]' ); ?>
      </div>
      <?php endif; ?>
    </div>
  <?php if ($gray_wrapper): ?></div><?php endif; ?>
</div>
