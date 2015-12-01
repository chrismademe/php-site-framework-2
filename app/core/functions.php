<?php

/**
 * Check if we're
 * viewing from
 * local machine
 */
function is_localhost() {

    $hosts = array(
        '127.0.0.1',
        '::1',
        'localhost'
    );

    return in_array($_SERVER['REMOTE_ADDR'], $hosts);

}

/**
 * Check page
 * Returns true is
 * current page matches
 * $id
 *
 * Will check for homepage
 * if no argument
 */
function is_page( $check = null ) {
    $page = (is_null($check) ? 'index' : $check);
    return $page === get_page();
}

/**
 * Check path
 */
function is_path( $check ) {
    global $path;
    return $check === $path;
}

/**
 * Is Index
 *
 * Check the first index
 */
function is_index( $check = null ) {
    global $index;
    return $check == $index[0];
}

/**
 * Check to see if
 * current page is
 * homepage
 */
function is_home() {
    return is_page();
}

/**
 * Get Current Page
 */
function get_page() {

    # Get path
    global $path;

    # Remove slashes
    $uri = str_replace('/', '-', ltrim($path, '/'));

    return $uri;

}

/**
 * Get current year for
 * copyright notice
 */
function this_year($value = null) {
    return date('Y');
}

/**
 * Check to see if
 * date and time have passed
 *
 * Date format: ddmmyyyy
 * Time format: hhmm
 */
function has_expired($date, $time = null) {

    # Set time
    if (is_null($time)) {
        $time = '00:00';
    }

    # Set time and date
    $exp = $date . $time;

    return date('dmYHi') >= $exp;

}

/** --------------------------------- *
 * Template Helper Functions          *
 * --------------------------------- **/

/**
 * Site Assets
 *
 * Returns assets directory
 *
 * UPDATED:
 * This function no longer echo's
 * the result automatically and the
 * ability to do so has been removed.
 * From now on, pass the return value
 * to your theme as a variable.
 *
 * This function returns the location
 * of the PUBLIC assets directory, not
 * the source.
 */
function assets_dir() {
    $dir = (defined('THEME_ASSETS') ? THEME_ASSETS : 'assets');
    return '/'. $dir;
}

/**
 * Assets loader
 */
function load_asset( $asset, $append = false ) {

    if ( is_array($asset) ) {

        foreach ( $asset as $file ) {
            $loaded[] = load_asset($file, $append);
        }

    } else {

        # Set new path
        $dir = ($append ? assets_dir() .'/'. $append : assets_dir());

        # Async false by default
        $loaded['async'] = false;

        # Check for local file
        if ( substr($asset, 0, 1) == '|' ) {
            $loaded['src'] =  $dir .'/'. ltrim($asset, '|');
        } else {
            $loaded['src'] = $asset;
        }

        # Check for Async
        foreach ( $loaded as $asset ) {
            $asset = explode(':', $asset);
            if ( count($asset) > 1 ) {
                $loaded['src'] = $asset[0];
                $loaded['async'] = true;
            }
        }

    }

    return $loaded;

}

/**
 * Has Form Data
 * Checks for POST and FILE arrays
 */
function is_form_data() {
    return $_POST || $_FILES;
}

/**
 * Form Data
 * Contains POST and FILES arrays
 */
function form_data() {
    return array_merge($_POST, $_FILES);
}

/**
 * Form Field Exists
 */
function form_field_exists( $field ) {
    return isset($_POST[$field]) || isset($_FILES[$field]);
}

/**
 * Form Field
 */
function form_field( $field ) {
    $fields = form_data();
    return (form_field_exists($field) ? $fields[$field] : false);
}

/**
 * Plugin Dir
 * Returns plugin directory path
 */
function plugin_dir() {
    return APP_DIR .'/plugins';
}

/**
 * Plugin Exists
 */
function plugin_exists( $plugin ) {
    return is_dir(plugin_dir() .'/'. $plugin);
}

/**
 * Plugin Is Active
 */
function plugin_is_active( $plugin ) {
    return file_exists(plugin_dir() .'/'. $plugin .'/plugin.php');
}

/** --------------------------------- *
 * User Helper Functions              *
 * --------------------------------- **/
function is_loggedin() {
    return session_exists( SESSION_ID );
}

/** --------------------------------- *
 * Session Helper Functions           *
 * --------------------------------- **/
function session_exists( $session ) {
    return isset($_SESSION[$session]);
}

/**
 * Add a session key to the
 * current session
 */
function session_add( $key, $value ) {
    $_SESSION[$key] = $value;
}

/**
 * Remove a session key to the
 * current session
 */
function session_remove( $key ) {

    if ( session_exists($key) ) {
        unset( $_SESSION[$key] );
    }

}
