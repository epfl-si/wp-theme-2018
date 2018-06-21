<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epfl
 */

if (!function_exists('pll_the_languages')) {
	include(__DIR__.'/footer_mock.php');
	return;
}

/**
 * TODO: get actual language
 */
$lang = 'fr';

if ( $lang == 'fr' ) {
	include(__DIR__.'/footer_mock_fr.php');
} else {
	include(__DIR__.'/footer_mock.php');
}
?>

	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
