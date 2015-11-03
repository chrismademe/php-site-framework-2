<?php

/**
 * @package Contact Form
 *
 * Plugin for handling
 * simple contact form.
 */

// Include ContactForm class
require_once __DIR__.'/ContactForm/ContactForm.php';

// Include Settings
require_once __DIR__.'/config.php';

// Check ContactForm class is available
if ( !class_exists('ContactForm\ContactForm') ) {
    throw new Exception('ContactForm class is required for the contact form plugin to function.');
}

// Run Plugin
if ( is_path( FORM_HANDLER ) && is_form_data() ) {

    /**
     * New GUMP instance
     */
    $gump = new GUMP();

    /**
     * Sanitize Input
     */
    $data = $gump->sanitize( form_data() );

    /**
     * New ContactForm instance
     */
    $contact = new ContactForm\ContactForm();

    /**
     * Submit data
     */
    if ( !form_field_exists('subject') ) {
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

}
