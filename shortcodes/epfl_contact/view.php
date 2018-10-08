<?php
    $data = get_query_var('epfl_contact-data');
?>
<div class="container-full bg-gray-100 py-3 my-3">
  <div class="bg-white p-2 p-md-3">
    <div class="row">
      <div class="col-md-6">
        <h3>Contact</h3>
        <p><?php esc_html_e($data['introduction']) ?></p>

        <?php for ($i=1; $i < 5; $i++): ?>
          <?php if ($data['timetable'.$i]): ?>
        <div class="card card-body card-sm mb-2 flex-row flex-wrap justify-content-between justify-content-sm-start">
          <div class="mr-3 w-sm-50"><?php echo $data['timetable'.$i] ?: '' ?></div>
        </div>
        <?php
        endif;
        endfor;
        ?>
        <?php for ($i=1; $i < 4; $i++): ?>
          <?php if ($data['information'.$i]): ?>
        <p><?php echo wp_kses_post(urldecode($data['information'.$i])) ?: '' ?></p>
        <?php if ($data['information'.($i+1)]): ?>
        <hr>
        <?php endif; ?>
        <?php
        endif;
        endfor;
        ?>
      </div>
      <?php if ($data['map_query']): ?>
      <div class="col-md-6 d-flex flex-column">
        <?php echo do_shortcode( '[epfl_map lang="en" query="'. $data['map_query'] .'"]' ); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
