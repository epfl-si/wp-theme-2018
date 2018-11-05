<?php 

/**
 * Get url channel
 * 
 * $data: all data from back-end
 */
function epfl_news_get_url_channel($data) {
    $url_channel = "";
    if (count($data) > 0) {
        $channel = $data[0]->channel->name;
        $url_channel = "https://actu.epfl.ch/search/" . $channel;
    }
    return $url_channel;
}

/**
 * Get image description
 * 
 * $news: news to display
 */
function epfl_news_get_image_description($news) {
    if (get_locale() == 'fr_FR') {
        $image_description = $news->fr_description;
    } else {
        $image_description = $news->en_description;
    }
    return $image_description;
}

/**
 * Get label category
 * 
 * $news: news to display
 */
function epfl_news_get_label_category($news) {
    if (get_locale() == 'fr_FR') {
        $label_category = $news->category->fr_label;
    } else {
        $label_category = $news->category->en_label;
    }
    return $label_category;
}

/**
 * Get publish date
 * 
 * $news: news to display
 */
function epfl_news_get_publish_date($news) {
    $publish_date = new DateTime($news->publish_date);
    $publish_date = $publish_date->format('d.m.y');
    return $publish_date;
}

/**
 * Get subtitle
 * 
 * $news: news to display
 */
function epfl_news_get_subtitle($news) {
    return strip_tags($news->subtitle);
}

/**
 * Get visual url
 * 
 * $news: news to display
 */
function epfl_news_get_visual_url($news) {
    return substr($news->visual_url, 0, -11) . '1296x728.jpg';
}

/**
 * Get attachment url by slug
 */
function get_attachment_url_by_slug( $slug ) {
    
    $args = array(
      'post_type'      => 'attachment',
      'name'           => sanitize_title($slug),
      'posts_per_page' => 1,
      'post_status'    => 'inherit',
    );

    $_header = get_posts( $args );
    $header  = $_header ? array_pop($_header) : null;

    return $header ? wp_get_attachment_url($header->ID) : '';
  }

?>