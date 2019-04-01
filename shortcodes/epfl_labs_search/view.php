<?php
    $query = get_query_var('epfl_labs_search-query');
?>

<?php get_template_part('shortcodes/epfl_labs_search/javascript'); ?>

<div class="container my-3">
    <div class="form-group">
        <form id="labs-search-form" action="#">
            <label for="labs-search-input">Search for a specific laboratory inside the EPFL constellation</label>
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
            <button id="submitButton" type="button" class="btn">Submit</button>
        </form>
    </div>
</div>
