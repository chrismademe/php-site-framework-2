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
                $this->add_hook($hook);
            }
        }

    }

    /**
     * Add Hook
     */
    public function add_hook( $name ) {
        if ( !$this->hook_exists($name) ) {
            $this->hooks[] = $name;
        }
    }

    /**
     * Hook Exists
     */
    public function hook_exists( $name ) {
        return in_array( $name, $this->hooks );
    }

    /**
     * Add Filter
     */
    public function add_filter( $hook, $name, $args = 0, $priority = 10 ) {

        # Check Hook Exists
        if ( !$this->hook_exists( $hook ) ) {
            $this->add_hook( $hook );
        }

        # Check Filter doesn't already exist
        if ( $this->filter_exists( $hook, $name ) ) {
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
    public function filter_exists( $hook, $name ) {
        return isset( $this->filters[$hook][$name] );
    }

    /**
     * Apply Filters
     */
    public function apply_filters( $hook, $input = null ) {

        # Check for active filters
        if ( empty($this->filters[$hook]) ) {
            return $input;
        }

        # Get Filters
        $filters = $this->filters[$hook];

        # Sort Filters by Priority
        foreach ( $filters as $name => $filter ) {
            $sort[$name] = $filter['priority'];
        }

        array_multisort($sort, SORT_ASC, $filters);

        # Apply Each Filter
        foreach ( $filters as $name => $filter ) {
            $input = $this->apply_filter(
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
    public function apply_filter( $hook, $name, $input ) {

        # Check Hook Exists
        if ( !$this->hook_exists( $hook ) ) {
            throw new Exception($hook . ' is not a valid hook. Try <code>$filters->add_hook(\'' . $hook . '\');</code>');
        }

        # Check Filter Exists
        if ( !$this->filter_exists( $hook, $name ) ) {
            throw new Exception($name . ' is not a valid filter. Try <code>$filters->add_filter(\'' . $hook . '\', \'' . $name . '\');</code>');
        }

        # Check Filter Function Exists
        if ( !function_exists($name) ) {
            throw new Exception($name .' is not a defined function. Try <code>function ' . $name . '() {}</code>');
        }

        ############################

        return $name( $input );

    }

}
