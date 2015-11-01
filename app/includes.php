<?php

$includes = [
    '../app/vendor/autoload.php',
    '../app/core/environment.php',
    '../app/includes/triggers.php',
    '../app/core/loader.php',
    'config.php',
    '../app/includes/functions.php',
    '../app/core/variables.php',
    'variables.php'
];

/**
 * Include Plugins for include
 */
$includes = array_merge($includes, glob('../app/plugins/**/plugin.php'));
print_r($includes);
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
