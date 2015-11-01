<?php

/**
 * @package Medoo
 * @require Database
 *
 * Plugin to integrate
 * the Medoo database
 * class
 */

if ( plugin_is_active('database') ) {

    // Check Medoo exists
    if ( !class_exists('medoo') ) {
        throw new Exception('Medoo plugin requires Medoo class to be installed via Composer.');
    }

    // Create new instance of Medoo
    $medoo = new medoo([
        'database_type' => 'mysql',
        'database_name' => DB_NAME,
        'server' => DB_HOST,
        'username' => DB_USER,
        'password' => DB_PASS,
        'charset' => 'utf8',
        'port' => DB_PORT
    ]);

} else {
    throw new Exception('Medoo plugin requires Database to be active');
}
