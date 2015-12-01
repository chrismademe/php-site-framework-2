<?php

$includes = array(
    APP_DIR . '/core/filters.php',
    APP_DIR . '/core/functions.php',
    APP_DIR . '/functions.php',
    APP_DIR . '/core/loader.php',
    APP_DIR . '/core/variables.php'
);

/**
 * Include available plugins
 */
$includes = array_merge($includes, glob(APP_DIR . '/plugins/**/plugin.php'));

/**
 * Load required files
 */
foreach ( $includes as $file ) {

    /**
     * Verify that file exists and
     * is readable.
     */
    if ( !file_exists($file) && !is_readable($file) ) {
        throw new Exception('Required file: ' . $file . ' either does not exist or is not readable.');
    }

    require_once( $file );

}
