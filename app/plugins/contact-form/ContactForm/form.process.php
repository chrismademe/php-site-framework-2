<?php

/**
 * Get config
 */
require_once('../../config.php');

/**
 * SITE TOKEN
 *
 * Access token used to
 * identify a website and
 * authenticate the database
 * process.
 *
 * If the token returns
 * invalid, the contact form
 * will fail.
 */
$config['site_token'] = 'emjd3mwZv9BC';
$config['site_verification_server'] = 'http://www.searchitlocal.co.uk';

/**
 * SITE CONFIG
 */
$config['site_name'] = SITE_NAME;
$config['site_logo'] = 'http://www.searchitlocal.co.uk/images/logo.png';

/**
 * EMAIL CONFIG
 */
$config['email_address'] = 'chris.galbraith@searchitlocal.co.uk';
$config['email_subject'] = 'New message from your website';
$config['email_responder'] = true;
$config['email_responder_subject'] = 'Thanks for contacting '. $config['site_name'] .'';

/**
 * ALERT CONFIG
 */
$config['alert_success'] = 'Thank you, your message has been sent';
$config['alert_error'] = 'Sorry, something went wrong';

require_once('ContactForm.php');
$contact = new \ContactForm\ContactForm($config);

if (!empty($_POST['subject'])) {
    $contact->set_response('error', 'Sorry, looks like something went wrong');
} elseif ($_POST) {

    /**
     * Input data
     */
    $data['name'] = array(
        'id' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'content' => $_POST['name'],
    );
    $data['email'] = array(
        'id' => 'email',
        'label' => 'E-mail Address',
        'type' => 'email',
        'content' => $_POST['email'],
    );
    $data['phone'] = array(
        'id' => 'phone',
        'label' => 'Phone Number',
        'type' => 'phone',
        'content' => $_POST['phone'],
    );
    $data['message'] = array(
        'id' => 'message',
        'label' => 'Message',
        'type' => 'message',
        'content' => $_POST['message'],
    );
    $data['validate'] = array(
        'id' => 'validate',
        'label' => 'Validation',
        'type' => 'validate',
        'content' => $_POST['validate']
    );

    /**
     * Submit form
     */
    $contact->submit($data);

}

/**
 * Return response
 */
$contact->get_response();

?>
