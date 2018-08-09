<?php 
/**
 * hide breadcrumbs on:
 *  - homepage
 *  - post listing page
 *  - page with no parent
 */
if (
  is_front_page()
  || is_home()
  || sizeof(get_post_ancestors($post->ID)) == 0
) {
    return;
  }
?>
<div class="breadcrumb-container">
  <!-- Browse  -->
  <div>
    <button id="nav-toggle" class="nav-toggle btn btn-secondary">
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-browse"></use>
      </svg>
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-close"></use>
      </svg>
      Browse
    </button>
  </div>
  <!-- end Browse -->

  <!-- Breadcrumb -->
  <?php generate_breadcrumb(); ?>
  <!-- end Breadcrumb -->
</div>