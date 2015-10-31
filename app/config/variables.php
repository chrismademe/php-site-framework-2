<?php

use Theme\Variables;

/**
 * Variables Object
 */
$variables = new Variables();

// Debug helpers
$variables->addVar('dev', [
    'localhost' => is_localhost()
]);

// Global Site Variables
$variables->addVar('site', [
    'name'      => SITE_NAME,
    'phone'     => SITE_PHONE,
    'email'     => SITE_EMAIL,
    'address'   => SITE_ADDRESS,
    'domain'    => SITE_DOMAIN,
    'styles'    => load_asset($config['theme']['styles'], 'css'),
    'scripts'   => load_asset($config['theme']['scripts'], 'js'),
    'assets'    => assets_dir(),
    'ie'        => [
        'min'       => 9,
        'strict'    => false
    ]
]);

// Page variables
$variables->addVar('page', [
    'is_home'   => is_home(),
    'path'      => $path,       // Path as it comes (e.g. services/design)
    'slug'      => get_page()   // Formatted page ID (e.g. services-design)
]);

// User variables
$variables->addVar('user', [
    'logged_in' => false
]);

// Various useful variables
$variables->addVar('this_year', this_year());

/** ----------------------------------- **
 * Default page meta is set here but     *
 * should be overridden in your          *
 * model files. Access the array using   *
 * $_['page']['meta'] from your model.   *
 ** ----------------------------------- **/

// Page meta data
$meta = [

    // Default - set to whichever page we're on
    $variables->page['slug'] => [
        'title' => SITE_NAME,
        'description' => 'Description',
        'keywords' => 'Keywords',
        'canonical' => 'Canonical'
    ]

];

$variables->addVar('meta', $meta[$variables->page['slug']]);

/*************************************
 *** Do Trigger: on_variables_init ***
 *************************************/
$triggers->doTrigger('on_variables_init');
