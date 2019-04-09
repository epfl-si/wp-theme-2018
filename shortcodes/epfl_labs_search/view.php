<?php
    $faculty = get_query_var('epfl_labs-faculty');
?>

<?php get_template_part('shortcodes/epfl_labs_search/javascript'); ?>

<div class="container my-3">
    <div class="form-group">
        <form id="labs-search-form" action="#">
            <label for="labs-search-input">Search for a specific laboratory inside the EPFL constellation
                <?php echo (!empty($faculty)) ? 'For the specific <b>' . $faculty . '</b> faculty': '' ?>
            </label>
            <input
                type="text"
                id="labs-search-input"
                class="form-control"
                placeholder="Type here a name, an url, a word..."
                aria-describedby="labs-search-input-help"
            >
            <small id="labs-search-input-help" class="form-text text-muted">
                Laboratories are part of faculties and institutes, and have a some named search domains.
            </small>
            <br />
            <button id="submitButton" type="button" class="btn">Submit</button>
        </form>
    </div>
    <table class="table" id="labs-search-results-table" style="display: none">
    <thead>
        <tr>
            <th></th>
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
