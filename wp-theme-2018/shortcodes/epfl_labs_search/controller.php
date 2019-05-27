<?php

/**
 * 3rd argument is the priority, higher means executed first
 * 4rth argument is number of arguments the function can accept
 **/
add_action('epfl_labs_search_action', 'renderLabsSearch', 10, 3);


/**
 * render the shortcode, mainly a form and his table
 */
function renderLabsSearch($sites, $faculty, $institute) {
  wp_enqueue_script( 'epfl-labs-search-listjs', get_template_directory_uri() . '/shortcodes/epfl_labs_search/lib/list.min.js', ['jquery'], 1.5, false);
  wp_enqueue_style( 'epfl-labs-search-css', get_template_directory_uri() . '/shortcodes/epfl_labs_search/epfl-labs-search.css',false,'1.1','all');

  filter_out_unused_language($sites);

  if (is_admin()) {
    // render placeholder for backend editor
    set_query_var('epfl_placeholder_title', 'Laboratories search');
    get_template_part('shortcodes/placeholder');
  } else {
    set_query_var('epfl_labs-sites', $sites);
    set_query_var('epfl_labs-predefined_faculty', $faculty);
    set_query_var('epfl_labs-predefined_institute', $institute);
    set_query_var('eplf_labs-combo_list_content', separate_tags_by_type($sites));
    get_template_part('shortcodes/epfl_labs_search/view');
  }
}


/**
 * Simplify the sites data by removing and renaming languages fields
 */
function filter_out_unused_language($sites) {
  $current_language = get_current_language();

  foreach ($sites as $site) {
    foreach ($site->tags as $tag) {
      if ($current_language === 'fr') {
        $tag->name = $tag->name_fr;
        $tag->url = $tag->url_fr;
        unset($tag->name_en);
        unset($tag->url_en);
      } else {
        $tag->name = $tag->name_en;
        $tag->url = $tag->url_en;
        unset($tag->name_fr);
        unset($tag->url_fr);
      }
    }
  }
}


/**
* as tag have a type, get a list of everytype and everytag
* as a new dictionary tags['faculty'] => [tag1, tag2]
*/
function separate_tags_by_type($sites) {
  $tags_typped = [
    'faculty' => [],
    'institute' => []
    /*'field-of-research' => []
    */
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
