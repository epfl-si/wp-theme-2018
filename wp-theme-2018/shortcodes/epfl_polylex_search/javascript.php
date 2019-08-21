<?php
    $predefined_category = get_query_var('epfl_labs-predefined_category');
    $predefined_subcategory = get_query_var('epfl_labs-predefined_subcategory');
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
    });
}
</script>
