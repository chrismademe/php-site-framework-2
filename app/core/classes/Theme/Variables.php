<?php

/**
 * Variables:
 * Variable object for theme/template variables.
 */

namespace Theme;

class Variables {

    /**
     * Variables
     */
    private $variables = array();

    /**
     * Core Variables
     * These could be required throughout your app
     * and so are not settable from outside
     * of the class
     */
    private $core = array();

    /**
     * Construct
     * Define core variables
     */
    public function __construct() {
        $this->add(array(
            'theme_dir' => (defined('THEME_DIR') ? THEME_DIR : 'theme')
        ), false, true);
    }

    /**
     * Get
     */
    public function get( $variable = null ) {

        /**
         * Get All
         */
        if ( is_null($variable) ) {
            return $this->variables;
        }

        /**
         * Get Keys
         */
        $keys = explode('|', $variable);
        //print_r($keys);

        /**
         * Count Keys (Depth)
         */
        $depth = count($keys);

        /**
         * Get Value
         */
        switch (true) {

            # 1 key
            case $depth == 1:
                return $this->variables[$keys[0]];
            break;

            # 2 keys
            case $depth == 2:
                return $this->variables[$keys[0]][$keys[1]];
            break;

            # 3 keys
            case $depth == 3:
                return $this->variables[$keys[0]][$keys[1]][$keys[2]];
            break;

            # 4 keys
            case $depth == 4:
                return $this->variables[$keys[0]][$keys[1]][$keys[2]][$key[3]];
            break;

            # 5 keys
            case $depth == 5:
                return $this->variables[$keys[0]][$keys[1]][$keys[2]][$key[3]][$key[4]];
            break;

        }



    }

    /**
     * Add Variable
     */
    public function add( $variable, $value = false, $core = false ) {
        if ( is_array($variable) ) {
            foreach( $variable as $var => $val ) {
                $this->add($var, $val, $core);
            }
        } elseif ( $value !== false ) {

            if ( !in_array($variable, $this->core) ) {
                $this->variables[$variable] = $value;

                if ($core === true) {
                    $this->core[] = $variable;
                }
            }

        }
    }

    /**
     * Extend Variable
     */
    public function extend( $parent, $child, $value ) {
        if ( array_key_exists($parent, $this->variables) && is_array($this->variables[$parent]) ) {
            $this->variables[$parent][$child] = $value;
        }
    }

    /**
     * Remove Variable
     */
    public function remove( $variable ) {
        if ( is_array($variable) ) {
            foreach ( $variable as $var ) {
                $this->remove($var);
            }
        } else {
            if ( !in_array($variable, $this->core) && array_key_exists($variable, $this->variables) ) {
                unset($this->variables[$variable]);
            }
        }
    }

}
