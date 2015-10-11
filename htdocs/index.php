<?php

session_start();

/******************
 **
 ** Hey :)
 **
 ** This page is simply used
 ** to route requests and load
 ** the necassary PHP resources.
 **
 ** If you need to make changes,
 ** you can access specific pages
 ** by going to the /theme folder
 **
 ** NOTE: Content changes will
 ** most likely need to be made
 ** from the /content folder.
 **
 ******************/

use Theme\Theme;
use Model\Model;

/**
 * Set Path
 */
$path = (isset($_GET['path']) ? rtrim($_GET['path'], '/') : 'homepage');
$index = explode('/', $path);

/**
 * Include functions & classes
 */
require_once('scripts/includes.php');

/**
 * Turn on error reporting
 * if we're on localhost
 */
if ( is_localhost() ) {
    error_reporting(-1);
    ini_set('display_errors', 'on');
}

/**
 * Instantiate model & theme
 */
$model = new Model($path, $index);
$theme = new Theme($path, $index, ['debug' => true]);

/**
 * If no path is set, set is as
 * homepage.
 */
$file = ($path != 'homepage' ? $path : 'homepage');

/**
 * Get template file
 */
$template = $theme->load($path);

/**
 * Load model file
 */
require( $model->load($path) );

/**
 * Render the Page
 */
$theme->render($template, $_);
