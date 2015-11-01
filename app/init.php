<?php

session_start();

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
require_once('../app/includes.php');

/**
 * Instantiate model & theme
 */
$model = new Model($path, $index);
$theme = new Theme($path, $index);

if ( is_localhost() ) {
    $theme->debug = true;
}

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

/*************************************
 *** Do Trigger: on_model_init     ***
 *************************************/
$triggers->doTrigger('on_model_init');

/**
 * Render the Page
 */
$theme->render($template, $variables);

/*************************************
 *** Do Trigger: on_theme_init     ***
 *************************************/
$triggers->doTrigger('on_theme_init');
