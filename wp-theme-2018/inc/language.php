<?php
/**
 * get_current_language
 */
function get_current_language ($default_lang='en') {
	# fetch language
	$allowed_langs = array('en', 'fr', 'de');
	$language = $default_lang;

	/* If Polylang installed */
	if(function_exists('pll_current_language'))
	{
		$current_lang = pll_current_language('slug');
		// Check if current lang is supported. If not, use default lang
		$language = (in_array($current_lang, $allowed_langs)) ? $current_lang : $default_lang;
	}
	return $language;
}
