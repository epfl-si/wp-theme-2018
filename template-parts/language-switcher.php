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
<nav class="nav-lang nav-lang-short ml-auto pr-lg-5">
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
<nav class="nav-lang ml-auto dropdown pr-lg-5" aria-label="Change language">
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

<select name="nav-lang" class="nav-lang-mobile form-control">
<?php foreach($translations as $lang): ?>
	<?php if ($lang['current_lang']): ?>
	<option value="/<?php echo $lang['slug'] ?>" selected data-url="<?php echo $lang['url'] ?>">
    	<svg class="icon" aria-hidden="true"><use xlink:href="#icon-planet"></use></svg>
    	<?php echo strtoupper($lang['slug']) ?>
  	</option>
	<?php else: ?>
	<option value="/<?php echo $lang['slug'] ?>" data-url="<?php echo $lang['url'] ?>">
    <?php echo strtoupper($lang['slug']) ?>
  	</option>
	<?php endif; // current lang ?>
<?php endforeach; ?>
</select>
	
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