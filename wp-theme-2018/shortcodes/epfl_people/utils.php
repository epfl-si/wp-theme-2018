<?php 

/**
 * Get person photo
 */
function epfl_people_get_photo($person) {
    $photo_url = "";
    if ("1" == $person->people->photo_show) {
        $photo_url = "https://people.epfl.ch/private/common/photos/links/" . $person->sciper.".jpg";
    }
    return $photo_url;
}

/**
 * Get person phones number
 */
function epfl_people_get_phones($person) {
    $phones = [];
    foreach($person->unites as $current_unit) {
        $phones = array_merge($phones, array_filter($current_unit->phones));
    }
    return array_unique($phones);
}

/**
 * Get person function
 */
function epfl_people_get_function($person, $from) {
    $function = '';
    $nb_units = count((array)$person->unites);    
    foreach($person->unites as $current_unit) {
        if ($from == 'units' || $from == 'doctoral_program' || ($from == 'scipers' && $current_unit->ordre  == 1)) {
            $language = get_current_language();
            if ($language === 'fr') {
                $function = $current_unit->fonction_fr;
            } else {
                $function = $current_unit->fonction_en;
            }
        }
    }
    return $function;
}

/**
 * Get person room
 */
function epfl_people_get_room($person, $from) {
    
    $room = '';
    foreach($person->unites as $current_unit) {
        if ($from == 'units' || $from == 'doctoral_program' || ($from == 'scipers' && $current_unit->ordre  == 1)) {
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
