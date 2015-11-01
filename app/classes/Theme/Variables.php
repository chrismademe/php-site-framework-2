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
            'theme_dir' => THEME_DIR
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
     * Extend Variable
     */
    public function extendVar( $parent, $child, $value ) {
        if ( property_exists($this, $parent) && is_array($this->$parent) ) {
            $this->$parent[$child] = $value;
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
