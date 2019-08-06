<?php
    $lexes = get_query_var('epfl_lexes-list');
    $predefined_category = get_query_var('epfl_lexes-predefined_category');
    $predefined_subcategory = get_query_var('epfl_labs-predefined_subcategory');
    $combo_list_content = get_query_var('eplf_lexes-combo_list_content');
?>

<div class="container my-3">
    <div id="lexes-list" class="d-flex flex-column">
        <div class="form-group">
            <input
                type="text"
                id="lexes-search-input"
                class="form-control search mb-2"
                placeholder="<?php _e('Type here a name, an url, a keyword, ...', 'epfl') ?>"
                aria-describedby="lexes-search-input-help"
            >
            <div id="selects-filter" class="d-flex flex-wrap flex-column flex-md-row">
                <?php foreach($combo_list_content as $type => $names): ?>
                <div>
                    <select
                        id="select-<?php echo esc_html($type); ?>"
                        class="epfl-lexes-select custom-select mr-2"
                    >
                        <option <?php echo (empty($predefined_faculty))?"selected":"";?> value="all">
                        <?php
                            switch ($type) {
                                case "faculty":
                                    _e('All faculties', 'epfl');
                                    break;
                                case "institute":
                                    _e('All institutes', 'epfl');
                                    break;
                                case "field-of-research":
                                    _e('All field of research', 'epfl');
                                    break;
                                default:
                                _e("All", 'epfl');
                            }
                        ?>
                        </option>
                    <?php foreach($names as $name): ?>
                        <option
                            <?php echo (!empty($predefined_category) && strtoupper($name) === strtoupper($predefined_category))?"selected":"";?>
                            <?php echo (!empty($predefined_subcategory) && strtoupper($name) === strtoupper($predefined_subcategory))?"selected":"";?>
                             value="<?php echo esc_html($name); ?>"><?php echo esc_html($name); ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="sorting-header" class="flex-row d-md-flex pt-1 pb-1 border-bottom align-items-center mb-2">
                <div class="sort col-2" data-sort="site-title"><a href="#" onclick="return false;"><?php _e('Acronym', 'epfl') ?></a></div>
                <div class="sort col-7" data-sort="site-tagline"><a href="#" onclick="return false;"><?php _e('Title', 'epfl') ?></a></div>
                <div class="sort col-2" data-sort="site-tags"><a href="#" onclick="return false;"><?php _e('Tags', 'epfl') ?></a></div>
        </div>
        <div class="list">

        <?php if (!(empty($lexes))): ?>
            <?php foreach($lexes as $key => $lex): ?>
            <div class="lex-row flex-row d-md-flex pt-1 pb-1 border-bottom align-items-center">
                <div class="lex-title col-2"><?php echo esc_html($lex->title); ?></div>
                <div class="col-7"><a class="lex-url" href="<?php echo esc_html($lex->url); ?>"><span class="lex-tagline"><?php echo esc_html($lex->tagline); ?></span></a></div>
                <?php if (!(empty($lex->tags))): ?>
                <div class="lex-tags col-2 pt-1 d-flex flex-row"
                    data-tags="<?php
                                foreach($lex->tags as $tag):
                                    echo esc_html($tag->name);
                                    if( $tag !== end($lex->tags) ) {
                                        echo ';';
                                    }
                                endforeach;
                                ?>">
                    <?php foreach($lex->tags as $tag): ?>
                    <a href="<?php echo esc_html($lex->url); ?>" class="tag tag-primary lex-tags-<?php echo esc_html($tag->type); ?>"><?php echo esc_html($tag->name); ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>

    </div>
</div>

<?php get_template_part('shortcodes/epfl_polylex_search/javascript'); ?>
