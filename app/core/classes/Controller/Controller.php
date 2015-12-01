<?php

namespace Controller;

class Controller {

    /**
     * Template directory
     */
    private $dir;

    /**
     * Template file extension
     */
    private $ext;

    /**
     * Default file
     * For templates would be a 404
     * or for logic, could be a simple
     * file for setting default
     * code for every page
     */
    private $default;

    /**
     * Current path (URL)
     */
    private $path;

    /**
     * Current path index
     */
    private $index      = array();

    /**
     * Debug mode
     */
    private $debug = false;

    /**
     * Set defaults
     */
    public function __construct($path, array $index, array $config = null) {

        # Default config
        $this->dir = APP_DIR .'/controller'; # Template directory
        $this->ext = '.php'; # Template file extension
        $this->default = 'default'; # Default template name

        # Set path variables
        $this->path = $path;
        $this->index = $index;

        # Custom config
        if ( !is_null($config) ) {
            foreach ($config as $property => $value) {
                if ( property_exists($this, $property) ) {
                    $this->$property = $value;
                }
            }
        }

    }

    /**
     * Get property
     */
    public function __get( $property ) {
        return ( property_exists($this, $property) ? $this->$property : false );
    }

    /**
     * Set property
     */
    public function __set( $property, $value ) {
        $this->$property = $value;
    }

    /**
     * Isset
     */
     public function __isset( $property ) {
         return property_exists($this, $property);
     }

    /**
     * Render
     */
    public function load( $name, $file = false ) {
        return $this->getController($name, $file);
    }

    /**
     * Get Template
     */
    public function getController( $name, $file = false ) {

        /**
         * Find required template
         */
        switch (true) {

            /**
             * If specified file is
             * entered, load attempt
             * to load it.
             */
            case $file !== false && file_exists($this->dir .'/'. $file):
                $template = $file;
            break;

            /**
             * If template with
             * specified name exists,
             * attempt to load it.
             */
            case $file === false && file_exists($this->dir .'/'. $name . $this->ext):
                $template = $name . $this->ext;
            break;

            /**
             * If template with
             * where dashes replace
             * slashes exists, attempt
             * to load it.
             */
            case $file === false && file_exists($this->dir .'/'. str_replace('/', '-', $name) . $this->ext):
                $template = str_replace('/', '-', $name) . $this->ext;
            break;

            /**
             * Look for parent
             * templates in real
             * folders
             */
            case $file === false && !file_exists($this->dir .'/'. $name . $this->ext):
                $template = $this->findController();
            break;

            /**
             * Finally, look for
             * parent templates
             * within naming convention
             *
             * e.g.: find-this-file.php
             */
            case $file === false && !file_exists($this->dir .'/'. str_replace('/', '-', $name) . $this->ext):
                $template = $this->findController(true);
            break;

        }

        /**
         * Return it
         */
        if ( $template !== false && is_readable($this->dir .'/'. $template) ) {
            return $this->dir .'/'. $template;
        }

    }

    /**
     * Find Template
     */
    private function findController( $replace = false ) {

        $implode = ($replace === false ? '/' : '-');

        $index_count = count($this->index) - 1;
        $index = $this->index;

        while ($index) {

            # Remove last index
            unset($index[$index_count]);

            # Generate filename
            $file = implode($implode, $index) . $this->ext;

            # If we found a match, use it
            if ( file_exists($this->dir .'/'. $file) ) {
                $template = $file;
                break;
            }

            # If not, move on to the next one
            $index_count--;

        }

        return (isset($template) ? $template : $this->default . $this->ext);

    }

    /**
     * Use Controller
     *
     * Change the controller directory
     */
    public function useController( $controller ) {
        $this->dir = $controller;
    }

}
