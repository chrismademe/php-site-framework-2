<?php

/**
 * Get Config
 */
function get_config() {

    // Get config file
    if ( file_exists('../site.json') && is_readable('../site.json') ) {

        // Get theme file
        $config = file_get_contents('../site.json');

        // Decode JSON
        $config = json_decode($config, TRUE);

        // Set required fields
        $required = ['theme'];

        // Check for required fields
        foreach ( $required as $field ) {
            if ( !array_key_exists( $field, $config ) ) {
                throw new Exception($field .' is a required field, please include it in your theme.json file.');
            }
        }

        return $config;

    } else {
        throw new Exception('Your theme.json file could not be opened.');
    }

}
