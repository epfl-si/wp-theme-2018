<?php
    $sites = get_query_var('epfl_labs-sites');
    $predefined_tags = get_query_var('epfl_labs-predefined_tags');
?>

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
    <?php if (!(empty($sites))): ?>
        <?php foreach($sites as $site): ?>
        <div class="row d-sm-flex pt-2 pb-2 border-bottom ">
            <div class="col-2"><b><?php echo $site->title; ?></b></div>
            <div class="col-5"><?php echo $site->tagline; ?></div>
            <div class="col-3"><a href="<?php echo $site->url; ?>"><?php echo $site->url; ?></a></div>
            <?php if (!(empty($site->tags))): ?>
            <div class="col-2 pt-1">
                <?php foreach($site->tags as $tag): ?>
                <a href="<?php echo $tag->url_fr; ?>" class="tag tag-primary"><?php echo $tag->name_fr; ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
