<?php

$includes = [
    '../vendor/autoload.php',
    '../app/config/environment.php',
    '../app/includes/triggers.php',
    '../app/config/loader.php',
    '../app/config/config.php',
    '../app/includes/functions.php',
    '../app/config/variables.php'
];

/**
 * Load required files
 */
foreach ( $includes as $file ) {
    require_once( $file );
}
