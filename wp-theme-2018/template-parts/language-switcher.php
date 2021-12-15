<?php

/*
	language switcher
 */

// disable if polylang is not present
if (!function_exists('pll_the_languages')) {
	echo '<div></div>';
	return;
}

// on the homepage, pll_the_languages want the good id
$current_page_id = has_static_posts_page_selected();

if ( is_home() && $current_page_id ) {
	$translations = pll_the_languages(array('raw'=>1, 'post_id'=>$current_page_id));
} else {
	$translations = pll_the_languages(array('raw'=>1));
}

# filter out langages without this page translated, only for singular and home
if (is_singular() || is_home()) {
	$translations = array_filter($translations, function($value) {
		return (!$value['no_translation']);
	});
}

$translations_count = sizeof($translations);

if ($translations_count == 0) {
	// disable if page is not translated
	echo '<div></div>';
	return;
}

$translations = reorderTranslations($translations);

if ($translations_count < 3) {
?>
<!-- language switcher, two elements -->
<nav class="nav-lang nav-lang-short ml-auto">
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
} else {
?>
<!-- language switcher, 3 or more elements -->
<nav class="nav-lang ml-auto dropdown" aria-label="Change language">
<?php foreach($translations as $lang): ?>
	<?php if ($lang['current_lang']): ?>
  <a href="#" class="dropdown-toggle btn btn-secondary" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
    <svg class="icon" aria-hidden="true"><use xlink:href="#icon-planet"></use></svg>
    <span><?php echo strtoupper($lang['slug']) ?></span>
  </a>
	<?php endif; // current lang ?>
<?php endforeach; ?>

  <ul class="dropdown-menu">

  <?php foreach($translations as $lang): ?>
	<?php if ($lang['current_lang']): ?>
	<li>
      <a aria-label="<?php echo $lang['name'] ?> (Current language)" class="active dropdown-item">
        <svg class="icon" aria-hidden="true"><use xlink:href="#icon-planet"></use></svg>
        <span><?php echo strtoupper($lang['slug']) ?></span>
      </a>
    </li>
	<?php else: ?>
    <li>
      <a href="<?php echo $lang['url'] ?>" aria-label="<?php echo strtoupper($lang['name']) ?>" class="dropdown-item">
        <span><?php echo strtoupper($lang['slug']) ?></span>
      </a>
    </li>
	<?php endif; // current lang ?>
<?php endforeach; ?>
  </ul>
</nav>

<?php
}

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
	    if(array_key_exists($lang, $trads)){
	        $temp[] = $trads[$lang];
	    }
	}

	foreach ($trads as $key => $value) {
		if(!in_array($key, $langSequence)) {
			$temp[] = $value;
		}
	}

	return $temp;
}
?>
