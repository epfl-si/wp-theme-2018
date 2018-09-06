<?php

/**
 * Get YouTube id
 *
 * @param string $url URL to video
 * @return string video id
 */
function get_youtube_id($url) {
    // Here is a sample of the URLs this regex matches: (there can be more content after the given URL that will be ignored)
    // http://youtu.be/dQw4w9WgXcQ
    // http://www.youtube.com/embed/dQw4w9WgXcQ
    // http://www.youtube.com/watch?v=dQw4w9WgXcQ
    // http://www.youtube.com/?v=dQw4w9WgXcQ
    // http://www.youtube.com/v/dQw4w9WgXcQ
    // http://www.youtube.com/e/dQw4w9WgXcQ
    // http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
    // http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
    // http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
    // http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
    // It also works on the youtube-nocookie.com URL with the same above options.
    // It will also pull the ID from the URL in an embed code (both iframe and object tags)
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return $match[1];
}

/**
 * Build video URL
 */
function build_video_url($video_html) {
    $video_url = "";
    
    // Parse video HTML from news.epfl.ch
    $html = simplexml_load_string($video_html);
    
    // Extract video URL
    $youtube_url = (string) $html['src'];
    
    // Get youtube video id 
    $youtube_id = get_youtube_id($youtube_url);
    
    // Build URL video with some parameters 
    $video_url = "https://www.youtube.com/embed/" . $youtube_id . "?controls=0&showinfo=0&rel=0&autoplay=1&loop=1";
    
    return $video_url;
}

?>