<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Finder\Finder;

add_action( 'init', 'register_shortcodes' );

// load all files named "controller.php" in all sub-folders
$finder = new Finder();
$finder->files()->in(__DIR__)->name('/controller.php$/');
foreach ($finder as $file) {
    require_once($file->getRealPath());
}