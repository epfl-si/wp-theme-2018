<?php
    $sites = get_query_var('epfl_labs-sites');
    $predefined_tags = get_query_var('epfl_labs-predefined_tags');
    $combo_list_content = get_query_var('eplf_labs-combo_list_content');
?>

<div class="container my-3">
    <div id="sites-list" class="d-flex flex-column">
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
                placeholder="<?php _e('Type here a name, an url, a keyword, ...', 'epfl') ?>"
                aria-describedby="labs-search-input-help"
            >
            <big>overwrite search to not search on tags</big>
            <small id="labs-search-input-help" class="form-text text-muted">
                <?php _e('Laboratories are part of faculties and institutes, and have search domains.', 'epfl') ?>
            </small>

            <label>Filters</label>
            <?php foreach($combo_list_content as $type => $names): ?>
                <select
                    id="select-<?php echo esc_html($type); ?>"
                    class="epfl-labs-select custom-select"
                >
                    <option selected><?php echo esc_html($type); ?></option>
                <?php foreach($names as $name): ?>
                    <option value="<?php echo esc_html($name); ?>"><?php echo esc_html($name); ?></option>
                <?php endforeach; ?>
                </select>
            <?php endforeach; ?>
        </div>
        <div id="sorting-header" class="flex-row d-md-flex pt-1 pb-1 border-bottom align-items-center mb-2">
                <div class="sort col-2" data-sort="site-title"><a href="#">Acronym</a></div>
                <div class="sort col-7" data-sort="site-tagline"><a href="#">Title</a></div>
        </div>
        <div class="list">

        <?php if (!(empty($sites))): ?>
            <?php foreach($sites as $key => $site): ?>
            <div class="flex-row d-md-flex pt-1 pb-1 border-bottom align-items-center">
                <div class="site-title col-2"><?php echo esc_html($site->title); ?></div>
                <div class="site-tagline col-7"><a class="site-url" href="<?php echo esc_html($site->url); ?>"><?php echo esc_html($site->tagline); ?></a></div>
                <?php if (!(empty($site->tags))): ?>
                <div class="site-tags col-2 pt-1"
                    data-tags="<?php
                                foreach($site->tags as $tag):
                                    echo esc_html($tag->name);
                                    if( $tag !== end($site->tags) ) {
                                        echo ';';
                                    }
                                endforeach;
                                ?>">
                    <?php foreach($site->tags as $tag): ?>
                    <a href="<?php echo esc_html($tag->url); ?>" class="tag tag-primary site-tags-<?php echo esc_html($tag->type); ?>"><?php echo esc_html($tag->name); ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>

    </div>
</div>

<?php get_template_part('shortcodes/epfl_labs_search/javascript'); ?>
