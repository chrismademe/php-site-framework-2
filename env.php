<?php

/**
 * Check to see if
 * .env file exists
 * and if not, attempt
 * to create it from
 * .env.example
 */
if ( !file_exists(ROOT_DIR . '/.env') ) {
    $contents = file_get_contents(ROOT_DIR . '/.env.example');

    if ( !file_put_contents(ROOT_DIR . '/.env', $contents) ) {
        throw new Exception('Unable to create .env file. Copy .env.example and rename it .env');
    }
}
