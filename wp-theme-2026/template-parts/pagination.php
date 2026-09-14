<?php

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 ) return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 ) $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

?>

<nav aria-label="Page navigation" class="py-2">
  <ul class="pagination justify-content-end">

  <?php if ( get_previous_posts_link() ): ?>
    <li class="page-item">
      <a class="page-link" href="<?php echo get_previous_posts_page_link(); ?>" aria-label="Go to previous page">
        <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-left"></use></svg>
      </a>
    </li>
  <?php endif; ?>

  <?php if ( ! in_array( 1, $links ) ): ?>
    <li class="page-item <?php echo 1 == $paged ? 'active' : ''; ?>">
      <a class="page-link" href="<?php echo esc_url( get_pagenum_link( 1 )); ?>" <?php echo 1 == $paged ? 'aria-current="page"' : ''; ?>>
        1
        <?php if ( 1 == $paged): ?>
          <span class="sr-only">(Current page)</span>
        <?php endif; ?>
      </a>
    </li>
    <?php if (! in_array( 2, $links )): ?>
      <li role="separator" class="page-item disabled">
        <span class="page-link">…</span>
      </li>
    <?php endif; ?>
  <?php endif; ?>

  <?php sort( $links ); ?>

  <?php foreach ( (array) $links as $link ): ?>
    <li class="page-item <?php echo $paged == $link ? 'active'  : ''; ?>">
      <a class="page-link" href="<?php echo esc_url( get_pagenum_link( $link )); ?>" <?php echo $paged == $link ? 'aria-current="page"' : ''; ?>>
        <?php echo $link; ?>
        <?php if ( $paged !== $link ): ?>
          <span class="sr-only">(Current page)</span>
        <?php endif; ?>
      </a>
    </li>
  <?php endforeach; ?>

  <?php if ( ! in_array( $max, $links ) ): ?>
    <?php if ( ! in_array( $max - 1, $links ) ): ?>
      <li role="separator" class="page-item disabled">
        <span class="page-link">…</span>
      </li>
    <?php endif; ?>
    <li class="page-item <?php echo $max == $paged ? 'active' : ''; ?>">
      <a class="page-link" href="<?php echo esc_url( get_pagenum_link( $max )); ?>" <?php echo $max == $paged ? 'aria-current="page"' : ''; ?>>
        <?php echo $max; ?>
        <?php if ( $max !== $paged ): ?>
          <span class="sr-only">(Current page)</span>
        <?php endif; ?>
      </a>
    </li>
  <?php endif; ?>

  <?php if ( get_next_posts_link() ): ?>
    <li class="page-item">
      <a class="page-link" href="<?php echo get_next_posts_page_link(); ?>" aria-label="Go to next page">
        <svg class="icon" aria-hidden="true"><use xlink:href="#icon-chevron-right"></use></svg>
      </a>
    </li>
  <?php endif; ?>

  </ul>
</nav>
