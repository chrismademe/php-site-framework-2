<?php

error_reporting(-1);
ini_set('display_errors', 'on');

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


/**
 * Instantiate model & theme
 */
$model = new Model($path, $index);
$theme = new Theme($path, $index, ['debug' => true]);

/**
 * Load page
 */
$file = ($path != 'homepage' ? $path : 'homepage');

require( $model->load($path) );
$theme->render($path, $_);
