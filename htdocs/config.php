<?php

/**
 * Theme & Content
 */
define('SITE_THEME', 'default');

/**
 * Global Theme Settings
 */
define('THEME_DIR', 'theme'); // Base directory
define('THEME_ASSETS', 'assets'); // Theme assets directory
define('THEME_TPL_EXT', '.twig'); // Template file extension

/**
 * Site Settings
 */
define('SITE_DOMAIN', 'http://localhost'); // Full domain name including http://
define('SITE_NAME', 'Site'); // Website / Company name
define('SITE_EMAIL', 'info@localhost'); // Primary email

/**
 * Contact Form Settings
 */
define('FORM_THEME', 'email');
define('FORM_VERIFY_TOKEN', getenv('FORM_VERIFY_TOKEN'));
define('FORM_VERIFY_SERVER', 'http://www.searchitlocal.co.uk');
define('FORM_EMAIL', SITE_EMAIL);
define('FORM_SUBJECT', 'New message from your website');
define('FORM_RESPONDER', true);
define('FORM_RESPONDER_SUBJECT', 'Thanks for contacting '. SITE_NAME);
define('FORM_SUCCESS_MESSAGE', 'Thank you, your message has been sent.');
define('FORM_FAILURE_MESSAGE', 'Sorry, something went wrong.');
