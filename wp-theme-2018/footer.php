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
		$language = get_current_language();

		if ($language === 'fr') {
			require_once(__DIR__.'/footer_fr.php');
		} else {
			require_once(__DIR__.'/footer_en.php');
		}
	?>
	</div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
