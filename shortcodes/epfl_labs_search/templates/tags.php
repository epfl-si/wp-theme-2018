<?php
/**
 * A tags template for javascript
 * variable : site
 */
?>

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
    rendered += `<a href="#" class="labs-search-site-tag-link">${tag[name_field]}</a>&nbsp;`;
}
rendered += `</div>`;