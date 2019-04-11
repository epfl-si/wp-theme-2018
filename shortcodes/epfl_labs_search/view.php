<?php
    $predefined_tags = get_query_var('epfl_labs-predefined_tags');
?>

<?php get_template_part('shortcodes/epfl_labs_search/javascript'); ?>

<div class="container my-3">
    <div class="form-group">
        <form id="labs-search-form" action="#">
            <label for="labs-search-input">
            <?php
            if (empty($predefined_tags)) {
                _e('Search for a laboratory inside the EPFL constellation', 'epfl');
            } else {
                printf(__('Search laboratory inside <b>%s</b>', 'epfl'), implode(', ', $predefined_tags));
            }
            ?>
            </label>
            <input
                type="text"
                id="labs-search-input"
                class="form-control"
                placeholder="<?php _e('Type here a name, an url, a keyword', 'epfl') ?>"
                aria-describedby="labs-search-input-help"
            >
            <small id="labs-search-input-help" class="form-text text-muted">
                <?php _e('Laboratories are part of faculties and institutes, and have search domains.', 'epfl') ?>
            </small>
            <br />
            <button id="submitButton" type="button" class="btn"><?php _e('Search', 'epfl') ?></button>&nbsp;
            <span id="labs-search-loader" class="loader" style="display: none"></span>
        </form>
    </div>
    <table class="table" id="labs-search-results-table" style="display: none">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
