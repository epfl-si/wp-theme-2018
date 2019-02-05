<?php 

/**
 * Get person photo
 */
function epfl_people_get_photo($person) {
    $photo_url = "";
    if ("1" == $person->people->photo_show) {
        $photo_url = "https://people.epfl.ch/private/common/photos/links/" . $person->sciper;
    }
    return $photo_url;
}

/**
 * Get person phones number
 */
function epfl_people_get_phones($person) {

    $phones = [];
    foreach($person->unites as $current_unit) {
        $phones = array_merge($phones, $current_unit->phones);
    }
    return $phones;
}

/**
 * Get person function
 */
function epfl_people_get_function($person) {
    $function = '';
    foreach($person->unites as $current_unit) {
        if ($current_unit->ordre  == 1) {
            $function = $current_unit->fonction;
        }
    }
    return $function;
}

/**
 * Get person room
 */
function epfl_people_get_room($person) {
    
    $room = '';
    foreach($person->unites as $current_unit) {
        if ($current_unit->ordre  == 1) {
            $room = $current_unit->rooms;
        }
    }
    return $room;
}

/**
 * Get URL room
 */
function epfl_people_get_room_url($room) {
    return "https://plan.epfl.ch/?room=" . $room; 
}

/**
 * Get URL people
 */
function epfl_people_get_people_url($person) {

    $slug = "";
    if ($person->email) {
        $slug = str_replace("@epfl.ch", "", $person->email);
    } else {
        $slug = $person->sciper;
    }
    return "https://people.epfl.ch/" . $slug;
}

?>