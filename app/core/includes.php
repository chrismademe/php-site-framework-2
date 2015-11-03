<?php

use Plugins\Plugins;

$includes = [
    APP_DIR .'/vendor/autoload.php',
    APP_DIR .'/core/environment.php',
    APP_DIR .'/core/triggers.php',
    APP_DIR .'/config.php',
    APP_DIR .'/core/loader.php',
    APP_DIR .'/core/functions.php',
    APP_DIR .'/core/variables.php',
    APP_DIR .'/variables.php'
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
