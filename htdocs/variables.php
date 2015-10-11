<?php

// Debug helpers
$_['dev'] = [
    'localhost' => is_localhost()
];

// Global Site Variables
$_['site'] = [
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
];

// Page variables
$_['page'] = [
    'is_home'   => is_home(),
    'path'      => $path,       // Path as it comes (e.g. services/design)
    'slug'      => get_page()   // Formatted page ID (e.g. services-design)
];

// User variables
$_['user'] = [
    'logged_in' => false
];

// Various useful variables
$_['this_year'] = this_year();

/** ----------------------------------- **
 * Default page meta is set here but     *
 * should be overridden in your          *
 * model files. Access the array using   *
 * $_['page']['meta'] from your model.   *
 ** ----------------------------------- **/

// Page meta data
$meta = [

    // Default - set to whichever page we're on
    $_['page']['slug'] => [
        'title' => SITE_NAME,
        'description' => 'Description',
        'keywords' => 'Keywords',
        'canonical' => 'Canonical'
    ]

];

// Set $this->page based on slug
$_['page']['meta'] = $meta[$_['page']['slug']];
