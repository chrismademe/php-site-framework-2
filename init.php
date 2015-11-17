<?php

session_start();

use Controller\Controller;
use Dotenv\Dotenv;
use Theme\Theme;

/**
 * Autoload Classes
 */
require_once 'vendor/autoload.php';

/**
 * Load Environment Variables
 *
 * Access variables from your
 * app using the getenv() function.
 *
 * To access DB_HOST for example:
 * getenv('DB_HOST');
 */

$environment = new Dotenv(__DIR__);
$environment->load();

/**
 * Set App Directory
 */
define('APP_DIR', getenv('APP_DIR'));

/**
 * Set Enrivonment
 */
define('ENVIRONMENT', getenv('ENVIRONMENT'));

/**
 * Set Environment Status
 */
switch ( true ) {

    /**
     * Development
     */
    case ENVIRONMENT === 'development':
        error_reporting(-1);
        ini_set('display_errors', 'on');
    break;

}

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

if ( ENVIRONMENT === 'development' ) {
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
