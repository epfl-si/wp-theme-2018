<?php
/**
** Child theme setup
**/

// enqueue styles for child theme
// @ https://digwp.com/2016/01/include-styles-child-theme/
function epfl_child_enqueue_styles() {
	
	// enqueue child styles
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/assets/css/child.min.css' );
	
}
add_action('wp_enqueue_scripts', 'epfl_child_enqueue_styles', 10000000001 );

?>
