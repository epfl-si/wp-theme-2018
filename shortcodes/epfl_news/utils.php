<?php 

/**
 * Get url channel
 * 
 * $data: all data from back-end
 */
function get_url_channel($data) {
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
function get_image_description($news) {
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
function get_label_category($news) {
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
function get_publish_date($news) {
    $publish_date = new DateTime($news->publish_date);
    $publish_date = $publish_date->format('d.m.y');
    return $publish_date;
}

/**
 * Get subtitle
 * 
 * $news: news to display
 */
function get_subtitle($news) {
    $subtitle = strip_tags($news->subtitle);
    return $subtitle;
}

/**
 * Get visual url
 * 
 * $news: news to display
 */
function get_visual_url($news) {
    $visual_url = substr($news->visual_url, 0, -11) . '1296x728.jpg';
    return $visual_url;
}

/**
 * Get media url
 * 
 * $news: news to display
 */
function get_media_url($news) {
    $slug = str_replace("https://actu.epfl.ch/news/", "", $news->news_url);
    $video_url = "teaser_" . $slug;
          
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name='%s';", $video_url ));

    $media_url = "";
    if ( !is_null( $attachment ) ) {
        $media_id = $attachment[0];
        $media_url = wp_get_attachment_url( $media_id );  
    }
    return $media_url;
}

?>