<script type='text/javascript'>
    jQuery(document).ready(function( $ ) {
        var options = {
            valueNames: [
                'site-title',
                'site-tagline',
                {name: 'site-url', attr: 'href'},
                {name: 'site-tags', attr: 'data-tags'}
            ],
            page: 500,
            indexAsync: true
        };

        var siteList = new List('sites-list', options);

        $('.epfl-labs-select').each(function (index, element) {
            $(element).change(function (e) {
                let filter_on = $(this).val();
                siteList.filter(function(item) {
                    console.log(item.values());
                    tags = item.values()['site-tags'].split(";");
                    return (tags.includes(filter_on));
                }
            );
            });
        });
    });
</script>
