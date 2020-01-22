<?php if (have_posts()) : ?>
  <div class="card-deck">
  <?php
  // assert we always finish in a full row
  $post_idx = 0;

  while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/content', 'post-card' );
    $post_idx += 1;
  endwhile;

  // fullfil the row if we have at least one full
  if ( $post_idx > 3 ) {
    while ( $post_idx % 3 != 0 ) {
      echo "<div></div>";
      $post_idx += 1;
    }
  }

  ?>
  </div>
<?php else : ?>
  <h2>
    <?php esc_html_e( 'No article found', 'epfl' ) ?>
  </h2>
<?php endif; ?>
