<?php
    $predefined_category = get_query_var('epfl_lexes-predefined_category');
    $predefined_subcategory = get_query_var('epfl_lexes-predefined_subcategory');
    $predefined_search = get_query_var('epfl_lexes-predefined_search');
    $cat_with_sub_tree = get_query_var('epfl_lexes-cat_with_sub_tree');
?>

<script type='text/javascript'>
window.onload = function() {  // wait that jQuery is loaded
    jQuery(document).ready(function( $ ) {
        var options = {
            valueNames: [
                'lex-number',
                'lex-title',
                {name: 'lex-category-subcategory', attr: 'data-category-subcategory'},
                'lex-category',
                'lex-subcategory',
                'lex-description',
            ]
        };

        var lexList = new List('lexes-list', options);

        $('#select-category').change(function (e) {
            let filter_on = $(this).val();
            // reset subcategory
            $('#select-subcategory').val('all');

            if (filter_on === 'all') {
                lexList.filter();
            } else {
                lexList.filter(function(item) {
                    category = item.values()['lex-category'];
                    return (category == filter_on);
                });
            }
        });

        $('#select-subcategory').change(function (e) {
            let filter_on = $(this).val();
            // reset category
            $('#select-category').val('all');

            if (filter_on === 'all') {
                lexList.filter();
            } else {
                lexList.filter(function(item) {
                    category = item.values()['lex-subcategory'];
                    return (category == filter_on);
                });
            }
        });

        <?php if (!empty($predefined_category) && empty($predefined_subcategory)): ?>
        $('#select-category').change();
        <?php endif;?>
        <?php if (!empty($predefined_subcategory)): ?>
        $('#select-subcategory').change();
        <?php endif;?>
        <?php if (!empty($predefined_search)): ?>
        $('#lexes-search-input').val("<?php echo $predefined_search ?>");
        lexList.search("<?php echo $predefined_search ?>");
        <?php endif;?>

        // sort at least one time, or it will need to be triggered two times to work
        lexList.sort('lex-number', { order: "asc" });
    });
}
</script>
