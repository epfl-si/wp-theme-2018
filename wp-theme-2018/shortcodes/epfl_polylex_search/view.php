<?php
    $lexes = get_query_var('epfl_lexes-list');
    $predefined_category = get_query_var('epfl_lexes-predefined_category');
    $predefined_subcategory = get_query_var('epfl_lexes-predefined_subcategory');
    $combo_list_contents = get_query_var('epfl_lexes-cat_with_sub_tree');

    $category_options = "";
    $category_options .= "<option";
    if (empty($predefined_category)) {
        $category_options .= " selected";
    }

    $category_options .= ' value="all">' . __('All categories', 'epfl') . '</option>';

    // Build category combo list
    foreach($combo_list_contents as $categ => $sub) {
        $category_options .= "<option";
        if (!empty($predefined_category) && strtoupper($categ) === strtoupper($predefined_category)) {
            $category_options .= " selected";
        }
        $category_options .= ">";
        $category_options .= $categ;
        $category_options .= "</option>";
    }

    // Build subcategory combo list
    $subcategory_options = "";
    $subcategory_options .= "<option";
    if (empty($predefined_category)) {
        $subcategory_options .= " selected";
    }

    $subcategory_options .= ' value="all">' . __('All subcategories', 'epfl') . '</option>';

    foreach($combo_list_contents as $categ => $subcategories) {
        foreach($subcategories as $sub) {
            $subcategory_options .= "<option";
            if (!empty($predefined_subcategory) && strtoupper($sub) === strtoupper($predefined_subcategory)) {
                $subcategory_options .= " selected";
            }
            $subcategory_options .= ">";
            $subcategory_options .= $sub;
            $subcategory_options .= "</option>";
        }
    }
    $predefined_subcategory = get_query_var('epfl_labs-predefined_subcategory');
    $predefined_search = get_query_var('epfl_lexes-predefined_search');
    $combo_list_content = get_query_var('eplf_lexes-combo_list_content');
?>

<div class="container my-3">
    <div id="lexes-list" class="d-flex flex-column">
        <div class="form-group">
            <input
                type="text"
                id="lexes-search-input"
                class="form-control search mb-2"
                placeholder="<?php _e('Search a number or a keyword', 'epfl') ?>"
                aria-describedby="lexes-search-input"
            >
            <div id="selects-filter" class="d-flex flex-wrap flex-column flex-md-row">
                <div>
                    <select
                        id="select-category"
                        class="epfl-lexes-select custom-select mr-2"
                    >
                        <?php echo $category_options; ?>
                    </select>
                </div>
                <div>
                    <select
                        id="select-subcategory"
                        class="epfl-lexes-select custom-select mr-2"
                    >
                        <?php echo $subcategory_options; ?>
                    </select>
                </div>
            </div>
        </div>
        <div id="sorting-header" class="flex-row d-md-flex pt-1 pb-1 border-bottom mb-2">
                <div class="sort col-1 pr-0 pl-1" data-sort="lex-number"><a href="#" onclick="return false;"><strong>Lex</strong></a></div>
                <div class="sort col-7" data-sort="lex-title"><a href="#" onclick="return false;"><strong><?php _e('Title', 'epfl') ?></strong></a></div>
                <div class="sort col-4" data-sort="lex-category-subcategory"><a href="#" onclick="return false;"><strong><?php _e('Category', 'epfl') ?></strong></a></div>
        </div>

        <div class="list">
        <?php if (!(empty($lexes))): ?>
            <?php foreach($lexes as $key => $lex): ?>
            <div class="lex-row mb-0 mt-0 pb-3 pt-3 border-bottom border-top align-items-center">
                <div class="lex-row-1 flex-row d-md-flex pt-1 pb-1 lex-numbered" data-lex-numbered="<?php echo esc_html($lex->lex); ?>">
                    <div class="lex-number col-1"><?php echo esc_html($lex->lex); ?></div>
                    <div class="col-7"><a class="lex-url" href="<?php echo esc_html($lex->url); ?>"><span class="lex-title"><strong><?php echo esc_html($lex->title); ?></strong></span></a></div>
                    <?php if (!(empty($lex->category))): ?>
                    <div class="lex-category-subcategory col-4" data-category-subcategory="<?php echo esc_html($lex->category) . esc_html($lex->subcategory); ?>">
                        <span class="lex-category"><?php echo esc_html($lex->category); ?></span><?php if (!(empty($lex->subcategory))): ?><?php echo ', ' ?><span class="lex-subcategory"><?php echo esc_html($lex->subcategory); ?></span><?php endif; ?></div>
                    <?php endif; ?>
                </div>
                <div class="lex-row-2 flex-row d-md-flex pt-2 pb-2">
                    <div class="col-1"></div>
                    <div class="col lex-description"><?php echo htmlspecialchars_decode(esc_html($lex->description)); ?></div>
                </div>
                <div class="lex-row-3 flex-row d-md-flex pt-1 pb-1">
                    <div class="col-1"></div>
                    <div class="lex-publicationDate col-4">
                        <?php if (esc_html($lex->effectiveDate)): ?>
                          <?php _e('Effective on', 'epfl') . ' ' ?>
                          <?php echo date("d.m.Y", strtotime(esc_html($lex->effectiveDate))); ?>
                        <?php endif; ?>
                    </div>
                    <div class="lex-revisionDate col-4">
                        <?php if (esc_html($lex->revisionDate)): ?>
                          <?php _e('Status as of', 'epfl') . ' ' ?>
                          <?php echo date("d.m.Y", strtotime(esc_html($lex->revisionDate))); ?>
                        <?php endif; ?>
                    </div>
                    <div class="lex-responsible col d-md-flex flex-row">
                        <a href="<?php echo esc_html($lex->responsible->url); ?>" target="_blank">
                            <?php echo esc_html($lex->responsible->firstName . ' ' . $lex->responsible->lastName); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php get_template_part('shortcodes/epfl_polylex_search/javascript'); ?>
