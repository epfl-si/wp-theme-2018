<?php
/**
 * A tags template for javascript
 * variable : site
 */
?>

<?php
    $current_language = get_current_language();
    if ($current_language === 'fr') {
        echo "let name_field = 'name_fr';\n";
        echo "let url_field = 'url_fr';\n";
    } else {
        echo "let name_field = 'name_en';\n";
        echo "let url_field = 'url_en';\n";
    }
?>
    
for (index in site['tags']) {
    let tag = site['tags'][index];
    rendered += `<a href="${tag[url_field]}" class="labs-search-site-tag-link">${tag[name_field]}</a>&nbsp;`;
}
