<aside>
  <div class="d-flex justify-content-between px-3 p-md-0 align-baseline">
    <h3 class="h5 mb-0 font-weight-normal">Filtrer les articles</h3>
    <button
      class="btn btn-sm btn-secondary d-lg-none collapsed collapse-drop-toggle"
      type="button"
      data-toggle="collapse"
      data-target="#form-filters"
      aria-expanded="false"
      aria-controls="form-filters"
    >
      Filtres
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-triangle"></use>
      </svg>
    </button>
  </div>
  <div class="collapse collapse-lg-show collapse-drop" id="form-filters">
    <form class="p-3 p-lg-0 mt-md-3">
      
      <div class="form-group">
        <div class="form-group">
          <label>Catégories</label>
          <?php
            $args = array(
              'show_option_none' => __( 'Select a category', 'epfl' ),
              'show_count' => 1,
              'orderby' => 'name',
              'class' => 'custom-select'
            );
            wp_dropdown_categories( $args );
          ?>
        </div>
      </div>
      
      <div class="form-group">
        <div class="form-group">
          <label>Archives</label>
          <select class="custom-select">
            <option selected><?php _e( 'Select a year', 'epfl' ); ?></option>
            <?php 
              $args = array(
                  'type' => 'yearly',
                  'format' => 'option',
                  'show_post_count' => 1,
                  'order' => 'DESC'
              );
              wp_get_archives( $args );
            ?>
          </select>
        </div>
      </div>
      
    </form>
  </div>
</aside>
