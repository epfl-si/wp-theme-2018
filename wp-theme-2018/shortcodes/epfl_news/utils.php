<?php 

/**
 * Get url channel
 * 
 * $data: all data from back-end
 */
function epfl_news_get_url_channel($data) {
    $url_channel = "";
    if (count($data) > 0) {
        $url_channel = "https://actu.epfl.ch/search/";
        if (get_locale() == 'fr_FR') {
            $url_channel .= "fr/";
        } else {
            $url_channel .= "en/";
        }
        $url_channel .= $data[0]->channel->name;
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
    return $news->visual_url;
}

?>