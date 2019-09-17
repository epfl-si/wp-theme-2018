<?php
/**
 * A tags template for javascript
 * variable : lex
 */
?>

for (j = 0; j < site['tags'].length; j++) {
    let tag = site['tags'][j];
    rendered += `<a href="${tag[url}" class="lexes-search-lex-tag-link">${tag[name]}</a>&nbsp;`;
}
