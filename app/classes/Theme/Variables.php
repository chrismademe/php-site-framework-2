<?php

/**
 * Variables:
 * Variable object for theme/template variables.
 */

namespace Theme;

class Variables {

    /**
     * Core Variables
     * These could be required throughout your app
     * and so are not settable from outside
     * of the class
     */
    private $core = [];

    /**
     * Construct
     * Define core variables
     */
    public function __construct() {
        $this->addVar([
            'base_url' => 'http://example.com',
            'base_dir' => '/',
            'theme_dir' => 'themes',
            'plugins_dir' => 'plugins'
        ], false, true);
    }

    /**
     * Get (Magic method)
     * Return value of variable
     */
    public function __get( $variable ) {
        if ( property_exists($this, $variable) ) {
            return $this->$variable;
        }
    }

    /**
     * Set (Magic method)
     */
    public function __set( $variable, $value ) {
        if ( !in_array($variable, $this->core) ) {
            $this->$variable = $value;
        }
    }

    /**
     * Add Variable
     */
    public function addVar( $variable, $value = false, $core = false ) {
        if ( is_array($variable) ) {
            foreach( $variable as $var => $val ) {
                $this->addVar($var, $val, $core);
            }
        } elseif ( $value !== false ) {

            if ( !in_array($variable, $this->core) ) {
                $this->$variable = $value;

                if ($core === true) {
                    $this->core[] = $variable;
                }
            }

        }
    }

    /**
     * Remove Variable
     */
    public function removeVar( $variable ) {
        if ( is_array($variable) ) {
            foreach ( $variable as $var ) {
                $this->removeVar($var);
            }
        } else {
            if ( !in_array($variable, $this->core) && property_exists($this, $variable) ) {
                unset($this->$variable);
            }
        }
    }

}
