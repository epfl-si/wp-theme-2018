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

?>
<!-- language switcher -->
		<nav class="language-switcher pr-5">
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
