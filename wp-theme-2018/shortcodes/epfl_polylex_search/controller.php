<?php
/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/
add_action('epfl_lexes_search_action', 'renderLexSearch', 10, 4);

/**
 * render the shortcode, mainly a form and his table
 */
function renderLexSearch($lexes, $category, $subcategory, $search) {
  wp_enqueue_script( 'lib-listjs', get_template_directory_uri() . '/shortcodes/lib/list.min.js', ['jquery'], 1.5, false);
  wp_enqueue_style( 'epfl-polylex-search-css', get_template_directory_uri() . '/shortcodes/epfl_polylex_search/epfl-polylex-search.css',false,'1.1','all');

  polylex_filter_out_unused_language($lexes);

  $cat_with_sub = tree_categories_with_subcategories($lexes);

  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Polylex search');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_lexes-list', $lexes);
    set_query_var('epfl_lexes-predefined_category', $category);
    set_query_var('epfl_lexes-predefined_subcategory', $subcategory);
    set_query_var('epfl_lexes-predefined_search', $search);

    set_query_var('epfl_lexes-combo_list_contents', $cat_with_sub);
    get_template_part('shortcodes/epfl_polylex_search/view');
  }
}

function tree_categories_with_subcategories($lexes) {
  // build a parentship relation for javascript comboboxes
  $categ_with_sub = [];

  foreach ($lexes as $lex) {
    if (!isset($categ_with_sub[$lex->category])) {
      $categ_with_sub[$lex->category] = [];
    }

    if (!in_array($lex->subcategory, $categ_with_sub[$lex->category])) {
      $categ_with_sub[$lex->category][] = $lex->subcategory;
    }
  }

  return $categ_with_sub;
}

/**
 * Simplify the sites data by removing and renaming languages fields
 * As the client's browser will draw this results, we keep it the minimal possible
 */
function polylex_filter_out_unused_language($lexes) {
  $current_language = get_current_language();

  foreach ($lexes as $lex) {
    if ($current_language === 'fr') {
      $lex->title = $lex->titleFr;
      unset($lex->titleFr);
      unset($lex->titleEn);
      $lex->url = $lex->urlFr;
      unset($lex->urlFr);
      unset($lex->urlEn);
      $lex->description = $lex->descriptionFr;
      unset($lex->descriptionFr);
      unset($lex->descriptionEn);
    } else {
      $lex->title = $lex->titleEn;
      unset($lex->titleEn);
      unset($lex->titleFr);
      $lex->url = $lex->urlEn;
      unset($lex->urlEn);
      unset($lex->urlFr);
      $lex->description = $lex->descriptionEn;
      unset($lex->descriptionEn);
      unset($lex->descriptionFr);
    }

    foreach($lex->authors as $author) {
      if ($current_language === 'fr') {
        $author->url = $author->urlFr;
        unset($author->urlFr);
        unset($author->urlEn);
      } else {
        $author->url = $author->urlEn;
        unset($author->urlEn);
        unset($author->urlFr);
      }
    }
  }
}
