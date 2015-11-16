<?php

use Theme\Variables;

/**
 * Variables Object
 */
$variables = new Variables();

// Debug helpers
$variables->addVar('dev', array(
    'localhost' => is_localhost()
));

// Theme
$variables->addVar('theme', array(
    'supports'  => (array_key_exists('supports', $theme) ? $theme['supports'] : array())
));

// Global Site Variables
$variables->addVar('site', array(
    'name'      => SITE_NAME,
    'email'     => SITE_EMAIL,
    'domain'    => SITE_DOMAIN,
    'styles'    => load_asset($theme['styles'], 'css'),
    'scripts'   => load_asset($theme['scripts'], 'js'),
    'assets'    => assets_dir(),
    'ie'        => array(
        'min'       => 9,
        'strict'    => false
    )
));

// Page variables
$variables->addVar('page', array(
    'is_home'   => is_home(),
    'path'      => $path,       // Path as it comes (e.g. services/design)
    'slug'      => get_page()   // Formatted page ID (e.g. services-design)
), true);

// User variables
$variables->addVar('user', array(
    'logged_in' => false
));

// Various useful variables
$variables->addVar('this_year', this_year());

/** ----------------------------------- **
 * Default page meta is set here but     *
 * should be overridden in your          *
 * model files. Access the array using   *
 * $_['page']['meta'] from your model.   *
 ** ----------------------------------- **/

// Page meta data
$meta = array(

    // Default - set to whichever page we're on
    $variables->page['slug'] => array(
        'title' => SITE_NAME,
        'description' => 'Description',
        'keywords' => 'Keywords',
        'canonical' => 'Canonical'
    )

);

$variables->page['meta'] = $meta[$variables->page['slug']];
