<?php

namespace Filters;
use Exception;

class Filters {

    /**
     * Hooks
     *
     * Array of active hooks
     */
    private $hooks      = array();

    /**
     * Filters
     *
     * Keyed array of hooks with
     * their filters
     */
    private $filters    = array();

    /**
     * Construct
     */
    public function __construct( array $hooks = null ) {

        # Set Default Hooks
        if ( !is_null( $hooks ) ) {
            foreach ( $hooks as $hook ) {
                $this->addHook($hook);
            }
        }

    }

    /**
     * Add Hook
     */
    public function addHook( $name ) {
        if ( !$this->hookExists($name) ) {
            $this->hooks[] = $name;
        }
    }

    /**
     * Hook Exists
     */
    public function hookExists( $name ) {
        return in_array( $name, $this->hooks );
    }

    /**
     * Add Filter
     */
    public function addFilter( $hook, $name, $args = 0, $priority = 10 ) {

        # Check Hook Exists
        if ( !$this->hookExists( $hook ) ) {
            throw new Exception($hook . ' is not a valid hook. Try <code>$filters->addHook(\'' . $hook . '\');</code>');
        }

        # Check Filter doesn't already exist
        if ( $this->filterExists( $hook, $name ) ) {
            throw new Exception($name . ' already exists.');
        }

        # Check $args is a integer
        if ( !is_int( $args ) ) {
            throw new Exception('<code>$args</code> must be a valid integer.');
        }

        # Check $args is not over 5
        if ( $args > 5 ) {
            throw new Exception('<code>$args</code> cannot exceed 5.');
        }

        # Check $priority is a integer
        if ( !is_int( $priority ) ) {
            throw new Exception('<code>$priority</code> must be a valid integer.');
        }

        ############################

        # Check if $name is not object
        if ( is_array($name) ) {

            # Validate object
            if ( !is_object($name[0]) ) {
                throw new Exception($name[0] .' is not a valid object. Try <code>$example = new Example();</code> before passing argument.');
            }

            $this->filters[$hook][$name[1]] = array(
                'object'    => $name[0],
                'args'      => $args,
                'priority'  => $priority
            );

            return;

        }

        # Create Filter Array with normal Function
        $this->filters[$hook][$name] = array(
            'args'      => $args,
            'priority'  => $priority
        );

    }

    /**
     * Filter Exists
     */
    public function filterExists( $hook, $name ) {
        return isset( $this->filters[$hook][$name] );
    }

    /**
     * Apply Filters
     */
    public function applyFilters( $hook, $input = null ) {

        # Get Filters
        $filters = $this->filters[$hook];

        # Sort Filters by Priority
        foreach ( $filters as $name => $filter ) {
            $sort[$name] = $filter['priority'];
        }

        array_multisort($sort, SORT_ASC, $filters);

        # Apply Each Filter
        foreach ( $filters as $name => $filter ) {
            $input = $this->applyFilter(
                $hook,
                $name,
                $input
            );
        }

        # Return Filtered Result
        return $input;

    }

    /**
     * Apply Filter
     */
    public function applyFilter( $hook, $name, $args = null ) {

        # Check Hook Exists
        if ( !$this->hookExists( $hook ) ) {
            throw new Exception($hook . ' is not a valid hook. Try <code>$filters->addHook(\'' . $hook . '\');</code>');
        }

        # Check Filter Exists
        if ( !$this->filterExists( $hook, $name ) ) {
            throw new Exception($name . ' is not a valid filter. Try <code>$filters->addFilter(\'' . $hook . '\', \'' . $name . '\');</code>');
        }

        # Check Filter Function Exists
        if ( !function_exists($name) ) {
            throw new Exception($name .' is not a defined function. Try <code>function ' . $name . '() {}</code>');
        }

        # Check $args
        if ( !is_array($args) ) {
            $args = array($args);
        }

        ############################

        # Get $args count
        $args_count = ( is_null($args) ? 0 : count($args) );

        # Apply Filter
        switch ( true ) {

            # 0 arguments
            case $args_count === 0:
                return $name();
            break;

            # 1 argument
            case $args_count === 1:
                return $name( $args[0] );
            break;

            # 2 arguments
            case $args_count === 2:
                return $name( $args[0], $args[1] );
            break;

            # 3 arguments
            case $args_count === 3:
                return $name( $args[0], $args[1], $args[2] );
            break;

            # 4 arguments
            case $args_count === 4:
                return $name( $args[0], $args[1], $args[2], $args[3] );
            break;

            # 5 arguments
            case $args_count === 5:
                return $name( $args[0], $args[1], $args[2], $args[3], $args[4] );
            break;

        }

    }

}