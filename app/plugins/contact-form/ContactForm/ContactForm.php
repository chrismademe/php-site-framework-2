<?php

namespace ContactForm;

class ContactForm
{

    /**
     * Properties
     */
    public          $response = array();
    private         $verify_token = FORM_VERIFY_TOKEN;
    private         $verify_server = FORM_VERIFY_SERVER;
    private         $config = array();
    private         $theme;

    public function __construct() {

        // Set theme
        $this->theme = THEME_DIR .'/'. FORM_THEME;

        // Set config
        $this->config = array(
            'email_address' => FORM_EMAIL,
            'subject' => FORM_SUBJECT,
            'responder' => FORM_RESPONDER,
            'responder_subject' => FORM_RESPONDER_SUBJECT,
            'success' => FORM_SUCCESS_MESSAGE,
            'fail' => FORM_FAILURE_MESSAGE
        );

    }

    public function submit($data) {

        // Check site token
        if (!$this->valid_token($this->verify_token)) {

            $this->set_response('error', 'Invalid site token, your message was not sent. Please contact the website administrator.');

        // If valid, carry on...
        } else {

            // Validate user input
            foreach ($data as $input) {

                if(!$this->valid_input($input['type'], $input['content'])) {

                    $this->set_response('error', ''. $input['label'] . ' input is invalid. If you believe this is a mistake, please check your message for words that could be mistaken for spam.');
                    $invalid_input[$input['id']] = $input['label'];

                } else {

                    $valid_input[$input['id']] = $input['content'];

                }

            }

            // Send message
            if (!empty($valid_input) && empty($invalid_input)) {

                /**
                 * Get each key and
                 * value and place into
                 * array for template
                 */
                $_ = array_merge($this->config, $valid_input);

                /**
                 * Utility variables
                 */
                $_['site_name'] = SITE_NAME;
                $_['date'] = date("l, F j, Y");
                $_['time'] = date("g:i a");

                /**
                 * Instantiate Theme Class
                 */
                $theme = new \Theme\Theme(array(
                    'return' => 'value',
                    'theme' => 'email',
                    'variables' => $_
                ));

                /**
                 * Get E-mail Template
                 */
                $message = $theme->get_template('contact-form');

                /**
                 * Write and send email
                 */
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From:' . $_['email'] . "\r\n";

                if ($this->send_mail($this->config['email_address'], $this->config['subject'], $message, $headers)) {
                    $this->set_response('success', $this->config['success']);
                } else {
                    $this->set_response('error', $this->config['fail']);
                }

                /**
                 * If $config['email_responder']
                 * is set to true, send the user
                 * an autoresponse.
                 */
                if ($this->config['responder']) {

                    /**
                     * Include templates
                     * Generates $message
                     */
                    $responder = $theme->get_template('auto-responder');

                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From:' . $this->config['email_address'] . "\r\n";

                    $this->send_mail($_['email'], $this->config['responder_subject'], $responder, $headers);

                }

            }

        }

    }

    /**
     * Validate Site Token
     */
    private function valid_token($site_token) {

        $connect = curl_init();
        curl_setopt($connect, CURLOPT_URL, $this->verify_server .'/verify_token.php');
        curl_setopt($connect, CURLOPT_POST, 1);
        curl_setopt($connect, CURLOPT_POSTFIELDS, 'site_token='. $site_token .'');
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($connect);

        if ($response == 1) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Validate User Input
     */
    private function valid_input($type, $content) {

        switch ($type) {

            case 'text':

                if (filter_var($content, FILTER_SANITIZE_STRING)) {
                    return true;
                } else {
                    return false;
                }

            break;

            case 'email':

                if (filter_var($content, FILTER_VALIDATE_EMAIL)) {
                    return true;
                } else {
                    return false;
                }

            break;

            case 'phone':

                if (preg_match("/^[0-9]{11}$/", $content)) {
                    return true;
                } else {
                    return false;
                }

            break;

            case 'message':

                /**
                 * List of words considered
                 * to be spammy.
                 *
                 * If the message contains
                 * a spam word, reject it.
                 *
                 * Spam list is hosted on
                 * searchitlocal.co.uk domain.
                 */
                $spam_words = file_get_contents('http://www.searchitlocal.co.uk/spam.txt');
                $spam_words = str_replace("\n", '|', $spam_words);

                $words = explode('|', $spam_words);

                /*
                 * Loop through each word
                 * and check to see if it
                 * appears in the message.
                 */
                $i = 0;
                while ($i < count($words)) {

                    if (strpos(strtolower(' ' . $content), $words[$i])) {
                        $spam = 1;
                    }

                    $i++;

                }

                /**
                 * If $spam is set to 1 by
                 * the loop, return false so
                 * the input becomes invalid
                 * and will the script will
                 * not continue.
                 */
                if (!empty($spam) && $spam == 1) {
                    return false;
                } else {
                    return true;
                }

            break;

            case 'validate':

                if ($content == 1) {
                    return true;
                } else {
                    return false;
                }

            break;

        }

    }

    /**
     * Send Mail
     */
    private function send_mail($recipient, $subject, $message, $headers) {

        /**
         * Wordwrap message otherwise
         * it won't display properly
         */
        $message = wordwrap($message, 70);

        /**
         * Attempt to send email
         */
        if (mail($recipient, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Set Response
     */
    public function set_response($type, $message) {

        $this->response['type'] = $type;
        $this->response['message'] = $message;

    }

    /**
     * Get Response
     */
    public function get_response() {
        echo '<div class="alert alert-'. $this->response['type'] .'">'. $this->response['message'] .'</div>';
    }

}

?>
