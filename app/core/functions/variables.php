<?php

/**
 * Add Variable
 */
function add_variable( $name, $value = false ) {

    # Get Variables Object
    global $variables;

    # Add Variable
    $variables->add( $name, $value );

}
