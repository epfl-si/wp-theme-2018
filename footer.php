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
?>
<div class="bg-gray-100 pt-5 mt-5">
	<div class="container">
	<?php
		// TODO: Generate footer based on future webservice?
		# fetch language
		$default_lang = 'en';
		$allowed_langs = array('en', 'fr');
		$language = $default_lang;
		/* If Polylang installed */
		if(function_exists('pll_current_language'))
		{
			$current_lang = pll_current_language('slug');
			// Check if current lang is supported. If not, use default lang
			$language = (in_array($current_lang, $allowed_langs)) ? $current_lang : $default_lang;
		}

		if ($language === 'fr') {
			require_once(__DIR__.'/footer_fr.php');
		} else {
			require_once(__DIR__.'/footer_en.php');
		}
	?>
	</div>
</div>

<?php wp_footer(); ?>
</div><!-- #page -->
</body>
</html>
