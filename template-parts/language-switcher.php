<?php 

/*
	language switcher
 */

// disable if polylang is not present
if (!function_exists('pll_the_languages')) {
	echo '<div></div>';
	return;
}

$translations = pll_the_languages(array('raw'=>1));

// disable if page is not translated
if ( sizeof($translations) == 0) {
	echo '<div></div>';
	return;
}

$translations = reorderTranslations($translations);
?>
<!-- language switcher -->
		<nav class="nav-lang pr-lg-5">
		<ul>
		<?php foreach($translations as $lang): ?>
			<?php if ($lang['current_lang']): ?>
				<li>
					<span class="active" aria-label="<?php echo $lang['name'] ?>'"><?php echo strtoupper($lang['slug']) ?></span>
				</li>
			<?php else: ?>
				<li>
					<a href="<?php echo $lang['url'] ?>" aria-label="English"><?php echo strtoupper($lang['slug']) ?></a>
				</li>
			<?php endif; // current lang ?>
		<?php endforeach; ?>
		</ul>
	</nav>

<?php 

/**
 * reorderTranslations
 *
 * Orders given translation according to the lang sequence.
 * Traductions out of the language sequence will be put at the end
 * of the list in arrival order
 * 
 * @param [array] $trads
 * @return array
 */
function reorderTranslations($trads) {
	$temp = [];
	$langSequence = ['fr', 'en', 'de', 'it'];
	foreach ($langSequence as $lang) {
		foreach ($trads as $key => $value) {
			if($key === $lang) {
				array_push($temp, $value);
				break;
			}
		}
	}

	foreach ($trads as $key => $value) {
		if(!in_array($key, $langSequence)) {
			array_push($temp, $value);
		}
	}

	return $temp;
}
?>