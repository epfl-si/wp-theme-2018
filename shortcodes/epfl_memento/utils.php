<?php

/**
 * trims text to a space then adds ellipses if desired
 * @param string $input text to trim
 * @param int $length in characters to trim to
 * @param bool $ellipses if ellipses (...) are to be added
 * @param bool $strip_html if html tags are to be stripped
 * @return string 
 */
function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}

/**
 * return true is the event is just finished.
 * The period during which an event is "just finished" begins at the end of the event 
 * and ends at midnight on the last day of the event.
 * @param string $end_date the end date of the event
 * @param string $end_time the end time of the event
 * @return boolean 
 */
function is_just_finished($end_date, $end_time) {

    date_default_timezone_set('Europe/Paris');
    $now = new DateTime();
    $end_date = new DateTime($end_date);
    $end_time = new DateTime($end_time);

    $merge = new DateTime($end_date->format('Y-m-d') . ' ' . $end_time->format('H:i:s'));
    if ($now->format('Y-m-d') == $merge->format('Y-m-d') && $now > $merge) {
        return true;
    }
    return false;
}

/**
 * 
 */
function is_inscription_required($invitation) {
    return ($invitation === "Registration required");
}


