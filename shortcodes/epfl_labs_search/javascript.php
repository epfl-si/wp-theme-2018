<?php
    $predefined_tags = get_query_var('epfl_labs-predefined_tags');
?>

<script type='text/javascript'>
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

        $('#submitButton').click(function(){
            $("#labs-search-loader").show();
            let labs_search_text = $("#labs-search-input").val();

            $('#labs-search-results-table tbody').empty();

            $.ajax({
                url: ajaxUrl,
                type: 'get',
                dataType: 'json',
                data: {
                    _ajax_nonce: '<?php echo wp_create_nonce( 'epfl_labs_search' ); ?>',
                    action: 'labs_search_form',
                    <?php
                    error_log(var_export($predefined_tags, true));
                    if (!empty($predefined_tags)) {
                        echo "labs_search_predefined_tags: ";
                        echo json_encode($predefined_tags);
                        echo ",\n";
                    }
                    ?>
                    labs_search_text: labs_search_text
                },
                success: function(response) {
                    $("#labs-search-loader").hide();
                    if ('data' in response && response["data"].length > 0)
                    {
                        for (index in response["data"]) {
                            let site = response["data"][index];
                            <?php get_template_part('shortcodes/epfl_labs_search/templates/site'); ?>;
                            $('#labs-search-results-table tbody').append(rendered);
                        }

                        $('#labs-search-results-table').show();
                    } else {
                        $('#labs-search-results-table').hide();
                    }
                },
                error: function(data) {
                    $("#labs-search-loader").hide();
                    console.log("error");
                    console.log(data);
                }
            });
        });

        <?php if (!empty($predefined_tags)) {
            // run a search if we have predefined tags
            echo "$('#submitButton').click();";
        }
        ?>
    });
</script>
