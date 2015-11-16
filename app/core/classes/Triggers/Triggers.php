<?php

/**
 * Triggers:
 * WordPress style actions and triggers (hooks)
 */

namespace Triggers;

class Triggers {

    /**
     * Triggers array
     */
    private $triggers = array();

    /**
     * Actions array
     */
    private $actions  = array();

    /**
     * Construct
     * Defines core triggers
     */
    public function __construct( $triggers = false ) {
        if ( $triggers !== false && is_array($triggers) ) {
            $this->addTrigger($triggers);
        }
    }

    /**
     * Add Trigger
     */
    public function addTrigger( $trigger ) {
        if ( is_array($trigger) ) {
            foreach( $trigger as $tr ) {
                $this->addTrigger($tr);
            }
        } else {
            if ( !in_array($trigger, $this->triggers) ) {
                $this->triggers[] = $trigger;
            }
        }
    }

    /**
     * Do Trigger
     */
    public function doTrigger( $trigger ) {
        if ( in_array($trigger, $this->triggers) && array_key_exists($trigger, $this->actions) ) {
            foreach ( $this->actions[$trigger] as $action ) {
                $this->doAction($action);
            }
        }
    }

    /**
     * Get Triggers
     */
    public function getTriggers() {
        return $this->triggers;
    }

    /**
     * Trigger Exists
     */
    public function triggerExists( $trigger ) {
        return array_key_exists($trigger, $this->triggers);
    }

    /**
     * Add Action
     */
    public function addAction( $trigger, $action ) {
        if ( is_array($action) ) {
            foreach( $action as $act ) {
                $this->addAction($trigger, $act);
            }
        } else {
            $this->actions[$trigger][] = $action;
        }
    }

    /**
     * Do Action
     */
    public function doAction( $action ) {
        if ( function_exists($action) ) {
            $action();
        }
    }

    /**
     * Get Actions
     */
    public function getActions() {
        return $this->actions;
    }

}
