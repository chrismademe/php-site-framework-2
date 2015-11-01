<?php

/**
 * @package Database
 *
 * Simple plugin for loading
 * database config from .env
 * and instantiating a new
 * PDO object
 *
 * @return (object) $pdo
 */

define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));

try {
    $pdo = new PDO('mysql:host='. DB_HOST .';charset=utf8;dbname='. DB_NAME .'', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo '<h1>Unable to connect to the database.</h1>';
    exit;
}
