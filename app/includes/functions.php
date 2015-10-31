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

    if (in_array($_SERVER['REMOTE_ADDR'], $hosts)) {
        return true;
    } else {
        return false;
    }

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
function is_page($id = null) {

    $id = (is_null($id) ? 'homepage' : $id);

    if ($id == get_page()) {
        return true;
    } else {
        return false;
    }

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

    // Get path
    global $path;

    // Remove slashes
    $uri = str_replace('/', '-', ltrim($path, '/'));

    // Get page URI
    if ($uri == '') {
        $page = 'index';
    } else {
        $page = $uri;
    }

    return $page;

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

    // Set time
    if (is_null($time))
        $time = '00:00';

    // Set time and date
    $exp = $date . $time;

    if (date('dmYHi') >= $exp) {
        return true;
    } else {
        return false;
    }

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
 */
function assets_dir() {
    return '/'. THEME_DIR .'/'. SITE_THEME .'/'. THEME_ASSETS;
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

        // Set new path
        $dir = ($append ? assets_dir() .'/'. $append : assets_dir());

        // Async false by default
        $loaded['async'] = false;

        // Check for local file
        if ( substr($asset, 0, 1) == '|' ) {
            $loaded['src'] =  $dir .'/'. ltrim($asset, '|');
        } else {
            $loaded['src'] = $asset;
        }

        // Check for Async
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

/*************************************
 *** Do Trigger: on_functions_init ***
 *************************************/
$triggers->doTrigger('on_functions_init');
