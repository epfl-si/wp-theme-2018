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
                'lex-description',
            ]
        };

        var lexList = new List('lexes-list', options);

        $('.epfl-lexes-select').each(function (index, element) {
            $(element).change(function (e) {
                let filter_on = $(this).val();

                // reset other elements
                $('.epfl-lexes-select').not(this).each(function (index, element) {
                    $(element).val('all');
                });

                if ($(this).val() === 'all') {
                    lexList.filter();
                } else {
                    lexList.filter(function(item) {
                        tags = item.values()['site-tags'].split(";");
                        return (tags.includes(filter_on));
                    });
                }
            });
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
