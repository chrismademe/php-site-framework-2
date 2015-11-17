<?php

/**
 * Load Environment Variables
 *
 * Access variables from your
 * app using the getenv() function.
 *
 * To access DB_HOST for example:
 * getenv('DB_HOST');
 */

use Dotenv\Dotenv;

$environment = new Dotenv( str_replace('/app/core', '', __DIR__) );
$environment->load();

/**
 * Set Environment Status
 */
switch ( true ) {

    /**
     * Development
     */
    case getenv('ENVIRONMENT') === 'development':
        error_reporting(-1);
        ini_set('display_errors', 'on');
    break;

}
