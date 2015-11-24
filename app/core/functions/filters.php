<?php

/**
 * Add Hook
 */
function add_hook( $name ) {

    # Get Filters Object
    global $filters;

    # Add Hook
    $filters->addHook( $name );

}

/**
 * Add Filter
 */
function add_filter( $hook, $name, $args = 0, $priority = 10 ) {

    # Get Filters Object
    global $filters;

    # Add Filter
    $filters->addFilter( $hook, $name, $args, $priority );

}

/**
 * Apply Filters
 */
function apply_filters( $hook, $input ) {

    # Get Filters Object
    global $filters;

    # Apply Filters
    return $filters->applyFilters( $hook, $input );

}
