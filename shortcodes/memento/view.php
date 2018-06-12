<?php
  $data = get_query_var('epfl_shortcode_memento_data');
  $title = $data->title ?: 'title';
  $content = $data->subtitle ?: 'content';
  $date = $data->publish_date ?: date('d.m.Y');
  $user = $data->userId ?: '123';
  $visual = $data->visual_url ?: 'https://via.placeholder.com/570x321.jpg';
?>