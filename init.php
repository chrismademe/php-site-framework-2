<?php

session_start();

use Controller\Controller;
use Dotenv\Dotenv;
use Theme\Theme;

/**
 * Set Root Dir
 */
define('ROOT_DIR', __DIR__);

/**
 * Autoload Classes
 */
require_once 'vendor/autoload.php';

/**
 * Build .env
 */
require_once 'env.php';

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
 * Set Path
 */
$path   = (isset($_GET['path']) ? rtrim($_GET['path'], '/') : 'index');
$index  = explode('/', $path);

try {

    /**
     * Get Config
     */
    require_once APP_DIR . '/config.php';

    /**
     * Instantiate Controller & theme
     */
    $controller = new Controller($path, $index);
    $theme = new Theme($path, $index);

    /**
     * Include functions & classes
     */
    require_once(APP_DIR .'/core/includes.php');

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

    /**
     * Render the Page
     */
    $theme->render($template, $variables->get());

} catch (Exception $e) {
    echo '<div style="padding: 12px; background-color: #e78511; color: white; text-align: center">'. $e->getMessage() .'</div>';
}
