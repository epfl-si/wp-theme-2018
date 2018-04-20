<?php
/*
Plugin Name: Epfl fetch
*/

require 'epfl-fetcher.php';

add_shortcode( 'news', 'displayNews' );

function displayNews( $attributes ) {
  $a = shortcode_atts( array(
    'date' => 'today',
    'nombre' => 4,
  ), $attributes );

  // use parameters to call API
  $result = fetch("GET", "https://jsonplaceholder.typicode.com/posts");
  $json = json_decode($result);

  // process data
  $posts  = [
    $json[1],
    $json[20],
    $json[30],
    $json[50],
    $json[80]
  ];
  
  // apply filter
  apply_filters('epfl_shortcode_news', $posts);
}
