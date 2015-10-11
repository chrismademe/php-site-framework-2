<?php

/**
 * Config Loader
 */
require_once('scripts/includes/config_loader.php');

/**
 * Site Config
 */
require_once('config.php');

/**
 * Functions
 */
require_once('scripts/includes/functions.php');

/**
 * Theme variables
 */
require_once('variables.php');

/**
 * Load Twig
 */
require_once('scripts/classes/Twig/Autoloader.php');
Twig_Autoloader::register();

/**
 * Autoloader
 */
require_once('scripts/autoloader.php');
