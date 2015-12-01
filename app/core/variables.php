<?php

use Theme\Variables;

/**
 * Variables Object
 */
$variables = new Variables();

# Debug helpers
$variables->add('dev', array(
    'localhost' => is_localhost()
));

# Theme
$variables->add('theme', array(
    'supports'  => (array_key_exists('supports', $theme) ? $theme['supports'] : array())
));

# Global Site Variables
$variables->add('site', array(
    'name'      => SITE_NAME,
    'email'     => SITE_EMAIL,
    'domain'    => SITE_DOMAIN,
    'styles'    => load_asset($theme_config['styles'], 'css'),
    'scripts'   => load_asset($theme_config['scripts'], 'js'),
    'assets'    => assets_dir(),
    'ie'        => array(
        'min'       => 9,
        'strict'    => false
    )
));

# Page variables
$variables->add('page', array(
    'is_home'   => is_home(),
    'path'      => $path,       # Path as it comes (e.g. services/design)
    'slug'      => get_page()   # Formatted page ID (e.g. services-design)
), true);

# User variables
$variables->add('user', array(
    'logged_in' => is_loggedin()
));

# Various useful variables
$variables->add('this_year', this_year());

/** ----------------------------------- **
 * Default page meta is set here but     *
 * should be overridden in your          *
 * model files. Access the array using   *
 * $_['page']['meta'] from your model.   *
 ** ----------------------------------- **/

# Page meta data
$meta = array(

    # Default - set to whichever page we're on
    $variables->get('page|slug') => array(
        'title' => SITE_NAME,
        'description' => 'Description',
        'keywords' => 'Keywords',
        'canonical' => 'Canonical'
    )

);

$variables->extend('page', 'meta', $meta[$variables->get('page|slug')]);
