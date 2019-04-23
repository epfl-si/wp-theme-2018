<?php
/**
 * A tags template for javascript
 * variable : site
 */
?>

for (j = 0; j < site['tags'].length; j++) {
    let tag = site['tags'][j];
    rendered += `<a href="${tag[url}" class="labs-search-site-tag-link">${tag[name]}</a>&nbsp;`;
}
