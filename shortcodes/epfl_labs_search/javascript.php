<script type='text/javascript' >
    jQuery(document).ready(function( $ ) {
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";

        $('#submitButton').click(function(){
            var labs_search_text = $("#labs-search-input").val();

            $.ajax({
                url: ajaxUrl,
                type: 'get',
                dataType: 'json',
                data: {
                    _ajax_nonce: '<?php echo wp_create_nonce( 'epfl_labs_search' ); ?>',
                    action: 'labs_search_form',
                    labs_search_text: labs_search_text
                },
                success: function(data) {
                    console.log("success");
                    console.log(data); //should print out the name since you sent it along
                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                }
            });
        });
    });
</script>
