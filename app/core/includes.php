<?php

use Plugins\Plugins;

$includes = array(
    APP_DIR .'/config.php',
    APP_DIR .'/core/triggers.php',
    APP_DIR .'/core/router.php',
    APP_DIR .'/core/loader.php',
    APP_DIR .'/core/functions.php',
    APP_DIR .'/core/variables.php',
    APP_DIR .'/variables.php'
);

/**
 * Include available plugins
 */
$includes = array_merge($includes, glob(APP_DIR .'/plugins/**/plugin.php'));

/**
 * Load required files
 */
foreach ( $includes as $file ) {

    /**
     * Verify that file exists and
     * is readable.
     */
    if ( !file_exists($file) && !is_readable($file) ) {
        throw new Exception('Required file: '. $file .' either does not exist or is not readable.');
    }

    require_once( $file );

}
