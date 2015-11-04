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
        if (!$this->validToken($this->verify_token)) {

            $this->setResponse('error', 'Invalid site token, your message was not sent. Please contact the website administrator.');

        // If valid, carry on...
        } else {

            /**
             * Get each key and
             * value and place into
             * array for template
             */
            $_ = array_merge($this->config, $data);

            /**
             * Utility variables
             */
            $_['site'] = [
                'name'    => SITE_NAME,
                'domain'  => SITE_DOMAIN,
                'assets'  => assets_dir()
            ];
            
            $_['date'] = date("l, F j, Y");
            $_['time'] = date("g:i a");

            /**
             * Instantiate Theme Class
             */
            $theme = new \Theme\Theme('message', [], ['dir' => THEME_DIR .'/'. FORM_THEME]);

            /**
             * Render Message
             */
            $template = $theme->load('message');
            $message = $theme->render($template, $_, false);

            /**
             * Write and send email
             */
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From:' . $_['email'] . "\r\n";

            if ($this->sendMail($this->config['email_address'], $this->config['subject'], $message, $headers)) {
                $this->setResponse('success', $this->config['success']);
            } else {
                $this->setResponse('error', $this->config['fail']);
            }

            /**
             * If $config['email_responder']
             * is set to true, send the user
             * an autoresponse.
             */
            if ($this->config['responder']) {

                /**
                 * Instantiate Theme Class
                 */
                $ar = new \Theme\Theme('auto-responder', [], ['dir' => THEME_DIR .'/'. FORM_THEME]);

                /**
                 * Render Message
                 */
                $template = $ar->load('auto-responder');
                $responder = $ar->render($template, $_, false);

                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From:' . $this->config['email_address'] . "\r\n";

                $this->sendMail($_['email'], $this->config['responder_subject'], $responder, $headers);

            }

        }

    }

    /**
     * Validate Site Token
     */
    private function validToken($site_token) {

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
     * Send Mail
     */
    private function sendMail($recipient, $subject, $message, $headers) {

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
    public function setResponse($type, $message) {
        $this->response['type'] = $type;
        $this->response['message'] = $message;
    }

    /**
     * Get Response
     */
    public function getResponse() {
        return '<div class="alert alert-'. $this->response['type'] .'">'. $this->response['message'] .'</div>';
    }

}

?>
