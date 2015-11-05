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
 * Set App directory
 */
define('APP_DIR', '../app');

/**
 * Include functions & classes
 */
try {
    require_once(APP_DIR .'/core/includes.php');
} catch (Exception $e) {
    echo '<div style="padding: 12px; background-color: #e6db40; color: white; text-align: center">'. $e->getMessage() .'</div>';
}

/**
 * Instantiate model & theme
 */
$model = new Model($path, $index);
$theme = new Theme($path, $index);

if ( is_localhost() ) {
    $theme->setDebug(true);
}

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
