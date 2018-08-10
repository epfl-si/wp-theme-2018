<?php

// require_once __DIR__.'/../vendor/autoload.php';

// use Symfony\Component\Finder\Finder;

// add_action( 'init', 'register_shortcodes' );

// load all files named "controller.php" in all sub-folders
//$finder = new Finder();
//$finder->files()->in(__DIR__)->name('/controller.php$/');
/* foreach ($finder as $file) {
    require_once($file->getRealPath());
}
 */

require_once(get_template_directory().'/shortcodes/templates/card-img-top.php');

require_once(get_template_directory().'/shortcodes/faculties/controller.php');
require_once(get_template_directory().'/shortcodes/definition_list/controller.php');
require_once(get_template_directory().'/shortcodes/introduction/controller.php');
require_once(get_template_directory().'/shortcodes/hero/controller.php');
require_once(get_template_directory().'/shortcodes/collapsable/controller.php');
require_once(get_template_directory().'/shortcodes/news/controller.php');
require_once(get_template_directory().'/shortcodes/page_teaser/controller.php');
require_once(get_template_directory().'/shortcodes/post_teaser/controller.php');
require_once(get_template_directory().'/shortcodes/custom_teasers/controller.php');
require_once(get_template_directory().'/shortcodes/page_highlight/controller.php');
require_once(get_template_directory().'/shortcodes/post_highlight/controller.php');
require_once(get_template_directory().'/shortcodes/custom_highlight/controller.php');
