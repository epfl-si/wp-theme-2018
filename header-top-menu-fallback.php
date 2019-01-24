<!-- Top menu is in fallback mode -->
<?php
/**
 * The template for displaying the top header when the "stitching" logic
 * is out of order
 *
 * @package epfl
 */

// TODO: Generate footer based on future webservice?
# fetch language
$language = get_current_language();

if ($language === 'fr') {
    require_once(__DIR__.'/header-top-menu-fallback-fr.php');
} else {
    require_once(__DIR__.'/header-top-menu-fallback-en.php');
}
