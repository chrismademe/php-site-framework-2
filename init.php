<?php

session_start();

use Theme\Theme;
use Controller\Controller;

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
 * Set Path
 */
$path   = $router->getRoute();
$index  = $router->getIndex();

/**
 * Instantiate Controller & theme
 */
$controller = new Controller($path, $index);
$theme = new Theme($path, $index);

if ( is_localhost() ) {
    $theme->setDebug(true);
}

/**
 * Get template file
 */
$template = $theme->load($path);

/**
 * Load Controller file
 */
require( $controller->load($path) );

/**************************************
 *** Do Trigger: on_controller_init ***
 **************************************/
$triggers->doTrigger('on_controller_init');

/**
 * Render the Page
 */
$theme->render($template, $variables);

/*************************************
 *** Do Trigger: on_theme_init     ***
 *************************************/
$triggers->doTrigger('on_theme_init');
