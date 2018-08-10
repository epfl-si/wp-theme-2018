<!-- categories -->
<h3 class="h5 font-weight-normal"><?php echo esc_html__( 'Catégories', 'epfl-shortcodes' ) ?></h3>
<?php 
  $categories = get_categories();
    foreach($categories as $category) {
      echo '<a class="tag tag-sm tag-light mr-1" href="' . get_category_link($category->term_id) . '">' . $category->name . ' ('.$category->count.')</a>';
    }
?>
<!-- end categories -->