<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/
add_action('epfl_lexes_search_action', 'renderLexSearch', 10, 3);


/**
 * render the shortcode, mainly a form and his table
 */
function renderLexSearch($lexes, $category, $subcategory) {
  wp_enqueue_script( 'lib-listjs', get_template_directory_uri() . '/shortcodes/lib/list.min.js', ['jquery'], 1.5, false);
  wp_enqueue_style( 'epfl-polylex-search-css', get_template_directory_uri() . '/shortcodes/epfl_polylex_search/epfl-polylex-search.css',false,'1.1','all');

  polylex_filter_out_unused_language($lexes);

  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Polylex search');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_lexes-list', $lexes);
    set_query_var('epfl_lexes-predefined_category', $category);
    set_query_var('epfl_lexes-predefined_subcategory', $subcategory);

    set_query_var('eplf_lexes-combo_list_content', get_categories_and_sub($lexes));
    get_template_part('shortcodes/epfl_polylex_search/view');
  }
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
      $lex->publicationDate = $lex->publicationDateFr;
      unset($lex->publicationDateFr);
      unset($lex->publicationDateEn);
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
      $lex->publicationDate = $lex->publicationDateEn;
      unset($lex->publicationDateFr);
      unset($lex->publicationDateEn);
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

#TODO:
/**
* as tag have a type, get a list of everytype and everytag
* as a new dictionary tags['faculty'] => [tag1, tag2]
*/

function get_categories_and_sub($lexes) {
  $combo_content = [
    'category' => [],
    'subcategory' => []
  ];

  foreach ($lexes as $lex) {
    if (!in_array($lex->category, $combo_content['category'])) {
      $combo_content['category'][] = $lex->category;
    }

    if (!in_array($lex->subcategory, $combo_content['subcategory'])) {
      $combo_content['subcategory'][] = $lex->subcategory;
    }
  }
  return $combo_content;
}
/*
function separate_tags_by_type($sites) {
  $tags_typped = [
    'faculty' => [],
    'institute' => []
    #'field-of-research' => []

  ];

  $current_language = get_current_language();

  foreach ($sites as $site) {
    foreach ($site->tags as $tag) {
      if (!array_key_exists($tag->type, $tags_typped)) {
        continue;
      }

      if ($current_language === 'fr') {
        if (!in_array($tag->name_fr, $tags_typped[$tag->type])) {
          $tags_typped[$tag->type][] = $tag->name_fr;
        }
      } else {
        if (!in_array($tag->name_en, $tags_typped[$tag->type])) {
          $tags_typped[$tag->type][] = $tag->name_en;
        }
      }
    }
  }


  # sort everything
  foreach ($tags_typped as $key=>$tag_type) {
     sort($tags_typped[$key]);
  }

  return $tags_typped;
}
*/
