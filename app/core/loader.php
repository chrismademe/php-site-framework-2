<?php

/**
 * Get Config
 */
function get_config() {

    # Get Theme object
    global $theme;

    # Theme Folder
    $dir = (defined('THEME_DIR') ? THEME_DIR : 'theme');

    # Config file
    $file = APP_DIR .'/'. $dir .'/'. $theme->active .'/theme.json';

    # Get config file
    if ( file_exists($file) && is_readable($file) ) {

        # Get theme file
        $config = file_get_contents($file);

        # Decode JSON
        $config = json_decode($config, TRUE);

        # Set required fields
        $required = array(
            'name',
            'styles',
            'scripts'
        );

        # Check for required fields
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

$theme_config = get_config();

# Filter $theme
$theme_config = $filters->apply_filters( 'filter_theme_config', $theme_config );
