<?php
/**
 * A site template for javascript
 * variable : lex
 */
?>

let one_row_template = `
    <tr>
        <td>${lex.title}</td>
        <td>${lex.tagline}</td>
        <td><a href="${lex.url}">${lex.url}</a></td>
        <td>
            `;

let rendered = one_row_template;

if ('tags' in lex) {
    <?php get_template_part('shortcodes/epfl_polylex_search/templates/tags'); ?>
}

let one_row_template_end = `
        </td>
    </tr>
`;

rendered += one_row_template_end;