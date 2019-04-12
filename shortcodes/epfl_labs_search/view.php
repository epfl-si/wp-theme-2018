<?php
    $sites = get_query_var('epfl_labs-sites');
    $predefined_tags = get_query_var('epfl_labs-predefined_tags');
    $current_language = get_current_language();
?>

<div class="container my-3">
    <div id="sites-list" class="d-flex flex-column">
    <?php if (!(empty($sites))): ?>
        <div class="form-group">
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
                class="form-control search"
                placeholder="<?php _e('Type here a name, an url, a keyword', 'epfl') ?>"
                aria-describedby="labs-search-input-help"
            >
            <small id="labs-search-input-help" class="form-text text-muted">
                <?php _e('Laboratories are part of faculties and institutes, and have search domains.', 'epfl') ?>
            </small>
        </div>
        <div id="sorting-header" class="flex-row d-md-flex pt-1 pb-1 border-bottom align-items-center mb-2">
                <div class="sort col-2" data-sort="site-title"><a href="#">Acronym</a></div>
                <div class="sort col-7" data-sort="site-tagline"><a href="#">Title</a></div>
        </div>
        <div class="list">
            <?php foreach($sites as $key => $site): ?>
            <div class="flex-row d-md-flex pt-1 pb-1 border-bottom align-items-center">
                <div class="site-title col-2"><?php echo esc_html($site->title); ?></div>
                <div class="site-tagline col-7"><a href="<?php echo esc_html($site->url); ?>"><?php echo esc_html($site->tagline); ?></a></div>
                <?php if (!(empty($site->tags))): ?>
                <div class="site-tags col-2 pt-1">
                    <?php foreach($site->tags as $tag): ?>
                        <?php if ($current_language === 'fr'): ?>
                    <a href="<?php echo esc_html($tag->url_fr); ?>" class="tag tag-primary site-tags-<?php echo esc_html($tag->type); ?>"><?php echo esc_html($tag->name_fr); ?></a>
                        <?php else: ?>
                    <a href="<?php echo esc_html($tag->url_en); ?>" class="tag tag-primary site-tags-<?php echo esc_html($tag->type); ?>"><?php echo esc_html($tag->name_en); ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php get_template_part('shortcodes/epfl_labs_search/javascript'); ?>
