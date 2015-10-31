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

$environment = new Dotenv( str_replace('/app/config', '', __DIR__) );
$environment->load();
