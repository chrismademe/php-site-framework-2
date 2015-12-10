<?php

# Include before anything else
$includes[] = APP_DIR . '/core/filters.php';
$includes[] = APP_DIR . '/core/functions.php';
$includes[] = APP_DIR . '/functions.php';

# Get Plugin functions.php
$plugin_functions = glob(APP_DIR . '/plugins/**/functions.php');

# Include Plugin functions.php
if ( is_array($plugin_functions) ) {
    $includes = array_merge($includes, $plugin_functions);
}

# Include after Plugin functions are loaded
$includes[] = APP_DIR . '/core/loader.php';
$includes[] = APP_DIR . '/core/variables.php';

# Get available plugins
$plugin_files = glob(APP_DIR . '/plugins/**/plugin.php');

# Include plugins
if ( is_array($plugin_files) ) {
    $includes = array_merge($includes, $plugin_files);
}

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

    require_once $file;

}
