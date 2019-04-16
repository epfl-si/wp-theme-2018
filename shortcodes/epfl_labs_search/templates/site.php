<?php
/**
 * A site template for javascript
 * variable : site
 */
?>

let one_row_template = `
    <tr>
        <td>${site.title}</td>
        <td>${site.tagline}</td>
        <td><a href="${site.url}">${site.url}</a></td>
        <td>
            `;

let rendered = one_row_template;

if ('tags' in site) {
    <?php get_template_part('shortcodes/epfl_labs_search/templates/tags'); ?>
}

let one_row_template_end = `
        </td>
    </tr>
`;

rendered += one_row_template_end;