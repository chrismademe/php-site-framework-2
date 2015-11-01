<?php

/**
 * Get Config
 */
function get_config() {

    // Config file
    $file = THEME_DIR .'/'. SITE_THEME .'/theme.json';

    // Get config file
    if ( file_exists($file) && is_readable($file) ) {

        // Get theme file
        $config = file_get_contents($file);

        // Decode JSON
        $config = json_decode($config, TRUE);

        // Set required fields
        $required = ['name', 'styles', 'scripts'];

        // Check for required fields
        foreach ( $required as $field ) {
            if ( !array_key_exists( $field, $config ) ) {
                throw new Exception($field .' is a required field, please include it in your app.json file.');
            }
        }

        return $config;

    } else {
        throw new Exception('Your theme.json file could not be opened.');
    }

}

try {
    $theme = get_config();
} catch (Exception $e) {
    echo $e->getMessage();
}
