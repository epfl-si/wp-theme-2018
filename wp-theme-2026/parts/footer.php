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
<div class="bg-gray-100 py-5 mt-5">
	<div class="container">
	<?php
		// TODO: Generate footer based on future webservice?
		# fetch language
		$language = get_current_language();
		$template_dir = get_template_directory();

		if ($language === 'fr') {
			require_once($template_dir . '/footer_fr.php');
		}
		elseif ($language === 'de') {
			require_once($template_dir.'/footer_de.php');
		} else {
			require_once($template_dir.'/footer_en.php');
		}
	?>
	</div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
