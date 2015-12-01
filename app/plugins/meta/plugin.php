<?php

/**
 * @package Meta
 *
 * Plugin for setting
 * meta data from
 * a JSON file.
 */

/**
 * Configuration
 */
define('META_FILE', '../meta.json');

if ( !file_exists(META_FILE) || !is_readable(META_FILE) ) {
    return;
}

/**
 * Do ya thang!
 */
$meta_data = json_decode( file_get_contents(META_FILE), TRUE );

if ( $meta_data && array_key_exists($variables->page['slug'], $meta_data) ) {

    // Merge data
    $data = array_merge($variables->page['meta'], $meta_data[$variables->page['slug']]);

    // Set meta
    $variables->page['meta'] = $data;

}
