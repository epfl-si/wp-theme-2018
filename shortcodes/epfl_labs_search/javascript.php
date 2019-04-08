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

        $('#submitButton').click(function(){
            let labs_search_text = $("#labs-search-input").val();

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
                        let one_row_template = `
                            <tr>
                                <td>${site.title}</td>
                                <td><a href="${site.url}">${site.tagline}</a></td>
                                <td>
                                    `;
                        let one_row_template_end = `
                                </td>
                            </tr>
                        `;

                        let rendered = one_row_template;
                        console.log(site);

                        if ('tags' in site) {
                            <?php
                                $current_language = get_current_language();
                                if ($current_language === 'fr') {
                                    echo "let name_field = 'name_fr';";
                                    echo "let url_field = 'url_fr';";
                                } else {
                                    echo "let name_field = 'name_en';";
                                    echo "let url_field = 'url_en';";
                                }
                            ?>
                            
                            rendered += `<div class="row">`;
                            for (index in site['tags']) {
                                let tag = site['tags'][index];
                                rendered += `<a href="${tag[url_field]}">${tag[name_field]}</a>&nbsp;`;
                            }
                            rendered += `</div>`;
                        }

                        rendered += one_row_template_end;
                        $('#labs-search-results-table tbody').append(rendered);
                    }
                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                }
            });
        });
    });
</script>
