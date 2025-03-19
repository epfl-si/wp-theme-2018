<?php
/**
 * get_current_language
 */
function get_current_language ($default_lang='en') {
	if ( function_exists('pll_current_language') ) {
		return pll_current_language();
	} else {
		return $default_lang;
	}
}
