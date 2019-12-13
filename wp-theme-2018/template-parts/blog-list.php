<?php if (have_posts()) : ?>
  <div class="card-deck">
  <?php while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content', 'post-card' );
  endwhile; // End of the loop. ?>
  </div>
<?php else : ?>
  <h2>
    <?php esc_html_e( 'No article found', 'epfl' ) ?>
  </h2>
<?php endif; ?>