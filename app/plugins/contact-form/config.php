<?php

define('FORM_EMAIL_LOGO', getenv('FORM_EMAIL_LOGO'));
define('FORM_HANDLER', getenv('FORM_HANDLER'));
define('FORM_THEME', 'email');
define('FORM_VERIFY_TOKEN', getenv('FORM_VERIFY_TOKEN'));
define('FORM_VERIFY_SERVER', 'http://www.searchitlocal.co.uk');
define('FORM_EMAIL', SITE_EMAIL);
define('FORM_SUBJECT', 'New message from your website');
define('FORM_RESPONDER', true);
define('FORM_RESPONDER_SUBJECT', 'Thanks for contacting '. SITE_NAME);
define('FORM_SUCCESS_MESSAGE', 'Thank you, your message has been sent.');
define('FORM_FAILURE_MESSAGE', 'Sorry, something went wrong.');
