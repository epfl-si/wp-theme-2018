<?php
    $predefined_faculty = get_query_var('epfl_labs-predefined_faculty');
    $predefined_institute = get_query_var('epfl_labs-predefined_institute');
?>

<script type='text/javascript'>
window.onload = function() {  // wait that jQuery is loaded
    jQuery(document).ready(function( $ ) {
        var options = {
            valueNames: [
                'site-title',
                'site-tagline',
                {name: 'site-url', attr: 'href'},
                {name: 'site-tags', attr: 'data-tags'}
            ]
        };

        var siteList = new List('sites-list', options);

        $('.epfl-labs-select').each(function (index, element) {
            $(element).change(function (e) {
                let filter_on = $(this).val();

                // reset other elements
                $('.epfl-labs-select').not(this).each(function (index, element) {
                    $(element).val('all');
                });

                if ($(this).val() === 'all') {
                    siteList.filter();
                } else {
                    siteList.filter(function(item) {
                        tags = item.values()['site-tags'].split(";");
                        return (tags.includes(filter_on));
                    });
                }
            });
        });

        <?php if (!empty($predefined_faculty) && empty($predefined_institute)): ?>
        $('#select-faculty').change();
        <?php endif;?>
        <?php if (!empty($predefined_institute)): ?>
        $('#select-institute').change();
        <?php endif;?>
    });
}
</script>
