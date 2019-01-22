<?php
/**
 * The template for displaying the top header
 *
 * @package epfl
 */

// TODO: Generate footer based on future webservice?
# fetch language
$language = get_current_language();

if ($language === 'fr') {
    require_once(__DIR__.'/header-top-menu-fr.php');
} else {
    require_once(__DIR__.'/header-top-menu-en.php');
}
