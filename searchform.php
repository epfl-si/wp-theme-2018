<div class="dropdown dropright search d-none d-xl-block">
    <form action="https://search.epfl.ch/" class="border-0 p-0">
        <div class="search-form mt-1 input-group">
            <label for="search" class="sr-only"><?php esc_html_e('Search in the EPFL web') ?></label>
            <input type="text" class="form-control" name="q" placeholder="<?php esc_html_e('Search') ?>" >
            <button type="submit" class="d-none d-xl-block btn btn-primary input-group-append" type="button"><?php esc_html_e('Validate') ?></button>
        </div>
    </form>
</div>

<form action="https://search.epfl.ch/" class="d-lg-none">
    <div class="input-group search-mobile" role="search">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg>
            </span>
        </div>
            <label for="search" class="sr-only"><?php esc_html_e('Search in the EPFL web') ?></label>
            <input type="text" class="form-control" name="q" placeholder="<?php esc_html_e('Search') ?>">
    </div>
</form>
