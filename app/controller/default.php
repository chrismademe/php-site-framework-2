<?php

/**
 * Controller
 *
 * Your logic can go here. Controllers
 * are loaded using the same pattern
 * as theme files and so will match
 * your theme.
 *
 * Example:
 * User opens yoursite.com/one/page/url
 * The Controller will search as follows:
 *
 * one/page/url.php
 * one-page-url.php
 * one/page.php
 * one-page.php
 * one.php
 * default.php
 *
 * NOTE: Avoid the overriding following
 * variable keys with new arrays as they're
 * used by the theme.
 *
 * @var site
 * @var page
 * @var dev
 * @var user
 *
 * Set theme variables using the $variables object.
 */

/**
 * Set meta array for
 * 404 page
 */
if ( $theme->notFound() ) {
    $variables->page['meta'] = array(
        'title' => '404. Page Not Found | '. SITE_NAME,
        'description' => 'The page you were looking for could not be found.',
        'keywords' => 'not found'
    );
}
