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
                placeholder="<?php _e('Type here a a number or a keyword', 'epfl') ?>"
                aria-describedby="lexes-search-input-help"
            >
            <div id="selects-filter" class="d-flex flex-wrap flex-column flex-md-row">
                <?php foreach($combo_list_content as $type => $names): ?>
                <div>
                    <select
                        id="select-<?php echo esc_html($type); ?>"
                        class="epfl-lexes-select custom-select mr-2"
                    >
                        <option <?php echo (empty($predefined_category))?"selected":"";?> value="all">
                        <?php
                            switch ($type) {
                                case "category":
                                    _e('All categories', 'epfl');
                                    break;
                                case "subcategory":
                                    _e('All subcategories', 'epfl');
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
                <div class="sort col-1" data-sort="lex-number"><a href="#" onclick="return false;"><strong><?php _e('Number', 'epfl') ?></strong></a></div>
                <div class="sort col-7" data-sort="lex-title"><a href="#" onclick="return false;"><strong><?php _e('Title', 'epfl') ?></strong></a></div>
                <div class="sort col-4" data-sort="lex-category-subcategory"><a href="#" onclick="return false;"><strong><?php _e('Category', 'epfl') ?></strong></a></div>
        </div>

        <div class="lex-list">
        <?php if (!(empty($lexes))): ?>
            <?php foreach($lexes as $key => $lex): ?>
            <div class="lex-row mb-0 mt-0 pb-3 pt-3 border-bottom border-top align-items-center">
                <div class="lex-row-1 flex-row d-md-flex pt-1 pb-1">
                    <div class="lex-number col-1"><?php echo esc_html($lex->lex); ?></div>
                    <div class="col-7"><a class="lex-url" href="<?php echo esc_html($lex->url); ?>"><span class="lex-title"><strong><?php echo esc_html($lex->title); ?></strong></span></a></div>
                    <?php if (!(empty($lex->category))): ?>
                    <div class="lex-category-subcategory col-4 " data-category-subcategory="<?php echo esc_html($lex->category) . esc_html($lex->subcategory); ?>"><?php echo esc_html($lex->category); ?><?php if (!(empty($lex->subcategory))): ?><?php echo ', ' . esc_html($lex->subcategory); ?><?php endif; ?></div>
                    <?php endif; ?>
                </div>
                <div class="lex-row-2 flex-row d-md-flex pt-2 pb-2">
                <div class="col-1"></div>
                    <div class="col"><em><?php echo esc_html($lex->description); ?></em></div>
                </div>
                <div class="lex-row-3 flex-row d-md-flex pt-1 pb-1">
                <div class="col-1"></div>
                    <div class="lex-publicationDate col-4"><?php echo esc_html($lex->publicationDate); ?></div>
                    <?php if (!(empty($lex->authors))): ?>
                    <div class="lex-authors col d-md-flex flex-row">
                        <?php foreach($lex->authors as $index => $author): ?>
                        <div class="mr-2">
                        <a href="<?php echo esc_html($author->url); ?>" class="author lex-author"><?php echo esc_html($author->firstName) .'&nbsp;'. esc_html($author->lastName) ; ?></a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php get_template_part('shortcodes/epfl_polylex_search/javascript'); ?>
