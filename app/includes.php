<?php

use Plugins\Plugins;

$includes = [
    '../app/vendor/autoload.php',
    '../app/core/environment.php',
    '../app/core/triggers.php',
    'config.php',
    '../app/core/loader.php',
    '../app/core/functions.php',
    '../app/core/variables.php',
    'variables.php'
];

/**
 * Include available plugins
 */
$includes = array_merge($includes, glob('../app/plugins/**/plugin.php'));

/**
 * Load required files
 */
foreach ( $includes as $file ) {
    if ( file_exists($file) && is_readable($file) ) {
        require_once( $file );
    } else {
        throw new Exception('Required file: '. $file .' either does not exist or is not readable.');
    }
}
