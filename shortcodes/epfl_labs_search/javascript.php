<script type='text/javascript' >
    jQuery(document).ready(function( $ ) {
        let ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
        
        /* set enter key as submit */
        $('#labs-search-form').each(function() {
            $(this).find('input').keypress(function(e) {
                // Enter pressed?
                if(e.which == 10 || e.which == 13) {
                    $('#submitButton').click();
                }
            });
        });

        function apply_search_on_tags() {
            $('#labs-search-results-table .labs-search-site-tag-link').each(function(index) {
                $(this).on("click", function() {
                    $('#labs-search-input').val($(this).text());
                    $('#submitButton').click();
                });
            });
        }

        $('#submitButton').click(function(){
            let labs_search_text = $("#labs-search-input").val();

            if (labs_search_text && labs_search_text !== "") {
                $('#labs-search-results-table tbody').empty();
                $('#labs-search-results-table').show();

                $.ajax({
                    url: ajaxUrl,
                    type: 'get',
                    dataType: 'json',
                    data: {
                        _ajax_nonce: '<?php echo wp_create_nonce( 'epfl_labs_search' ); ?>',
                        action: 'labs_search_form',
                        labs_search_text: labs_search_text
                    },
                    success: function(response) {
                        console.log("success");

                        for (index in response["data"]) {
                            let site = response["data"][index];
                            <?php get_template_part('shortcodes/epfl_labs_search/templates/site'); ?>;
                            $('#labs-search-results-table tbody').append(rendered);
                        }

                        apply_search_on_tags();
                    },
                    error: function(data) {
                        console.log("error");
                        console.log(data);
                    }
                });
            }
        });
    });
</script>
