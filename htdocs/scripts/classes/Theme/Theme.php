<?php

namespace Theme;

class Theme {

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
     * Not Found
     *
     * True if the default
     * file is loaded
     */
    public $not_found = false;

    /**
     * Current path (URL)
     */
    private $path;

    /**
     * Current path index
     */
    private $index      = [];

    /**
     * Twig
     */
    private $twig;

    /**
     * Template cache
     */
    private $cache;

    /**
     * Template variables
     */
    private $variables;

    /**
     * Debug mode
     */
    private $debug = false;

    /**
     * Set defaults
     */
    public function __construct($path, array $index, array $config = null) {

        // Default config
        $this->dir = THEME_DIR .'/'. SITE_THEME; // Template directory
        $this->ext = '.twig'; // Template file extension
        $this->default = '404'; // Default template name
        $this->cache = THEME_DIR .'/_cache'; // Cache folder

        // Set path variables
        $this->path = $path;
        $this->index = $index;

        // Custom config
        if ( !is_null($config) ) {
            foreach ($config as $property => $value) {
                if ( property_exists($this, $property) ) {
                    $this->$property = $value;
                }
            }
        }

        /**
         * Set Twig filesystem directory
         */
        $loader = new \Twig_Loader_Filesystem($this->dir);

        /**
         * Set default options
         */
        $options = [
            'cache' => $this->cache,
            'debug' => $this->debug
        ];

        /**
         * Load Twig
         */
        $this->twig = new \Twig_Environment($loader, $options);

        /**
         * Add debug extension
         *
         * Debug also clears the cache
         * on each page load.
         */
        if ( $this->debug === true ) {
            $this->twig->addExtension(new \Twig_Extension_Debug());
            $this->clear_cache();
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
    public function render( $template, array $variables ) {

        /**
         * Store variables in object
         * for reference if needed
         */
        $this->variables = $variables;

        /**
         * Render the page!
         */
        echo $this->twig->render($template, $variables);

    }

    /**
     * Load Template
     */
    public function load( $name, $file = false ) {

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
                $template = $this->find_template();
            break;

            /**
             * Finally, look for
             * parent templates
             * within naming convention
             *
             * e.g.: find-this-file.php
             */
            case $file === false && !file_exists($this->dir .'/'. str_replace('/', '-', $name) . $this->ext):
                $template = $this->find_template(true);
            break;

        }

        /**
         * Return it
         */
        if ( $template !== false && is_readable($this->dir .'/'. $template) ) {
            return $template;
        }

    }

    /**
     * Clear Cache
     */
    public function clear_cache( $dir = false ) {

        if ( $dir === false ) {
            $dir = $this->cache;
        }

        foreach ( glob($dir .'/*') as $file ) {
            if ( is_dir($file) ) {
                $this->clear_cache($file);
            } else {
                unlink($file);
            }
        }

    }

    /**
     * Find Template
     */
    private function find_template( $replace = false ) {

        $implode = ($replace === false ? '/' : '-');

        $index_count = count($this->index) - 1;
        $index = $this->index;

        while ($index) {

            // Remove last index
            unset($index[$index_count]);

            // Generate filename
            $file = implode($implode, $index) . $this->ext;

            // If we found a match, use it
            if ( file_exists($this->dir .'/'. $file) ) {
                $template = $file;
                break;
            }

            // If not, move on to the next one
            $index_count--;

        }

        // Return template
        if ( isset($template) ) {
            return $template;
        } else {
            $this->not_found = true;
            return $this->default . $this->ext;
        }

    }

}
